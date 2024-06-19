CREATE DATABASE IF NOT EXISTS Test_DB;

USE Test_DB;

CREATE TABLE IF NOT EXISTS User (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
);


INSERT INTO User (username, email) VALUES
('john_doe', 'john@example.com'),
('jane_smith', 'jane@example.com');