<?php

declare(strict_types=1);

namespace Fixwa\HttpClientCollectionGenerator\Insomnia\Models;


class Environment extends Base
{

    private const THIS_TYPE = "environment";
    public string $_type = self::THIS_TYPE;
    public string $name = "Base Environment";
    public \stdClass $data;
    public $dataPropertyOrder = null;
    public $color = null;
    public bool $isPrivate;
    public int $metaSortKey; //": 1654022175399,
}
