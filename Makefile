start:
		docker-compose up -d

stop:
		docker-compose down

restart:
		docker-compose down && docker-compose up -d

logs:
		docker-compose logs -f

build:
		docker-compose build

ps:
		docker-compose ps

work:
		docker-compose exec backend php artisan queue:work -d
