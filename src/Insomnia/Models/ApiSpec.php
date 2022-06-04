<?php

declare(strict_types=1);

namespace Fixwa\HttpClientCollectionGenerator\Insomnia\Models;


class ApiSpec extends Base
{
    private const THIS_TYPE = "api_spec";
    public string $_type = self::THIS_TYPE;
    public string $fileName = "The Collection Name";
    public array $contents = [];
    public string $contentType ="yaml";
}
