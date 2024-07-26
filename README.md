# Clone this repo
git clone https://github.com/j

# Setup Instructions
1. Create a MySQL database for the SQL Injection challenge:

CREATE DATABASE ctf;
USE ctf;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL
);
INSERT INTO users (username) VALUES ('admin');

2. Save each PHP file to your web server directory (e.g., /var/www/html/).

3. Set up the web server (e.g., Apache or Nginx) to serve these files.

4. Access the main page in your browser: http://yourserver/index.php
