#!/usr/bin/env bash

# Yarn console executor
function __yarn(){
	yarn $1 > /dev/null 2>&1
}

# NPM console executor
function __npm(){
	npm run $1
}

    # Install dependencies
    __yarn install

    # Build Admin Dashboard
    __yarn build-admin