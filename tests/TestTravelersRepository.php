<?php
/**
 * User: sergeymartyanov
 * Date: 24.09.15
 * Time: 18:46
 */

namespace Exercise\Tests;

use Exercise\TravelersRepository;

class TestTravelersRepository extends \PHPUnit_Framework_TestCase
{
    public function testAllTravelersWithDestination()
    {
        $repo = new TravelersRepository();

        $data = $repo->getAllTravelersWithDestinations();

        $this->assertContains(array('name' => 'Vasya','distinations' => 'Cuba, Sochi'),$data);
        $this->assertContains(array('name' => 'Maria','distinations' => 'Aruba'),$data);
        $this->assertContains(array('name' => 'George','distinations' => 'Cuba, Sochi'),$data);
        $this->assertContains(array('name' => 'Clark Kent','distinations' => 'Cuba, Krypton'),$data);
        $this->assertContains(array('name' => 'Traveler','distinations' => 'Aruba, Krypton, Cuba, Sochi'),$data);
    }

    public function testSochiAndCuba()
    {
        $repo = new TravelersRepository();

        $data = $repo->getTravelersByDestinations(
            array('Sochi', 'Cuba')
        );

        $this->assertContains(array('name' => 'Vasya'),$data);
        $this->assertContains(array('name' => 'George'),$data);
        $this->assertContains(array('name' => 'Traveler'),$data);
        $this->assertCount(3, $data);
    }

    public function testSochiAndCubaOnly()
    {
        $repo = new TravelersRepository();

        $data = $repo->getTravelersByDestinations(
            array('Sochi', 'Cuba'),
            true
        );

        $this->assertContains(array('name' => 'Vasya'),$data);
        $this->assertContains(array('name' => 'George'),$data);
        $this->assertCount(2, $data);
    }


}
