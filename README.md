micro-crm--symfony2--php
========================

CRM like application -> practical experiment with Symfony2 PHP framework


Preparing assets
----------------

$ php app/console --env=dev cache:clear --no-debug
$ php app/console --env=dev assetic:dump --no-debug
$ php app/console --env=dev assets:install web --no-debug


Running development server
----------------

$ php app/console server:run

Server running on http://127.0.0.1:8000

