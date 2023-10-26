<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

use Crm\Customer\Requests\CreateCustomerRequest;
use Crm\Customer\Services\CustomerService;

class CustomerController extends Controller
{
    private CustomerService $customerService;

    public function __construct(CustomerService $customerService) 
    {
        $this->customerService = $customerService;
    }
    
    public function index()
    {
        return $this->customerService->index();
    }

    public function show(Customer $customer)
    {
        $customer = $this->customerService->show($customer->id);
        if(! $customer) {
            return response()->json(['message' => 'Customer not found'], HTTP_NOT_FOUND);
        } else {
            return response()->json($customer, HTTP_OK);
        }
    }

    public function store(CreateCustomerRequest $request)
    {
        return $this->customerService->store($request);

        
    }

    public function update(Request $request, Customer $customer)
    {
        return $this->customerService->update($request, $customer);
    }

    public function delete(Customer $customer)
    {
        return $this->customerService->delete($customer);
    }
    
}
