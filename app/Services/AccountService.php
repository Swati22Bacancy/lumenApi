<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AccountService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the accounts service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the accounts service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.accounts.base_uri');
        $this->secret = config('services.accounts.secret');
    }

    /**
     * Obtain the full list of account from the account service
     * @return string
     */
    public function obtainAccounts()
    {
        return $this->performRequest('GET', '/accounts');
    }

    /**
     * Create one account using the account service
     * @return string
     */
    public function createAccount($data)
    {
        return $this->performRequest('POST', '/accounts', $data);
    }

    /**
     * Obtain one single account from the account service
     * @return string
     */
    public function obtainAccount($account)
    {
        return $this->performRequest('GET', "/accounts/{$account}");
    }

    /**
     * Update an instance of account using the account service
     * @return string
     */
    public function editAccount($data, $account)
    {
        return $this->performRequest('POST', "/updateaccount/{$account}", $data);
    }

    /**
     * Remove a single account using the account service
     * @return string
     */
    public function deleteAccount($account)
    {
        return $this->performRequest('DELETE', "/accounts/{$account}");
    }
}