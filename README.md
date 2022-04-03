## Install
`composer require zloadmin/laravel-transmission-php:dev-master`
## Set configuration
Publish config file

` php artisan vendor:publish --provider="TransmissionPHP\Providers\TransmissionProvider"`

In your .env file add your parameters 

`TRANSMISSION_HOST=localhost`
`TRANSMISSION_PORT=9091`
`TRANSMISSION_PATH=/transmission/rpc`

If you use auth add username and password

`TRANSMISSION_USERNAME=username`
`TRANSMISSION_PASSWORD=password`

## Using 
```php
<?php
use TransmissionPHP\Facades\Transmission;
$all_torrents = Transmission::all();
```

## Using other methods
This package only laravel facade for original API client (https://github.com/kleiram/transmission-php), you can use any public method as static method

```php
<?php

use TransmissionPHP\Facades\Transmission;


// Getting all the torrents currently in the download queue
$torrents = Transmission::all();

// Getting a specific torrent from the download queue
$torrent = Transmission::get(1);

// (you can also get a torrent by the hash of the torrent)
$torrent = Transmission::get(/* torrent hash */);

// Adding a torrent to the download queue
$torrent = Transmission::add(/* path to torrent */);

// Removing a torrent from the download queue
$torrent = Transmission::get(1);
Transmission::remove($torrent);

// Or if you want to delete all local data too
Transmission::remove($torrent, true);

// You can also get the Trackers that the torrent currently uses
// These are instances of the Transmission\Model\Tracker class
$trackers = $torrent->getTrackers();

// You can also get the Trackers statistics and info that the torrent currently has
// These are instances of the Transmission\Model\trackerStats class
$trackerStats = $torrent->getTrackerStats();

// To get the start date/time of the torrent in UNIX Timestamp format
$startTime = $torrent->getStartDate();

// To get the number of peers connected
$connectedPeers = $torrent->getPeersConnected();

// Getting the files downloaded by the torrent are available too
// These are instances of Transmission\Model\File
$files = $torrent->getFiles();

// You can start, stop, verify the torrent and ask the tracker for
// more peers to connect to
Transmission::stop($torrent);
Transmission::start($torrent);
Transmission::start($torrent, true); // Pass true if you want to start the torrent immediatly
Transmission::verify($torrent);
Transmission::reannounce($torrent);

```
