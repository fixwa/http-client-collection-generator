<?php

declare(strict_types=1);

namespace Fixwa\HttpClientCollectionGenerator\Insomnia\Models;


class RequestGroup extends Base
{
    private const THIS_TYPE = "request_group";
    public string $_type = self::THIS_TYPE;
    public string $name;
    public string $description; //": "",
    public string $environment; //":{},
    public string $environmentPropertyOrder; //": null,
    public string $metaSortKey; //": -1654120479680,
}
