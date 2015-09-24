<?php

require_once 'vendor/autoload.php';

use Exercise\TravelersRepository;

$climate = new League\CLImate\CLImate;

$climate->description("This is SQL exercise script");

$climate->arguments->add([
    'string' => [
        'prefix' => 's',
        'description' => 'Input string for processing',
        'required' => true
    ]
]);

if(!$climate->arguments->defined("string")){
    $climate->usage();
    exit;
}

$climate->arguments->parse();

$inputString = $climate->arguments->get("string");

$climate->clear();

$climate->red('Hello. This is SQL exercise script.');

$climate->green()->inline("Input string: ")->white($inputString);

$stringHelper = new TravelersRepository();

$climate->green()->inline("Out string: " )->white($stringHelper->revertAndExcludeVowels($inputString));
