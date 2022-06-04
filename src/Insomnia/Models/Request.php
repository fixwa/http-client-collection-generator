<?php

declare(strict_types=1);

namespace Fixwa\HttpClientCollectionGenerator\Insomnia\Models;


class Request extends Base
{
    private const THIS_TYPE = "request";
    public string $_type = self::THIS_TYPE;
    public string $url = "";
    public string $name = "";
    public string $description = "";
    public string $method = "";
    public string $body;
    public array $parameters = [];
    public array $headers = [];
    public \stdClass $authentication;
    public int $metaSortKey;
    public bool $isPrivate = false;
    public bool $settingStoreCookies = true;
    public bool $settingSendCookies = true;
    public bool $settingDisableRenderRequestBody = false;
    public bool $settingEncodeUrl = true;
    public bool $settingRebuildPath = true;
    public string $settingFollowRedirects = "global";
}
