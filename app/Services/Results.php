<?php
namespace App\Services;


use App\Services\Wsdl\ConversionRate;
use App\Services\Wsdl\CurrencyConvertor;
use League\Flysystem\Exception;

class Results
{

    public function getResult($from, $to)
    {
        try {
            $params = new ConversionRate($from, $to);
            $currencyConvertor = new CurrencyConvertor();
            $result = $currencyConvertor->ConversionRate($params);
            $rate = $result->getConversionRateResult();
            return $rate;
        } catch (\SoapFault $soapFault) {
            throw new \Exception('SoapFault Try Again');
        } catch (\Exception $exception) {
            throw new \Exception($exception);
        }
    }
}