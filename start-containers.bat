@echo off

REM Change to the MySQL directory
cd ./database/mysql

REM Build the MySQL Docker image
echo Building MySQL Docker image...
docker build -t alexandergarbuz/dev-ops-utils-mysql .

REM Going back to ROOT directory
echo Going back to ROOT directory
cd ../../


REM Change to the PHP application directory
cd ./app/php

REM Build the PHP Docker image
echo Building PHP Docker image...
docker build -t alexandergarbuz/dev-ops-utils-php .

REM Going back to ROOT directory
echo Going back to ROOT directory
cd ../../

REM Create Docker network
echo Creating Docker network...
docker network create shared-network





REM Launch MySQL container with --rm flag
echo Launching MySQL container...
cd ./database/mysql
docker run -d -v "C:\tmp\docker\mysql:/var/lib/mysql" -p 3307:3307 --network=shared-network --name mysql-container --env-file="../../.env" alexandergarbuz/dev-ops-utils-mysql

REM Going back to ROOT directory
echo Going back to ROOT directory
cd ../../

REM Launch PHP container with --rm flag
echo Launching PHP container...
cd ./app/php
docker run -d -v ".:/var/www/html/public" -p 80:80 --network=shared-network --name php-container --env-file="../../.env" alexandergarbuz/dev-ops-utils-php

REM Going back to ROOT directory
echo Going back to ROOT directory
cd ../../

echo Done!
