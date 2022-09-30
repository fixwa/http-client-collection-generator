<?php
declare(strict_types=1);

namespace Fixwa\HttpClientCollectionGenerator\Insomnia;

use DateTime;
use Fixwa\HttpClientCollectionGenerator\Insomnia\Models\ApiSpec;
use Fixwa\HttpClientCollectionGenerator\Insomnia\Models\CookieJar;
use Fixwa\HttpClientCollectionGenerator\Insomnia\Models\Environment;
use Fixwa\HttpClientCollectionGenerator\Insomnia\Models\Request;
use Fixwa\HttpClientCollectionGenerator\Insomnia\Models\RequestGroup;
use Fixwa\HttpClientCollectionGenerator\Insomnia\Models\Workspace;
use stdClass;

class Generator
{
    private const EXPORT_FORMAT_VERSION = 4;
    private stdClass $json;
    private RequestGroup $currentGroup;
    private array $requestsGroups = [];
    private array $requests = [];
    private Workspace $workspace;
    private array $resources;
    private CookieJar $cookieJar;
    private Environment $environment;
    private ApiSpec $apiSpec;

    public function __construct($workspaceName = "Test", $apiSpecName = "Test")
    {
        $this->json = new stdClass;
        $this->json->_type = 'export';
        $this->json->__export_format = self::EXPORT_FORMAT_VERSION;
        $this->json->__export_date = (new DateTime())->format(DATE_ISO8601);
        $this->json->__export_source = __NAMESPACE__ . '.insomnia-collection-generator.2022';
        $this->json->resources = [];

        $this->workspace = new Workspace(['name' => $workspaceName]);
        $this->cookieJar = new CookieJar(['parentId' => $this->workspace->_id]);
        $this->environment = new Environment(['parentId' => $this->workspace->_id]);
        $this->apiSpec = new ApiSpec(['fileName' => $apiSpecName, 'parentId' => $this->workspace->_id]);
    }

    public function setWorkspaceName($name)
    {
        $this->workspace->name = $name;
    }

    public function setApiSpecName($name)
    {
        $this->apiSpec->fileName = $name;
    }


    public function group($name): Generator
    {
        $group = new RequestGroup(['name' => $name]);
        array_push($this->json->resources, $group);

        $group->parentId = $this->workspace->_id;

        $this->requestsGroups[$group->_id] = $group;
        $this->currentGroup = $group;

        return $this;
    }

    public function addRequest(array $requestData): Generator
    {
        $requestData = array_merge($requestData, ['parentId' => $this->currentGroup->_id]);
        $request = new Request($requestData);
        array_push($this->json->resources, $request);
        $this->requests[$request->_id] = $request;

        return $this;
    }

    public function generateJson($return = false)
    {
        $this->json->resources[] = $this->workspace;
        $this->json->resources[] = $this->cookieJar;
        $this->json->resources[] = $this->environment;
        $this->json->resources[] = $this->apiSpec;

        $json = json_encode($this->json, JSON_PRETTY_PRINT);

        if ($return) {
            return $json;
        }
        echo $json;
    }
}
