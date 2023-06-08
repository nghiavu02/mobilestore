
# Development Environment
Operating System: Ubuntu 

Web Server: Apache2 version 2.4.38

Language: PHP version 7.2

Database: Mysql version 5.7

Version control: Git, Github

# Some note
Project uses .htaccess file, so we need some configurations.

Remember to active module "mod_rewrite" of apache2. On ubuntu, enter command "sudo a2enmod rewrite".

Next, "set AllowOverwrite All" as below in /etc/apache2/apache.conf :

<Directory /var/www/my_app>
    Options Indexes FollowSymLinks
    AllowOverride All # this line is important
    Require all granted
</Directory>

# One admin account: 
Email: admin@gmail.com
Password: MobileShop123
