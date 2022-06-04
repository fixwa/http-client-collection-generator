<?php

declare(strict_types=1);

namespace Fixwa\HttpClientCollectionGenerator\Insomnia\Models;


class CookieJar extends Base
{
    private const THIS_TYPE = "cookie_jar";
    public string $_type = self::THIS_TYPE;
    public string $name = "Default Jar";
    public array $cookies = [];
}
