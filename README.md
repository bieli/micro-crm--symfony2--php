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


SQLs
-----

CREATE TABLE `customer_type` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `customer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `pesel` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `customer_type_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`pesel`),
  KEY `customer_customer_type_id_idx` (`customer_type_id`),
  KEY `customer_pesel_idx` (`pesel`),
  CONSTRAINT `customer_customer_type_id` FOREIGN KEY (`customer_type_id`) REFERENCES `customer_type`
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;














