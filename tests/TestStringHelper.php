<?php
/**
 * User: sergeymartyanov
 * Date: 24.09.15
 * Time: 18:46
 */

namespace Exercise\Tests;

use Exercise\Helpers\StringHelper;

class TestStringHelper extends \PHPUnit_Framework_TestCase
{
    public function testSimpleString()
    {
        $stringHelper = new StringHelper();
        $this->assertEquals("!K_D!", $stringHelper->revertAndExcludeVowels("!ADA_AKA!"), "simple string error");
    }

    public function testMBString()
    {
        $stringHelper = new StringHelper();
        $this->assertEquals("!Б_Д!", $stringHelper->revertAndExcludeVowels("!АДА_АБА!"), "simple mb string error");
    }
}
