# form-with-db
# Update the System
sudo apt update
sudo apt upgrade -y

# Install Apache, PHP, and MySQL
'''
sudo apt install apache2 php libapache2-mod-php php-mysql mysql-server -y '''

# sudo mysql_secure_installation
Log in to MySQL as root:


sudo mysql -u root -p

Create a new database and user:

CREATE DATABASE simple_form;
CREATE USER 'form_user'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON simple_form.* TO 'form_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;

# Create an HTML file in the Apache web root directory:

sudo nano /var/www/html/index.html

# Create PHP Script to Handle Form Submission
# Create a PHP file to handle the form data:

sudo nano /var/www/html/submit.php

# Create the MySQL Table
Log in to MySQL and create a table for form submissions:

sudo mysql -u root -p

# sql

USE simple_form;

CREATE TABLE submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

# 9. Set Permissions
Ensure Apache has the necessary permissions:

sudo chown -R www-data:www-data /var/www/html/
sudo chmod -R 755 /var/www/html/

# 10. Restart Apache

sudo systemctl restart apache2
# HIT EC2 ip 
####################################
to view data
# login to mysql 

sudo mysql -u root -p

# Check the data in the table:

USE simple_form;

SELECT * FROM submissions;
# optional to delete database entry

DELETE FROM submissions WHERE id=1;