#!/bin/bash -ex

# Install dependencies through Composer
composer install --prefer-source --no-interaction --no-dev

# install bower and bower deps
npm install -g bower
bower install

# install grunt and grunt deps
npm install -g grunt-cli
npm install

# install sass & compass
gem install sass
gem install compass
