#/bin/bash

./node_modules/.bin/eslint $(git diff-index --name-only --diff-filter=d HEAD | egrep '^resources.+?(\.vue$|\.js$)')

