<?php

require_once 'vendor/autoload.php';

use Exercise\TravelersRepository;

$climate = new League\CLImate\CLImate;

$climate->clear();

$climate->red('Hello. This is SQL exercise script.');
$travelersRepo = new TravelersRepository();
$climate->table($travelersRepo->getAllTravelersWithDestinations());
$climate->table($travelersRepo->getTravelersByDestinations(
    array('Cuba', 'Sochi')
));
$climate->table($travelersRepo->getTravelersByDestinations(
    array('Cuba', 'Sochi'),
    true
));


