<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class CustomerService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the customers service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the customers service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.customers.base_uri');
        $this->secret = config('services.customers.secret');
    }

    /**
     * Obtain the full list of customer from the customer service
     * @return string
     */
    public function obtainCustomers()
    {
        return $this->performRequest('GET', '/customers');
    }

    /**
     * Create one customer using the customer service
     * @return string
     */
    public function createCustomer($data)
    {
        return $this->performRequest('POST', '/customers', $data);
    }

    /**
     * Obtain one single customer from the customer service
     * @return string
     */
    public function obtainCustomer($customer)
    {
        return $this->performRequest('GET', "/customers/{$customer}");
    }

    /**
     * Update an instance of customer using the customer service
     * @return string
     */
    public function editCustomer($data, $customer)
    {
        return $this->performRequest('POST', "/updatecustomer/{$customer}", $data);
    }

    /**
     * Remove a single customer using the customer service
     * @return string
     */
    public function deleteCustomer($customer)
    {
        return $this->performRequest('DELETE', "/customers/{$customer}");
    }

    public function callCommonFunction()
    {
        return $this->performRequest('GET', '/customerscommon');
    }
}