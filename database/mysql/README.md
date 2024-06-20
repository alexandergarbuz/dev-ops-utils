# MySQL Shared Server

Simple template implementation for MySQL datbase server deployed in Docker container.

You can specify the port that you need it to run on and custom database initialization script that will be executed after container is started.

You can also specify the custom location for the database files in case you may need to back them up after you finish using your container.

To execute run the following commands

```

mkdir C:\tmp\docker\mysql

docker build -t mysql-shared .

docker run -i -d -v "C:\tmp\docker\mysql:/var/lib/mysql" -p 3307:3307 --name mysql-shared-container mysql-shared

```
