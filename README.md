## Install
`composer require zloadmin/laravel-keep2share:dev-master`
## Set configuration
Publish config file

` php artisan vendor:publish --provider="LaravelKeep2Share\Providers\Keep2ShareServiceProvider"`

In your .env file add access token

`KEEP2SHARE_ACCESS_TOKEN=your_token_here`

OR username and password

`KEEP2SHARE_USERNAME=your_username`

`KEEP2SHARE_PASSWORD=your_password`

## Using method getBalance()
```php
<?php
use LaravelKeep2Share\Facades\Keep2Share;
Keep2Share::getBalance();
```
## Using other methods 
This package only laravel facade for original API client (https://github.com/keep2share/api), you can use any public method as static method

```php
<?php

/** login **/
Keep2Share::login();

/** getFiles **/
Keep2Share::getFilesList('/', 10, 0, ['date_created'=>-1], 'files');

/** upload **/
Keep2Share::uploadFile('PATH-TO-LOCAL-FILE');

/** getUrl **/
Keep2Share::GetUrl('ID-FILE');

/** createFolder **/
Keep2Share::createFolder('Any name');

/** getBalance **/
Keep2Share::getBalance();

```



