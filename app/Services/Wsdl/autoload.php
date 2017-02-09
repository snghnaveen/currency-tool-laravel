<?php


 function autoload_eb0a82311d4c3d22b9c15aef87b1bdaa($class)
{
    $classes = array(
        'App\Services\Wsdl\CurrencyConvertor' => __DIR__ .'/CurrencyConvertor.php',
        'App\Services\Wsdl\ConversionRate' => __DIR__ .'/ConversionRate.php',
        'App\Services\Wsdl\Currency' => __DIR__ .'/Currency.php',
        'App\Services\Wsdl\ConversionRateResponse' => __DIR__ .'/ConversionRateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_eb0a82311d4c3d22b9c15aef87b1bdaa');

// Do nothing. The rest is just leftovers from the code generation.
{
}
