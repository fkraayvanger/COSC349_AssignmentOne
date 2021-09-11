# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  config.vm.define "homepage" do |homepage|
  	homepage.vm.box = "ubuntu/xenial64"
	homepage.vm.hostname = "HomePage"
  	homepage.vm.network "forwarded_port", guest: 80, host: 8080

  	homepage.vm.network "private_network", ip: "192.168.33.10"
  	homepage.vm.provision :shell, path: "www/homepage.sh"
  end

  config.vm.define "dbserver" do |dbserver|
        dbserver.vm.box = "ubuntu/xenial64"
        dbserver.vm.hostname = "dbserver"
        dbserver.vm.network "private_network", ip: "192.168.33.30"
        dbserver.vm.provision "shell", inline: <<-SHELL
             apt-get update
             export MYSQL_PWD='insecure_mysqlroot_pw'
             echo "mysql-server mysql-server/root_password password $MYSQL_PWD" | debconf-set-selections 
             echo "mysql-server mysql-server/root_password_again password $MYSQL_PWD" | debconf-set-selections
	     apt-get -y install mysql-server
 	     echo "CREATE DATABASE fvision;" | mysql
             echo "CREATE USER 'webuser'@'%' IDENTIFIED BY 'insecure_db_pw';" | mysql
             echo "GRANT ALL PRIVILEGES ON fvision.* TO 'webuser'@'%'" | mysql
             export MYSQL_PWD='insecure_db_pw'
             cat /vagrant/dog_database.sql | mysql -u webuser fvision
             sed -i'' -e '/bind-address/s/127.0.0.1/0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf
             service mysql restart
        SHELL
  end
end
