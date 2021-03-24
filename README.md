# laravel-assimp2amc

[![Latest Version on Packagist](https://img.shields.io/packagist/v/soiposervices/laravel-assimp2amc.svg?style=flat-square)](https://packagist.org/packages/soiposervices/laravel-assimp2amc)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/soiposervices/laravel-assimp2amc/run-tests?label=tests)](https://github.com/soiposervices/laravel-assimp2amc/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/soiposervices/laravel-assimp2amc/Check%20&%20fix%20styling?label=code%20style)](https://github.com/soiposervices/laravel-assimp2amc/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/soiposervices/laravel-assimp2amc.svg?style=flat-square)](https://packagist.org/packages/soiposervices/laravel-assimp2amc)


This package can be used to verify that in a given folder, the .obj has all the required files to be run as a binary 3d model.

## Compile 

`docker  run -v "$PWD/vendor/artglass/assimp2amc/assimp2amc:/home" -w "/home" -i -t  mcr.microsoft.com/dotnet/sdk:5.0-alpine dotnet publish -r linux-x64 -p:PublishSingleFile=true --self-contained true`

The compiled file will be stored in `/vendor/artglass/assimp2amc/assimp2amc/bin/Debug/netcoreapp3.1/linux-x64/publish`

`cp $PWD/vendor/artglass/assimp2amc/assimp2amc/bin/Debug/netcoreapp3.1/linux-x64/publish/assimp2amc .`  

or simply run:

`composer compile`

## Run assimp2amc on obj 

`docker  run -v "$PWD:/home" -w "/home" -i -t alpine ./assimp2amc -c src/ExampleModelData/851e122f30504b90ae495fe567342936.obj`


## Installation

You can install the package via composer:

```bash
composer require soiposervices/assimp2amc
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="SoipoServices\Assimp2AmcServiceProvider" --tag="assimp2amc-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="SoipoServices\Assimp2AmcServiceProvider" --tag="assimp2amc-config"
```

This is the contents of the published config file:

```php
return [
    'bash_script' => './',
    'path_to_executable' => 'src/assimp2amcosx'
];
```

## Usage

```php
$laravel-assimp2amc = new SoipoServices\Assimp2Amc();
echo $laravel-assimp2amc->run('src/ExampleModelData/851e122f30504b90ae495fe567342936.obj');
```

```laravel
Assimp2Amc::run('src/ExampleModelData/851e122f30504b90ae495fe567342936.obj');
```

## Testing

Make sure you compile first in order to have the excutable in the src folder

```bash
composer compile
```

or for mac:

```bash
composer compile-osx
```
You should also have a folder containing 3d model .obj file with its assets in a folder called ExampleModelData in the src folder.

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Luigi Laezza](https://github.com/soiposervices)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
