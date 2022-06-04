<?php
declare(strict_types=1);

namespace Fixwa\HttpClientCollectionGenerator\Tests\Insomnia;

use Fixwa\HttpClientCollectionGenerator\Insomnia\Generator;
use PHPUnit\Framework\TestCase;

class InsomniaCollectionGeneratorTest extends TestCase
{
    public function testGenerateJson()
    {
        $generator = new Generator();

        $generator->name('The Collection')
            ->group('Pokedex API')
            ->addRequest([
                'name' => 'Get Vaporeon Info',
                'url' => 'https://pokeapi.co/api/v2/pokemon/vaporeon',
                'method' => 'GET',
                'description' => 'Obtain information about the gorgeous Vaporeon'
            ]);

        $jsonString = $generator->generateJson(true);

        $json = json_decode($jsonString);
        $this->assertObjectHasAttribute('_type', $json);
        $this->assertEquals('export', $json->_type);
        $this->assertObjectHasAttribute('resources', $json);

        foreach ($json->resources as $resource) {
            switch ($resource->_type) {
                case 'workspace':
                    $this->assertEquals('Meriadoc', $resource->name);
                    $this->assertEquals('collection', $resource->scope);
                    break;

                case 'cookie_jar':
                    $this->assertEquals('Default Jar', $resource->name);
                    break;

                case 'environment':
                    $this->assertEquals('Base Environment', $resource->name);
                    break;

                case 'api_spec':
                    $this->assertEquals('The Collection', $resource->fileName);
                    break;

                case 'request_group':
                    $this->assertEquals('Pokedex API', $resource->name);
                    break;

                case 'request':
                    $this->assertEquals('Get Vaporeon Info', $resource->name);
                    $this->assertEquals('https://pokeapi.co/api/v2/pokemon/vaporeon', $resource->url);
                    $this->assertEquals('GET', $resource->method);
                    break;
            }
        }
    }
}
