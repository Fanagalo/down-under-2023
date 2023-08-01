#!/bin/bash -ex

# variables
# ${THEME_SLUG} env variable should be set on CI
theme_commit_version=$(git describe)
theme_date=$(date --utc +%H%M)

function buildAndDeploy {
	# Prepare clean theme folder and installable zip
	# ====================================

	# rsync the production theme files to installable theme folder
	rsync -av --exclude-from='bin/exclude-for-deployment.list' ./ ${THEME_SLUG}

	# replace version number in style.css with the current one
	sed -ri "s/^Version: .+/Version: ${theme_commit_version}/g" ${THEME_SLUG}/style.css
	sed -i "s/^Version: v/Version: /g" ${THEME_SLUG}/style.css

	# pull the bundled plugins from our server
	# getBundledPlugins

	# zip the installable theme
	zip -r ${THEME_SLUG}.zip ${THEME_SLUG}/

	# Deployment to production server
	# ====================================

	# copy installable zip to remote server
	scp ${THEME_SLUG}.zip deployer@${AS1_IP}:artifacts.proteusthemes.com/themes/${THEME_SLUG}-latest.zip

	# deploy to prod server
	rsync -avz --del ./${THEME_SLUG} deployer@${AS1_IP}:themes/
}

function deployToTf {
	tf_dir="main-${THEME_SLUG}"
	theme_upload_name="${THEME_SLUG}-${theme_date}"

	# Get some static files from the prod server
	# 	- rsynced
	# 	- files, folders:
	# 		- documentation/
	# 		- extras/
	# 		- Licenses/
	# 		- ...
	# ====================================

	# rsync various files/folders that needs to be included in the main zip (license, extras)
	# from production server
	rsync -vhLr deployer@${AS1_IP}:artifacts.proteusthemes.com/zip-files/${THEME_SLUG}/ ${tf_dir}

	# rsync docs from production server
	rsync -vhLr deployer@${AS1_IP}:www.proteusthemes.com/docs/${THEME_SLUG}/ ${tf_dir}/documentation

	# Copy installable WP theme and entire theme directory to the tf dir
	# ====================================

	# copy an installable theme
	cp ${THEME_SLUG}.zip ${tf_dir}/

	# copy an installable theme directory
	cp -r ${THEME_SLUG} ${tf_dir}/

	# Zip the main theme with docs, extras and licenses
	# ====================================

	zip -r ${tf_dir}.zip ${tf_dir}/

	# Transfer 2 files from the previous step to the ThemeForest via FTP
	# 	- wp-<theme-name>-<version>-<timestamp>.zip: installable theme
	# 	- main-<theme-name>-<version>-<timestamp>.zip:
	# 		- <theme-slug>.zip
	# 		- <theme-slug>/
	# 		- License/
	# 		- extras/
	# 		- documentation/
	# ====================================

	curl -T ${tf_dir}.zip ftp://ProteusThemes:${TF_API_KEY}@ftp.marketplace.envato.com/main-${theme_upload_name}.zip
	curl -T ${THEME_SLUG}.zip ftp://ProteusThemes:${TF_API_KEY}@ftp.marketplace.envato.com/wp-${theme_upload_name}.zip

	# copy main zip to artifacts, to folder for latest TF releases
	scp ${tf_dir}.zip deployer@${AS1_IP}:artifacts.proteusthemes.com/tf-releases/
}

function getBundledPlugins {
	plugins_list=()

	# add bundled plugins to the original theme
	if [[ ! -d bundled-plugins ]]; then
		mkdir ${THEME_SLUG}/bundled-plugins
	fi

	for plugin in ${plugins_list[@]}; do
		scp deployer@${AS1_IP}:artifacts.proteusthemes.com/bundled-plugins/${plugin} ${THEME_SLUG}/bundled-plugins/
	done
}

buildAndDeploy

# only upload to TF if the current commit is tagged
if [[ ${theme_commit_version} =~ ^v[0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,2}$ ]]; then
	deployToTf
fi


unset buildAndDeploy
unset deployToTf
unset getBundledPlugins
