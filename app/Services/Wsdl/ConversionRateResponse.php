<?php

namespace App\Services\Wsdl;

class ConversionRateResponse
{

    /**
     * @var float $ConversionRateResult
     */
    protected $ConversionRateResult = null;

    /**
     * @param float $ConversionRateResult
     */
    public function __construct($ConversionRateResult)
    {
      $this->ConversionRateResult = $ConversionRateResult;
    }

    /**
     * @return float
     */
    public function getConversionRateResult()
    {
      return $this->ConversionRateResult;
    }

    /**
     * @param float $ConversionRateResult
     * @return \App\Services\Wsdl\ConversionRateResponse
     */
    public function setConversionRateResult($ConversionRateResult)
    {
      $this->ConversionRateResult = $ConversionRateResult;
      return $this;
    }

}
