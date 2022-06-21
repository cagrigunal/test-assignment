start: docker-up install vite
up: docker-up
stop: docker-down

MYUID := $(shell id -u)
MYGID := $(shell id -g)

docker-up:
	UID=${MYUID} GID=${MYGID} docker-compose up -d --build

install:
	docker exec -u maileruser:mailergroup mailer-php composer install

vite-build:
    docker exec -u maileruser:mailergroup my_frontend npm run build

vite:
    docker exec -u maileruser:mailergroup my_frontend npm install



docker-down:
	docker-compose down

test:
	docker exec -u maileruser:mailergroup mailer-php ./vendor/bin/phpunit

migrate:
	docker exec -u maileruser:mailergroup mailer-php php artisan migrate

migrate-fresh:
	docker exec -u maileruser:mailergroup mailer-php php artisan migrate:fresh

npm-install:
	docker exec -u maileruser:mailergroup mailer-php npm install