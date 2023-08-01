#!/bin/sh

# variables
BASEDIR=$(dirname $0)
theme=carpress
upload_dir=/srv/www/for-upload/$theme-wp

# first remove the existing folders and files
rm -r $upload_dir/$theme
rm $upload_dir/$theme.zip
rm $upload_dir/../$theme-wp.zip

# then copy the new version of the theme there
cp -r $BASEDIR/../$theme $upload_dir

#remove the folders inside that are not needed
rm -rf $upload_dir/$theme/node_modules/
rm -rf $upload_dir/$theme/.git/
rm -rf $upload_dir/$theme/_misc/
rm -rf $upload_dir/$theme/.sass-cache/
rm -rf $upload_dir/$theme/.git*
rm -rf $upload_dir/$theme/bower_components/font-awesome/src/
rm -rf $upload_dir/$theme/wp-cli.yml
rm -rf $upload_dir/$theme/wp-cli.yml

find $upload_dir/$theme/ -path *.jshintrc | xargs rm
find $upload_dir/$theme/ -path *.bower.json | xargs rm
find $upload_dir/$theme/ -path *.gitignore | xargs rm

# self-destruction
rm -rf $upload_dir/$theme/export_for_upload.sh