# MySQL Shared Server

Simple template implementation for MySQL database server deployed in Docker container.

You can specify the port that you need it to run on and custom database initialization script that will be executed after container is started.

You can also specify the custom location for the database files in case you may need to back them up after you finish using your container.

First, you have to build an image

```
docker build -t alexandergarbuz/dev-ops-utils-mysql .

```

<b>alexandergarbuz/dev-ops-utils-mysql</b> is the name of Docker image that needs to be build first.

Then you need to execute run command

```
docker run -d -p 3307:3307 --network=shared-network --name mysql-container --env-file=../../.env alexandergarbuz/dev-ops-utils-mysql

```

That will run the <b>alexandergarbuz/dev-ops-utils-mysql</b> image inside <b>mysql-container</b> and make port <b>3307</b> available for outside world.

Please note, that `shared-network` will need to be created prior running this command by running `docker network create shared-network`. If you not sure if this network alrady exists you can list existing networks by running `docker network ls` command. If you need to inspect if your container is already a part of this network you can run `docker network inspect shared-netowork` command and it will show you the containers on that network.

If you want to persist the changed to the database(s) made inside your container you can share the local directory and point MySQL instance running inside container at this directory by adding the following flag <b>-v "C:\tmp\docker\mysql:/var/lib/mysql"</b>. 

<b>C:\tmp\docker\mysql</b> is a local directory that need to be created prior running the container. 

And <b>/var/lib/mysql</b> is MySQL data directory inside the container.

A complete command looks like this:


```
mkdir C:\tmp\docker\mysql

docker run -d -v "C:\tmp\docker\mysql:/var/lib/mysql" -p 3307:3307 --network=shared-network --name mysql-container --env-file=../../.env alexandergarbuz/dev-ops-utils-mysql

```
This can be used for many situations. For example, when you need to run integration testing for large data driven application during your application build cycle. 



Being able to stop the container, replace the DB files by running `COPY` command and then starting the container back up will be much faster than running complicated init scripts with a bunch of insert statements.

For additional information on MySQL and Docker please visit

* [MySQL in Docker Hub](https://hub.docker.com/_/mysql/)

* [Accessing data Spring and MySQL](https://spring.io/guides/gs/accessing-data-mysql/)

* [Docker and Java Applications](https://docs.docker.com/language/java/)
