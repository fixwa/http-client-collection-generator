<?php
declare(strict_types=1);

namespace Fixwa\HttpClientCollectionGenerator\Insomnia\Models;


class Workspace extends Base
{
    private const THIS_TYPE = "workspace";
    public string $_type = self::THIS_TYPE;
    public string $name;
    public string $description;
    public string $scope = "collection";
}
