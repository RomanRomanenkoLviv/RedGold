#/bin/bash

./node_modules/.bin/eslint --fix $(git diff-index --name-only --diff-filter=d HEAD | egrep '^resources.+?(\.vue$|\.js$)')
