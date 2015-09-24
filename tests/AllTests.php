<?php
/**
 * User: sergeymartyanov
 * Date: 24.09.15
 * Time: 18:54
 */

namespace Exercise\Tests;


class AllTests
{
    public static function suite()
    {
        $suite = new \PHPUnit_Framework_TestSuite();
        $suite->setName("All Tests");
        $suite->addTestSuite("Exercise\\Tests\\TestStringHelper");
        $suite->addTestSuite("Exercise\\Tests\\TestTravelersRepository");

        return $suite;
    }
}