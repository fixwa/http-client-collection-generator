# HTTP Client - Collection Generator

This tool was created to facilitate the generation of import files (in JSON format) compatible with HTTP-Clients/API-Clients like [Postman](https://www.postman.com/) or [Insomnia](https://insomnia.rest/) to programmatically collect requests and automate such task for documentation or analysis purposes.

Currently, only INSOMNIA is supported.

## Installation and Usage

```
composer require --dev fixwa/http-client-collection-generator
```

```
$generator = new Fixwa\HttpClientCollectionGenerator\Insomnia\Generator();

$generator->name('The Collection')
    ->group('Pokedex API')
    ->addRequest([
        'name' => 'Get Vaporeon Info',
        'url' => 'https://pokeapi.co/api/v2/pokemon/vaporeon',
        'method' => 'GET',
        'description' => 'Obtain information about the gorgeous Vaporeon'
    ]);
$generator->generateJson();
```
the code above will return a JSON string that can be used directly in Insomnia to import from clipboard or saved to a file and import it using the option: **CREATE -> Import From**

![Import Insomnia](https://fixwa.nimbusweb.me/box/attachment/7031135/53h6vkc0mn8sbx06797e/LEOcf8EVYhaC3evW/Screen%20Shot%202022-06-03%20at%2022.11.06.png)

For the given example, the imported collection should look like the following:

![Imported Insomnia](https://fixwa.nimbusweb.me/box/attachment/7031135/53h6vkc0mn8sbx06797e/x3q6badPrK9kwv8w/screenshot-nimbusweb.me-2022.06.03-22_05_18.png)


# TODOs (ETA 2099)

This is a very basic version that will cover the basic needs. Pending features are: 

* Output to file.
* Import requests directly from php-curl extension.
* Import requests directly from Guzzle.
* Support other major HTTP Clients (Postman, Testfully.io, Thunder).
