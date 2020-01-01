#!/usr/bin/env bash
docker-compose exec -T php composer update &&
docker-compose exec -T php php artisan migrate &&
docker-compose exec -T php php artisan config:cache &&
docker-compose exec -T php php artisan queue:restart


