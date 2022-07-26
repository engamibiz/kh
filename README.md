# kh-ree 
## Laravel Configuration
```bash
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed
```
## Permissions & Ownership
```bash
$ sudo chown -R my-user:www-data /var/www/kh-ree
$ sudo find /var/www/kh-ree -type f -exec chmod 664 {} \;
$ sudo find /var/www/kh-ree -type d -exec chmod 775 {} \;
$ cd /var/www/kh-ree
$ sudo chgrp -R www-data storage bootstrap/cache
$ sudo chmod -R ug+rwx storage bootstrap/cache
```
## Virtual Host Setup
```bash
$ vi /etc/apache2/sites-available/kh-ree.local.com.conf
```
```
<VirtualHost 127.0.0.1:80>
    ServerName kh-ree.local.com
    DocumentRoot "/var/www/kh-ree/public"
    DirectoryIndex index.php
    <Directory "/var/www/kh-ree/public">
        Options All
        AllowOverride All
        Order Allow,Deny
        Allow from all
    </Directory>
</VirtualHost>
```
```bash
$ a2ensite kh-ree.local.com
$ service apache2 restart
$ vi /etc/hosts
```
```
127.0.0.1	kh-ree.local.com
```
```bash
$ service apache2 restart
```
```bash
$ cd /var/www/kh-ree
$ vi .env
```
```
APP_URL=http://kh-ree.local.com
```
#### [http://kh-ree.local.com](http://kh-ree.local.com)
## Admin Panel
URL     : [http://kh-ree.local.com/en/auth/login](http://kh-ree.local.com/en/auth/login)
Username: technical_support@8worx.com
Password: 123456
    
#   k h  
 #   k h  
 