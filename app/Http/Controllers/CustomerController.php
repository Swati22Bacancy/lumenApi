<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\CustomerService;

class CustomerController extends Controller
{
    use ApiResponser;

    public $customerService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        return $this->successResponse($this->customerService->obtainCustomers());
    }

    //Create new customer
    public function store(Request $request)
    {
        return $this->successResponse($this->customerService->createCustomer($request->all(), Response::HTTP_CREATED));
    }

    //Show the customer
    public function show($customer)
    {
        return $this->successResponse($this->customerService->obtainCustomer($customer));
    }

    //Update the customer
    public function updatecustomer(Request $request, $customer)
    {
        return $this->successResponse($this->customerService->editCustomer($request->all(), $customer));
    }

    //Remove the customer
    public function destroy($customer)
    {
        return $this->successResponse($this->customerService->deleteCustomer($customer));
    }

    //Call Common function

    public function customerCommonFunction()
    {
        return $this->successResponse($this->customerService->callCommonFunction());
    }
}
