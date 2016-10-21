# Golem Auth

[![Latest Stable Version](https://poser.pugx.org/golem/auth-storage-symfony/v/stable.png)](https://packagist.org/packages/golem/auth-storage-symfony)
[![Build Status](https://travis-ci.org/spekkionu/golem-auth-storage-symfony.svg?branch=master)](https://travis-ci.org/spekkionu/golem-auth-storage-symfony)
[![Code Coverage](https://scrutinizer-ci.com/g/spekkionu/golem-auth-storage-symfony/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/spekkionu/golem-auth-storage-symfony/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/spekkionu/golem-auth-storage-symfony/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/spekkionu/golem-auth-storage-symfony/?branch=master)
[![Total Downloads](https://poser.pugx.org/golem/auth-storage-symfony/downloads.png)](https://packagist.org/packages/golem/auth-storage-symfony)

Symfony Session storage adapter for Golem Auth

## Install

Via Composer

``` bash
$ composer require golem/auth-storage-symfony
```

## Usage

Follow the documentation on [Golem Auth](https://github.com/spekkionu/golem-auth) to create a user model and a user repository class.

``` php
use ;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Symfony\Component\HttpFoundation\Session\Storage\Handler\NativeFileSessionHandler;

// configure the symfony session as usual
$session_storage = new NativeSessionStorage(array(), new NativeFileSessionHandler());
$session = new Session($session_storage);

$storage = new \Golem\Auth\Storage\SymfonySessionStorage($session);
// get an instance of your user repository however you need to
$userRepository = new UserRepository($database_connection);
$auth = new \Golem\Auth($storage, $userRepository);
```

## Testing

``` bash
$ composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
