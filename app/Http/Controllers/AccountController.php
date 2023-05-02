<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\AccountService;
use App\Services\CustomerService;

class AccountController extends Controller
{
    use ApiResponser;

    public $accountService;
    public $customerService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AccountService $accountService, CustomerService $customerService)
    {
        $this->accountService = $accountService;
        $this->customerService = $customerService;
    }

    public function index()
    {
        return $this->successResponse($this->accountService->obtainAccounts());
    }

    //Create new account
    public function store(Request $request)
    {
        $this->customerService->obtainCustomer($request->customer_id);
        return $this->successResponse($this->accountService->createAccount($request->all(), Response::HTTP_CREATED));
    }

    //Show the account
    public function show($account)
    {
        return $this->successResponse($this->accountService->obtainAccount($account));
    }

    //Update the account
    public function updateaccount(Request $request, $account)
    {
        return $this->successResponse($this->accountService->editAccount($request->all(), $account));
    }

    //Remove the account
    public function destroy($account)
    {
        return $this->successResponse($this->accountService->deleteAccount($account));
    }

    //
}
