micro-crm--symfony2--php
========================

CRM like application -> practical experiment with Symfony2 PHP framework & CRUDs

Deployment steps
----------------
git remote update
git stash
git pull --rebase
git stash pop
php53 ~/bin/composer.phar update
php54 app/console --env=prod cache:clear
php54 app/console --env=prod assetic:dump
php54 app/console --env=prod assets:install web
php53 app/console doctrine:schema:update --dump-sql
php53 app/console doctrine:schema:update --force

Preparing assets
----------------

$ php app/console --env=dev cache:clear --no-debug
$ php app/console --env=dev assetic:dump --no-debug
$ php app/console --env=dev assets:install web --no-debug


Crud generating for entity
--------------------------

$ php app/console jordillonch:generate:crud


Running development server
----------------

$ php app/console server:run

Server running on http://127.0.0.1:8000


Links to application modules prototypes
----------------
http://localhost:8000/app_dev.php/micro-crm/customer/
http://localhost:8000/app_dev.php/micro-crm/customertype/
http://localhost:8000/app_dev.php/micro-crm/event/?filter_action=reset
http://localhost:8000/app_dev.php/micro-crm/eventtype/
http://localhost:8000/app_dev.php/micro-crm/seller/


