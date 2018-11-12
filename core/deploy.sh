#!/usr/bin/env bash

# Composer console executor
function __composer(){
	composer $1 > /dev/null 2>&1
}

# Laravel console executor
function _artisan(){
	php -d memory_limit=4096M artisan $1
}

#"Install composer dependencies"
	 __composer install
	 __composer dumpautoload
#"Install composer dependencies done !"

#"Migrate database"
	_artisan "migrate --force"
#"Migrate database !"

#"Generation artisan key"
	_artisan key:generate
#"Generation artisan key done !"

#"Clear Laravel caches"
    _artisan config:clear
    _artisan cache:clear
    _artisan view:clear
    _artisan route:clear
    _artisan clear-compiled
#"Clear Laravel caches done !"
