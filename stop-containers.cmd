@echo off

REM Stop and remove the MySQL container
echo Stopping MySQL container...

docker stop mysql-container
docker rm mysql-container

REM Stop and remove the PHP container
echo Stopping PHP container...

docker stop php-container
docker rm php-container

REM Optionally, you can also remove the Docker network if desired
echo Removing Docker network...
docker network rm shared-network

echo Done!
