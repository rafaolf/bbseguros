# Drupal - BB Seguros
![BB Seguros logo](https://github.com/rafaolf/bbseguros/blob/master/www/docroot/themes/custom/bbseg/images/logo.png)

<!-- [![Build Status](https://travis-ci.org/)](https://travis-ci.org/) -->

BB Seguros' mission is to provide a great experience for content management
using the Lighting distribution (Acquia).

## Prerequisites
![Lando](https://github.com/lando/lando/releases/tag/v3.0.0-rc.20)

## Installation
In order to initiate the Lando stack, run
```
$ lando start
```
which will create the following containers: appserver (Apache + PHP), database
(MySQL) and Node (Node.js + Gulp).

### Importing the initial database with Lightning
```
$ lando db-import backups/first.sql
```

### Installing Composer dependencies
```
$ cd www && lando composer install
```

### Importing the configuration
```
$ cd docroot && drush cim -y
```

## Login
In order to login, usually the one-time login URL is used:
```
$ drush -l https://bbseg.lndo.site uli
```
Also, feel free to update the admin password with it and login through "/user".

## General development
Please follow Drupal usual workflow/strategy. Also, keep in mind that Lando
mimics the folder you're currently running any command, so drush should be used
inside "www/docroot".
@TODO: it might be a good idea to extend it (if possible) and make drush run on
every path (something like we did for "theme" - check .lando.yml and script.sh).

## Theme development
In order to run NPM or Gulp commands on theme level, use
```
$ lando theme
```
and enter the command (e.g.: npm install, gulp sass, gulp watch, etc.). This
will execute the instruction on node container.

[github]: https://github.com/rafaolf/bbseguros "GitHub clone"
