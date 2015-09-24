<?php

require_once 'vendor/autoload.php';


$climate = new League\CLImate\CLImate;

$climate->description("This is test script");

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

$climate->red('Hello. This is test script.');

$climate->green()->inline("Input string: ")->white($inputString);

$stringHelper = new StringHelper();

$climate->green()->inline("Out string: " )->white($stringHelper->revertAndExcludeVowels($inputString));
