# kenwood backup database

- [Introduction](#introduction)
- [Installation](#installation)
- [Config](#config)
- [Documentation](#documentation)
- [Databases Supported](#databases-supportes)
- [Road map](#road-map)
- [License](#license)

## Introduction
A simple and light-weight sistem to backup your database.

## Installation
Simply install the package through Composer. From here the package will automatically register its service provider.

```
composer require kenwood/DBbackup
```

### Config
To publish the config file, run the following:

```
php artisan vendor:publish --provider="kenwood\DBbackup\DatabaseBackupServiceProvider" --tag="config"
```

## Documentation
this paquetto was created to make backups from the laravel console, and send these backups by email.
the commands for backing up are:
```
php artisan db:backup
```
to apply a backup:
```
php artisan db:applyBackup
```
and to send the email is:
```
php artisan db:sendBackup
```
or back up and send it:
```
php artisan db:backup --send
```

## Databases supported
- [MYSQL]
- [Postgre SQL]

## Road map

DBbackup is still under strong development, I decided to ship it at this early stage so that you can help me improve it, however I am already using it on many websites.

Here's the plan for what's coming:

- [x] Support MYSQL
- [x] Support PostgreSql
- [x] Send mail with backup
- [ ] Support SQL Server
- [ ] Support SQL lite
- [ ] Can upload backup on cloud like s3 or others

## Problems
If you discover any problem related issues, please email kenwoodinternationalcorp@gmail.com directly instead of using the issue tracker.

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
