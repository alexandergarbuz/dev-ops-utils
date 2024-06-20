# PHP Shared Project

Simple template implementation for PHP project that connects to MySQL database deployed in Docker container.

You can specify the port that you need it to run on and custom database connection inside .env file.


First, you have to build an image

```
docker build -t alexandergarbuz/dev-ops-utils-php .

```

<b>alexandergarbuz/dev-ops-utils-php</b> is the name of Docker image that needs to be build first.

Then you need to execute run command

```
docker run -d -p 80:80 --network=shared-network --name alexandergarbuz/dev-ops-utils-php-container --env-file=../../.env alexandergarbuz/dev-ops-utils-alexandergarbuz/dev-ops-utils-php

```

That will run the <b>alexandergarbuz/dev-ops-utils-php</b> image inside <b>alexandergarbuz/dev-ops-utils-php-container</b> and make port <b>80</b> available for outside world


A complete command looks like this:


```
mkdir C:\tmp\docker\mysql

docker run -d -v ".:/var/www/html/public" -p 80:80 --network=shared-network --name php-container --env-file=../../.env alexandergarbuz/dev-ops-utils-php

```
This can be used for local development when you don't need to install PHP locally. This allowes you to map any directory in your local file system to server root of a web server.

