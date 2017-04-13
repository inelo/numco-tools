NUMCO - Tools
=========

Cross platform tests in Behat.

Tests cover :

Compression in PHP and decompression in NodeJS.

Compression in NodeJS and decompression in PHP.

## Installation
```
$ composer install
$ npm install
```
## Running tests
```
$ cd tests
$ ../vendor/bin/behat
```

## NodeJS console tool for compressing and decompressing.
Compression:
```
$ node tools/numco-compress.js [1,2,3,4,5]
>> eJwtwSERAAAAArFCGPqXm/nbFwhCAaY=
```
Decompression:
```
$ node tools/numco-decompress.js eJwtwSERAAAAArFCGPqXm/nbFwhCAaY=
>> [1,2,3,4,5]
```

## PHP console tool for compressing and decompressing.
Compression:
```
$ php tools/numco-compress.php [1,2,3,4,5]
>> eJwz1DGEQAAIQgGm
```
Decompression:
```
$ php tools/numco-decompress.php eJwz1DGEQAAIQgGm
>> [1,2,3,4,5]
```
## PHP browser tool for compressing and decompressing.
Compression:
```
http://yourHost/numco-tools/tools/numco-compress.php?data=[1,3,4,5]
>> eJwz1DGEQAAIQgGm
```
Decompression:
```
http://yourHost/numco-tools/tools/numco-decompress.php?data=eJwz1DGEQAAIQgGm
>> [1,2,3,4,5]
```
