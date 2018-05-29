# Virtualizor API Wrapper [![Build Status](https://travis-ci.org/bennetgallein/VirtualizorPHP.svg?branch=master)](https://travis-ci.org/bennetgallein/VirtualizorPHP)
This is a wrapper for the API for Virtualizor. Documentation for this Version of the API can be found here:
http://virtualizor.com/admin-api/#virtual-servers . Own Documentation will follow.

## Installation
Install this library via composer is pretty easy. 
```
composer require bennetgallein/virtualizor-php
```
And then you can get started with your project.

## Object Description:

Every call starts by Initializing the `Virtualizor` Object. Once initialized you can use it over and over again.
```php
$virt = new \Virtualizor\Virtualizor("ip", "key", "pass", "port");
```

### ServerInfo

Get some information about the master
```php
$info = json_decode($virt->serverInfo());
```

### VirtualServer:
Create a new VirtualServer Object by using the following:
```php
$virtualobject = $virt->vps();
```
Add Attributes and set the Act Method, then execute the query.
```php
$vps = $virtualobject->setAct(\Virtualizor\Objects\VirtualServer::REBUILD)->setHostname("hostname_1")->exec();
```

### IPPool
Create a new IPPool Object by using the following:
```php
$virtualobject = $virt->ippool();
```
List all pools:
```php
$pools = $virtualobject->setAct(\Virtualizor\Objects\IPPool::LISTPOOLS)->exec();
```

### OSTemplates
Create a new OSTemplates Object by using the following:
```php
$virtualobject = $virt->ostemplates();
```
List all templates:
```php
$ostemplates = $virtualobject->setAct(\Virtualizor\Objects\OSTemplates::LISTOS)->exec();
```
