###############################################################################
#      _            _              _
#   __| | _____   _| |_ ___   ___ | |___
#  / _` |/ _ \ \ / / __/ _ \ / _ \| / __|
# | (_| |  __/\ V /| || (_) | (_) | \__ \
#  \__,_|\___| \_/  \__\___/ \___/|_|___/
#
#
###############################################################################
.DEFAULT_GOAL := default

#
# Bring up the dev containers
#
docker-up:
	@echo "##### Bringing up Dev Containers #####"
	@(docker compose up -d)

#
# Bring down the dev containers
#
docker-down:
	@echo "##### Bringing down Dev Containers #####"
	@(docker compose down)

#
# Execute a Bash terminal on the dev php container
#
docker-bash: docker-up
	@echo "##### Dev php Container Bash Prompt #####"
	@(docker compose exec php bash)

#
# Execute tests against the dev php container
#
docker-test: docker-up
	@echo "##### Dev php Container Tests #####"
	@(docker compose exec php composer tests)


#
# Build the production docker files
#
docker-install: docker-up
	@echo "##### Installing Composer Dependencies #####"
	@(docker compose exec php composer install)

#
# Build the production docker files
#
docker-build:
	@echo "##### Building Production Containers #####"
	@docker compose build php

#
# build and bring up the production containers
#
default: docker-build docker-up