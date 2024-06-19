FROM mysql:8.4.0

# Set environment variables for the MySQL root password, database, user, and password
# These variables will be used to set up MySQL during the first run
ENV MYSQL_ROOT_PASSWORD=pass
ENV MYSQL_DATABASE=Test_DB
ENV MYSQL_USER=alex
ENV MYSQL_PASSWORD=garbuz
#ENV MYSQL_TCP_PORT=3307

# Copy the custom MySQL configuration file into the container
COPY my.cnf /etc/mysql/conf.d/my.cnf

# Copy initialization scripts into the Docker image
COPY init-database.sql /docker-entrypoint-initdb.d/

# Expose port 3307 to allow connections to the MySQL server
EXPOSE 3307

# Add a health check to verify that MySQL is up and running
HEALTHCHECK --interval=30s --timeout=10s --start-period=10s --retries=3  CMD mysqladmin ping -h localhost -u root --password=$MYSQL_ROOT_PASSWORD || exit 1