# kirbyBOOK

## Useful commands

### Starting Gulp watcher

```bash
gulp
```



### Updating submodules

```bash
git submodule foreach git checkout master
git submodule foreach git pull
git commit -a -m "Update submodules"
git submodule update --init --recursive
```
