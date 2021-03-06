# -*- mode: ruby -*-
# vi: set ft=ruby :

# A Vagrantfile to set up two VMs, a webserver and a database server,
# connected together using an internal network with manually-assigned
# IP addresses for the VMs.

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"

 
  config.vm.define "webserver" do |webserver|
    # These are options specific to the webserver VM
    webserver.vm.hostname = "webserver"
   
    webserver.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"
    
    
    webserver.vm.network "private_network", ip: "192.168.2.11"

   
    webserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    
    webserver.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2 php libapache2-mod-php php-mysql
            
      # Change VM's webserver's configuration to use shared folder.
      # (Look inside test-website.conf for specifics.)
      cp /vagrant/test-website.conf /etc/apache2/sites-available/
      # activate our website configuration ...
      a2ensite test-website
      # ... and disable the default website provided with Apache
      a2dissite 000-default
      # Reload the webserver configuration, to pick up our changes
      service apache2 reload
    SHELL
  end

  config.vm.define "adminserver" do |adminserver|
    # These are options specific to the webserver VM
    adminserver.vm.hostname = "adminserver"
    
    adminserver.vm.network "forwarded_port", guest: 80, host: 8081, host_ip: "127.0.0.1"
    
    
    adminserver.vm.network "private_network", ip: "192.168.2.13"

    
    adminserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    
    adminserver.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2 php libapache2-mod-php php-mysql
            
      # Change VM's webserver's configuration to use shared folder.
      # (Look inside test-website.conf for specifics.)
      cp /vagrant/admin-website.conf /etc/apache2/sites-available/
      # activate our website configuration ...
      a2ensite admin-website
      # ... and disable the default website provided with Apache
      a2dissite 000-default
      # Reload the webserver configuration, to pick up our changes
      service apache2 reload
    SHELL
  end

  # Here is the section for defining the database server, which I have
  # named "dbserver".
  config.vm.define "dbserver" do |dbserver|
    dbserver.vm.hostname = "dbserver"
    # Note that the IP address is different from that of the webserver
    # above: it is important that no two VMs attempt to use the same
    # IP address on the private_network.
    dbserver.vm.network "private_network", ip: "192.168.2.12"
    dbserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]
    
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

#  LocalWords:  webserver xenial64

