order-items
===========

### Description

A simple User / Order / Items System completely scalable.

### Bundle

Joki\JokiBundle

#### Entities

User / Order / Item / Country

#### Relations

User oneToMany Order
Country oneToMany Order
Order oneToMany Item

### Installation

Use Composer

	php composer.phar install

Create database schema

	php app/console doctrine:schema:create
	php app/console doctrine:schema:update


### Footer

A Symfony project created on March 24, 2015, 10:10 am.
