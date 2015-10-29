#!/usr/bin/env bash

cd site/fields/color
git checkout master
git pull

cd ../markdown
git checkout master
git pull

cd ../selector
git checkout master
git pull

cd ../../..
git add site/fields/{color,markdown,selector}
git commit -m "Updated field submodules"
