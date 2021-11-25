FROM centos:7 
RUN yum install epel-release yum-utils -y 
RUN yum install -y http://rpms.remirepo.net/enterprise/remi-release-7.rpm 
RUN yum-config-manager --enable remi-php74 
RUN yum install php php-xml php-common php-apcache php-mcrypt php-zip php-cli php-gd php-curl php-mysql -y 
RUN yum install wget unzip -y 
RUN yum clean all 
RUN curl -sS https://getcomposer.org/installer | php -- \
--install-dir=/usr/bin --filename=composer
COPY ./httpd.conf /etc/httpd/conf/httpd.conf 
COPY ./code/additem.php /var/www/html/additem.php
COPY ./code/assets /var/www/html/assets
COPY ./code/composer.json /var/www/html/composer.json
COPY ./code/config.php /var/www/html/config.php
COPY ./code/css /var/www/html/css
COPY ./code/delete.php /var/www/html/delete.php
COPY ./code/edit.php /var/www/html/edit.php
COPY ./code/fonts /var/www/html/fonts
COPY ./code/index.php /var/www/html/index.php
COPY ./code/LICENSE.txt /var/www/html/LICENSE.txt
COPY ./code/scripts /var/www/html/scripts
COPY ./code/table.php /var/www/html/table.php
WORKDIR /var/www/html/
RUN composer install
EXPOSE 8092 
CMD ["httpd", "-D", "FOREGROUND"] 