<?php

declare(strict_types=1);

namespace Fixwa\HttpClientCollectionGenerator\Insomnia\Models;


class Base
{
    public int $modified;
    public int $created;
    public string $_id;
    public $parentId = null;

    public function __construct(array $arguments = [])
    {
        foreach ($arguments as $property => $value) {
            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }

        $this->modified = time();
        $this->created = time();

        $prefix = '';
        switch (get_class($this)) {
            case ApiSpec::class:
                $prefix = 'spc_';
                break;
            case CookieJar::class:
                $prefix = 'jar_';
                break;
            case Environment::class:
                $prefix = 'env_';
                break;
            case Request::class:
                $prefix = 'req_';
                break;
            case RequestGroup::class:
                $prefix = 'fld_';
                break;
            case Workspace::class:
                $prefix = 'wrk_';
                break;
        }

        $uniqid = substr(uniqid(uniqid() . uniqid(), false), 0, -7 );
        $this->_id = $prefix  . $uniqid;
    }
}
