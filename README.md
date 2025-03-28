# WebMorph

WebMorph is the online version of PsychoMorph, which was originally developed by Bernie Tiddeman. You can get the desktop version of PsychoMorph here http://users.aber.ac.uk/bpt/jpsychomorph/

WebMorph is developed by Lisa DeBruine at the Face Research Lab at the University of Glasgow.

## How to install WebMorph on a local server

1. Set up Apache/PHP/MySQL/Tomcat (instructions below for OS X)
   
   1. Apache/PHP
      
      1. Update the hosts file
         
         ```bash
         sudo sed -i '' '$a\
         127.0.0.1 webmorph.test' /etc/hosts
         ```
      
      2. Update the httpd-vhosts.conf file (edit email and /path/to/webmorph below)
         
         ```bash
         sudo sed -i '' '$a\
         \
         <VirtualHost *:80>\
            ServerAdmin email@email.org\
            DocumentRoot "/path/to/webmorph"\
            ServerName webmorph.test\
            ErrorLog "/private/var/log/apache2/webmorph-error_log"\
            CustomLog "/private/var/log/apache2/webmorph-access_log" common\
         </VirtualHost>\
         \
         <IfModule mod_proxy.c>\
            ProxyRequests On\
            ProxyPreserveHost On\
            ProxyStatus On\
            ProxyPass /tomcat/ http://localhost:8080/\
            ProxyPassReverse /tomcat/ http://localhost:8080/\
         </IfModule>\
         \
         <Proxy *>\
            Require host localhost\
         </Proxy>' /etc/apache2/extra/httpd-vhosts.conf
         ```
      
      3. Make sure PHP is on. Open the httpd.conf file in your favourite editor (e.g., `sudo nano /etc/apache2/httpd.conf`) 
         and remove preceding # from "#LoadModule php5_module libexec/apache2/libphp5.so".
      
      4. Restart Apache 
         
         ```bash
         sudo apachectl restart
         ```
   
   2. MySQL
      
      1. Install Homebrew
         
         ```bash
         ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
         ```
      
      2. Install MariaDB (version of MySQL)
         
         ```bash
         brew install mariadb
         ```
      
      3. Set Mysql root user (edit password) 
         
         ```bash
         mysqladmin -u root password 'mysecretpassword'
         ```
      
      4. Create database (update /path/to/webmorph below)
         
         ```bash
         mysql -u root -p
         ```
         
         ```sql
         CREATE DATABASE psychomorph;
         USE psychomorph;
         \. /path/to/webmorph/resources/mysql/db.sql
         \. /path/to/webmorph/resources/mysql/tems.sql
         ```
   
   3. Tomcat
      
      1. Install Java JDK (1.8.x) ( http://www.oracle.com/technetwork/java/javase/downloads/ )
      
      2. Install Tomcat 7.0.x in /usr/local/ ( https://tomcat.apache.org/download-70.cgi )
         
         1. Link your tomcat folder to /usr/local/tomcat, make shell scripts executable, and start as _www user
            
            ```bash
            sudo ln -s /usr/local/apache-tomcat-7.0.54 /usr/local/tomcat
            sudo chmod +x /usr/local/tomcat/bin/*.sh
            sudo -u _www "/usr/local/tomcat/bin/startup.sh"'
            ```

2. Make a secure images folder (change /secure/path below to something outside your DocumentRoot

```bash
mkdir /secure/path/images
sudo chown _www /secure/path/images
sudo chmod 777 /secure/path/images
```
