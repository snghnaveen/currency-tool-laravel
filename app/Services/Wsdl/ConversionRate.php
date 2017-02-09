<?php

namespace App\Services\Wsdl;

class ConversionRate
{

    /**
     * @var Currency $FromCurrency
     */
    protected $FromCurrency = null;

    /**
     * @var Currency $ToCurrency
     */
    protected $ToCurrency = null;

    /**
     * @param Currency $FromCurrency
     * @param Currency $ToCurrency
     */
    public function __construct($FromCurrency, $ToCurrency)
    {
      $this->FromCurrency = $FromCurrency;
      $this->ToCurrency = $ToCurrency;
    }

    /**
     * @return Currency
     */
    public function getFromCurrency()
    {
      return $this->FromCurrency;
    }

    /**
     * @param Currency $FromCurrency
     * @return \App\Services\Wsdl\ConversionRate
     */
    public function setFromCurrency($FromCurrency)
    {
      $this->FromCurrency = $FromCurrency;
      return $this;
    }

    /**
     * @return Currency
     */
    public function getToCurrency()
    {
      return $this->ToCurrency;
    }

    /**
     * @param Currency $ToCurrency
     * @return \App\Services\Wsdl\ConversionRate
     */
    public function setToCurrency($ToCurrency)
    {
      $this->ToCurrency = $ToCurrency;
      return $this;
    }

}
