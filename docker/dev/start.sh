#!/usr/bin/env bash

docker-compose down

docker-compose up -d

until docker exec xdebug-docker-php-dev php bin/console doctrine:migrations:migrate --no-interaction
do
    echo -en '\n'
    echo -n "Waiting mysql..."
    echo -en '\n'

    sleep 7

    echo -en '\n'
    echo -n "And try again to run migrations..."
    echo -en '\n'
done
