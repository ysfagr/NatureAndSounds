#!/usr/bin/env bash
docker-compose exec -T php composer install &&
docker-compose exec -T php php artisan key:generate --ansi &&
docker-compose exec -T php php artisan migrate:refresh --seed &&
docker-compose exec -T php php artisan passport:install --force &&
docker-compose exec -T php php artisan config:cache &&
docker-compose exec -T php php artisan queue:restart
docker-compose exec -T php bash -c "chmod 0777 storage -R"