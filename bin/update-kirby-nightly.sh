#!/usr/bin/env bash

cd kirby
git checkout develop
git pull
git submodule foreach --recursive git checkout develop
git submodule foreach --recursive git pull

cd ../panel
git checkout develop
git pull

cd ..
git add kirby panel
git commit -am "Updated Kirby nightly"
