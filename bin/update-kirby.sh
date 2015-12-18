#!/usr/bin/env bash

cd kirby
git checkout master
git pull

cd ../panel
git checkout master
git pull

cd ..
git add kirby panel
git commit -am "Updated Kirby"
git submodule update --init --recursive
