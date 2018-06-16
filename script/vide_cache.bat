@echo on
php bin/console cache:clear -e prod
php bin/console cache:clear -e dev