#!/usr/bin/env bash

composer install --ignore-platform-reqs --no-interaction

exec php-fpm