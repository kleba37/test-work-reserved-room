# Makefile for Laravel Docker project

.PHONY: help build up start stop down restart status logs logs-app logs-nginx logs-db \
		composer-install composer-update npm-install npm-dev npm-watch \
		artisan key artisan-migrate artisan-migrate-fresh artisan-seed \
		shell-app shell-nginx shell-db shell-composer shell-npm \
		db-create db-drop db-reset db-psql

help:
	@echo "Available commands:"
	@echo "  build         - Build all containers"
	@echo "  up            - Create and start containers"
	@echo "  start         - Start existing containers"
	@echo "  stop          - Stop running containers"
	@echo "  down          - Stop and remove containers"
	@echo "  restart       - Restart all containers"
	@echo "  status        - Show container status"
	@echo "  logs          - Show all logs"
	@echo "  logs-app      - Show app logs"
	@echo "  logs-nginx    - Show nginx logs"
	@echo "  logs-db       - Show database logs"
	@echo ""
	@echo "  composer-install - Run composer install"
	@echo "  composer-update - Run composer update"
	@echo ""
	@echo "  artisan       - Run artisan command (make artisan cmd='migrate')"
	@echo "  artisan-key   - Generate application key"
	@echo "  artisan-migrate - Run migrations"
	@echo "  artisan-migrate-fresh - Run fresh migrations"
	@echo "  artisan-seed  - Run database seed"
	@echo ""
	@echo "  shell-app     - Enter app container shell"
	@echo "  shell-nginx   - Enter nginx container shell"
	@echo "  shell-composer - Enter composer container shell"
	@echo ""
	@echo "  db-create     - Create database"
	@echo "  db-drop       - Drop database"
	@echo "  db-reset      - Reset database (drop & create)"
	@echo "  db-psql       - Connect to database with psql"

# Docker commands
build:
	docker-compose build

up:
	docker-compose up -d

start:
	docker-compose start

stop:
	docker-compose stop

down:
	docker-compose down

restart: stop start

status:
	docker-compose ps

logs:
	docker-compose logs -f

logs-app:
	docker-compose logs -f app

logs-nginx:
	docker-compose logs -f webserver

logs-db:
	docker-compose logs -f postgres

# Composer commands
composer-install:
	docker-compose run --rm composer install

composer-update:
	docker-compose run --rm composer update

# Artisan commands
artisan:
	docker-compose exec app php artisan $(cmd)

artisan-key:
	docker-compose exec app php artisan key:generate

artisan-migrate:
	docker-compose exec app php artisan migrate

artisan-migrate-fresh:
	docker-compose exec app php artisan migrate:fresh

artisan-seed:
	docker-compose exec app php artisan db:seed

# Shell access
shell-app:
	docker-compose exec app bash

shell-composer:
	docker-compose run --rm composer sh

# Database operations
db-create:
	docker-compose exec postgres createdb -U laravel laravel

db-drop:
	docker-compose exec postgres dropdb -U laravel laravel

db-reset: db-drop db-create

db-psql:
	docker-compose exec postgres psql -U laravel laravel
