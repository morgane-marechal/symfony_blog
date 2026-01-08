.DEFAULT_GOAL := help

help:
	@echo "Commandes disponibles :"
	@echo "  make up        → lancer les containers"
	@echo "  make build     → reconstruire les images"
	@echo "  make down      → arrêter les containers"
	@echo "  make bash      → entrer dans le container PHP"
	@echo "  make migrate   → lancer les migrations"
	
up:
	docker compose up -d --build

down:
	docker compose down

bash:
	docker exec -it blog-php-1 bash

migration:
	docker exec -it blog-php-1 php bin/console make:migration

migrate:
	docker exec -it blog-php-1 php bin/console doctrine:migrations:migrate