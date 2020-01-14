balenaCloud Lamp Stack
===================================

### Introduction
This project creates three containerized services -- apache, mysql and php -- that together provide a basic LAMP stack.

```
/balenaLamp/
├── .balena
│   ├── secrets
│   └── balena.yml
├── apache
│   ├── Dockerfile
│   └── demo.apache.conf
├── docker-compose.yml
├── php
│   └── Dockerfile
│   └── index.php
```

Apache, PHP and MySQL are built during the balena push action. The apache service depends on both mysql and php and shares a the /var/www/html volume with php. This is the location of the main index.php file, which runs a test connection to mysql. Notice that the hostname in this file is set to "mysql" (not localhost), and is resolvable by name based on the network configuration.

Two networks are used. The frontend network enables external connections to port 80. The backend network enables php and mysql to use non-public ports to reach apache.

Note that specific versions of each Docker image is defined in each Dockerfile.template. These could be replaced with :latest or other versions that suit your needs. The mysql passwords, database name and username are set as variables from the .balena/balena.yml file. You should change them for production uses, but be sure to update the php/index.php file to match. 

Clone this repository, change into the balenaLamp directory and push to your application:

```
 $ git clone git@github.com:jtonello/balenaLamp.git
 $ cd balenaLamp
 $ balena push <appname>
```

