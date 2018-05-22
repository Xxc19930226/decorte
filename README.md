# decorte-cn-official-site

The Decorte China official site.

### Global Site

http://www.cosmedecorte.com.cn/

## LIVE Site Info

**LIVE IP:** 120.92.191.46

**LIVE frontend 1:** http://decorte-live.grandcomms.com/

**LIVE frontend 2:** http://cn.cosmedecorte.com/

**LIVE phpMyAdmin:** http://decorte-live-phpmyadmin.grandcomms.com

## Staging Site Info

**frontend:** http://decorte-staging.grandcomms.com/

**backend:** http://decorte-staging-admin.grandcomms.com/ **(backend down for now)**

## Server Info

### Staging

```
ip: 139.129.245.72 (legacy: 114.215.44.42)
user: root
pass: Decorte2017
project root: /var/www/decorte-cn-official-site

mysql: localhost
root password: Decorte@2017
dbname: cosmedecorte
username: cosmedecorte
password: Databasepass@2017
phpMyAdmin: http://decorte-staging-phpmyadmin.grandcomms.com/
```

## Installation

### mod_cthree

#### IMPORTANT! The source code from decorte global (Japan) need the mod_cthree to be installed.

See [this link](http://c3.broad.ne.jp/mod_cthree/compile.html) for more details.

Installing procedures:

```
// install dependencies
$ yum install gcc httpd httpd-devel ImageMagick ImageMagick-devel php-mbstring php-gd php-mcrypt

// download mod_cthree
$ wget http://c3.broad.ne.jp/mod_cthree/sources/mod_cthree-0.5-alpha8.tar.gz

// unpack and make and install
$ tar xvzf mod_cthree-0.5-alpha8.tar.gz
$ cd mod_cthree-0.5-alpha8
$ touch .deps
$ make basedir=/usr/lib64/httpd
$ make basedir=/usr/lib64/httpd install

// copy emoji.xml file to /etc/httpd/conf
$ cp emoji.xml /etc/httpd/conf
```

Config the /etc/httpd/conf/httpd.conf, add a line on top as follows:

```
LoadModule cthree_module modules/mod_cthree.so
...
```

### change owner of the whole project path to `apache:apache`

```
// cd to your project wrap path
$ chown apache:apache -R decorte-cn-official-site/
```

### Httpd Virtual Host Setting:

```
$ vim /etc/httpd/sites-available/decorte-staging.grandcomms.com.conf
```

Content:

```
<VirtualHost *:80>
    ServerName decorte-staging.grandcomms.com
    ServerAlias decorte-staging.grandcomms.com
	DocumentRoot "/var/www/decorte-cn-official-site/www/web"
    <Directory "/var/www/decorte-cn-official-site/www/web">
	    Options Indexes FollowSymLinks
	    DirectoryIndex index.php
	    AllowOverride All
	    Allow from All
	    Require all granted
	</Directory>
</VirtualHost>
```

```
$ vim /etc/httpd/sites-available/decorte-staging-admin.grandcomms.com.conf
```

Content:

```
<VirtualHost *:80>
    ServerName decorte-staging-admin.grandcomms.com
    ServerAlias decorte-staging-admin.grandcomms.com
	DocumentRoot "/var/www/decorte-cn-official-site/www/web/admin"
    <Directory "/var/www/decorte-cn-official-site/www/web/admin">
	    Options Indexes FollowSymLinks
	    DirectoryIndex index.php
	    AllowOverride All
	    Allow from All
	    Require all granted
	</Directory>
</VirtualHost>
```
111111
