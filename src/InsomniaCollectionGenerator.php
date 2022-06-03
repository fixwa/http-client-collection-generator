<?php
declare(strict_types=1);

namespace Fixwa\InsomniaCollectionGenerator;

use stdClass;

class InsomniaCollectionGenerator
{
    private $json;

    public function __construct()
    {
        $this->json = new stdClass;
        $this->json->_type = 'export';
        $this->json->__export_format = 4;
        $this->json->__export_date = '2022-06-02T13:13:55.965Z';
        $this->json->__export_source = 'insomnia.desktop.app:v2022.3.0';

        $resources = [

        ];

        $this->json->resources = $resources;
    }

    public function generateJson()
    {
        echo json_encode($this->json, JSON_PRETTY_PRINT);
    }
}
