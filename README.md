balenaCloud Lamp Stack
===================================

### Introduction
This project creates three containerized services -- _apache_, _mysql_ and _php_ -- that together provide a basic LAMP stack.

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

Apache, PHP and MySQL are built during the balena push action. The apache service depends on both _mysql_ and _php_ and shares a the _/var/www/html_ volume with _php_. This is the location of the main _index.php_ file, which runs a test connection to _mysql_. Notice that the hostname in this file is set to _"mysql"_ (not localhost), and is resolvable by name based on the network configuration.

Two networks are used. The _frontend_ network enables external connections to port 80. The _backend_ network enables _php_ and _mysql_ to use non-public ports to reach _apache_.

Note that specific versions of each Docker image is defined in each _Dockerfile.template_. These could be replaced with _:latest_ or other versions that suit your needs. The _mysql_ passwords, database name and username are set as variables from the _.balena/balena.yml_ file. You should change them for production uses, but be sure to update the _php/index.php_ file to match. 

Clone this repository, change into the balenaLamp directory and push to your application:

```
 $ git clone git@github.com:jtonello/balenaLamp.git
 $ cd balenaLamp
 $ balena push <appname>
```

