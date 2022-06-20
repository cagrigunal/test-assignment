start: docker-up install
up: docker-up
stop: docker-down

MYUID := $(shell id -u)
MYGID := $(shell id -g)

docker-up:
	UID=${MYUID} GID=${MYGID} docker-compose up -d --build

install:
	docker exec -u maileruser:mailergroup mailer-php composer install

docker-down:
	docker-compose down

test:
	docker exec -u maileruser:mailergroup mailer-php ./vendor/bin/phpunit

migrate:
	docker exec -u maileruser:mailergroup mailer-php php artisan migrate

migrate-fresh:
	docker exec -u maileruser:mailergroup mailer-php php artisan migrate:fresh

