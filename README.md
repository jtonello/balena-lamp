balenaCloud Lamp Stack
===================================

### Introduction
This project creates three containerized services -- apache, mysql and php -- that together provide a basic LAMP stack.

```
/lamp-stack/
├── apache
│   ├── Dockerfile
│   └── demo.apache.conf
├── docker-compose.yml
├── php
│   └── Dockerfile
│   └── index.php
```

Apache and PHP are build during the balena push action, but MYSQL is pulled from the public mysql:5.7 image. The apache service depends on both mysql and php and shares a the /var/www/html volume with php. This is the location of the main index.php file, which runs a test connection to mysql. Notice that the hostname is set to "mysql", which is resolvable by name based on the network configuration.

Two networks are used. The frontend network enables external connections to port 80. The backend network enables php and mysql to use non-public ports to reach apache.

Note that specific versions of the images are defined here. These could be replaced with :latest or other versions that suit your needs. The mysql passwords should be changed for more production uses, and a future version will embed the passwords in a secrets file.

Clone this repository and then run:
```
 $ balena push <appname>

```

