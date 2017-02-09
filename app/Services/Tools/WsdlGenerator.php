<?php

require 'vendor/autoload.php';

    echo "Started" . PHP_EOL;

    (new \Wsdl2PhpGenerator\Generator())->generate(
        new \Wsdl2PhpGenerator\Config(array(
            'inputFile' => 'http://www.webservicex.net/CurrencyConvertor.asmx?WSDL',
            'outputDir' => 'app/Services/Wsdl',
            'namespaceName' => "App\\Services\\Wsdl"
        ))
    );

