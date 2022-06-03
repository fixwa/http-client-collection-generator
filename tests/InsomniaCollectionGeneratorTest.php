<?php
declare(strict_types=1);

namespace Fixwa\InsomniaCollectionGenerator\Tests;

use Fixwa\InsomniaCollectionGenerator\InsomniaCollectionGenerator;
use PHPUnit\Framework\TestCase;

class InsomniaCollectionGeneratorTest extends TestCase
{
    public function testGenerateJson()
    {
        $this->expectNotToPerformAssertions();
        $n = new InsomniaCollectionGenerator();
        $n->generateJson();
    }
}
