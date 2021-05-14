sail := "./vendor/bin/sail"
.DEFAULT_GOAL := help
.PHONY: help
help: ## Affiche cette aide
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: install test deploy

vendor: composer.json ## Installe les packages
	composer install

composer.lock: composer.json ## Mets à jour les packages
	composer update

install: vendor composer.lock

test: install ## Lance les tests
	$(sail) artisan test

.PHONY: stop-and-start
stop-and-start: install ## stop all services and then start the project
	sudo chmod +x ./tools/bash/stop-services.sh && sudo ./tools/bash/stop-services.sh && make start

.PHONY: start
start: ## Run docker to start the project
	$(sail) up

# -----------------------------------
# Déploiement
# -----------------------------------
./vendor/czproject/git-php: ## Installation de GitPHP
	$(sail) composer require --dev czproject/git-php

.PHONY: push
push: ./vendor/czproject/git-php ## déploiement sur github
	php artisan git:push

.PHONY: provision
provision: ## Configure la machine distante
	ansible-playbook --vault-password-file tools/ansible/.vault_pass -i tools/ansible/hosts.yml tools/ansible/install/install.yml

./vendor/bin/phpstan: ## Installation de phpstan
	$(sail) composer require --dev nunomaduro/larastan

.PHONY: lint
lint: ./vendor/bin/phpstan phpstan.neon ## Lance phpstan pour l'analyse static que code
	docker-compose exec -u sail "laravel.test" ./vendor/bin/phpstan analyse --memory-limit=2G
.PHONY: build-assets
 build-assets:
	$(sail) yarn prod
.PHONY: deploy
deploy: test lint build-assets push  ## Déploiement sur le serveur
	ansible-playbook --vault-password-file tools/ansible/.vault_pass -i tools/ansible/hosts.yml tools/ansible/deploy.yml

.PHONY: just-deploy
just-deploy: build-assets push
	ansible-playbook --vault-password-file tools/ansible/.vault_pass -i tools/ansible/hosts.yml tools/ansible/deploy.yml

.PHONY: sprite
sprite: svg-sprite.js ## Combine les fichiers svg ensemble
	./svg-sprite.js -d public/images/icons -o public/images/sprite.svg
