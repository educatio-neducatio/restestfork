#! /bin/sh

php app/console cache:clear --env=dev
php app/console cache:clear --env=test
php app/console cache:clear --env=prod --no-debug

php app/console assetic:dump --env=prod --no-debug
php app/console assets:install --symlink web

#chmod 0777 -R app/cache

