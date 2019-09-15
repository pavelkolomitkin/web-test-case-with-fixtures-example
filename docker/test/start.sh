#!/usr/bin/env bash

docker-compose down
docker-compose --rm --force -v
docker volume rm test_mysql_data_test -f

docker-compose up -d

until docker exec xdebug-docker-php-test php bin/console doctrine:migrations:migrate --no-interaction
do
    echo -en '\n'
    echo -n "Waiting mysql..."
    echo -en '\n'

    sleep 7

    echo -en '\n'
    echo -n "And try again to run migrations..."
    echo -en '\n'
done

docker exec xdebug-docker-php-test php bin/phpunit


#docker-compose down
#docker-compose --rm --force -v
#docker volume rm test_mysql_data_test -f

exit 0