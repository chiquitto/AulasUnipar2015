# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = '2'

@script = <<SCRIPT
DOCUMENT_ROOT="/var/www/unipar2015"
MYSQL_ROOT_PASSWORD="123456"
#sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password $MYSQL_ROOT_PASSWORD'
#sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password $MYSQL_ROOT_PASSWORD'
apt-get update
apt-get install -y apache2 git curl php5-cli php5 php5-intl libapache2-mod-php5
#apt-get install -y mysql-server apache2 libapache2-mod-php5 php5 php5-mysql git curl php5-cli php5 php5-intl
echo "
<VirtualHost *:80>
    ServerName unipar2015
    DocumentRoot $DOCUMENT_ROOT
    <Directory $DOCUMENT_ROOT>
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>
" > /etc/apache2/sites-available/unipar2015.conf
a2enmod rewrite
a2dissite 000-default
a2ensite unipar2015
service apache2 restart
# cd /var/www/unipar2015
# curl -Ss https://getcomposer.org/installer | php
# php composer.phar install --no-progress
echo "** Visit http://localhost:8085 in your browser for to view the application **"
SCRIPT

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = 'bento/ubuntu-14.04'
  config.vm.network "forwarded_port", guest: 80, host: 8085
  # config.vm.network "private_network", ip: "192.168.56.101"
  # config.vm.network :private_network, type: :dhcp
  # config.vm.network "public_network"
  config.vm.hostname = "unipar2015"
  config.vm.synced_folder '.', '/var/www/unipar2015'
  config.vm.provision 'shell', inline: @script

  config.vm.provider "virtualbox" do |vb|
    vb.customize ["modifyvm", :id, "--memory", "1024"]
  end

end
