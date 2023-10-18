<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Crm\Customers\Services\CustomerService;
use App\Models\Customer;
use App\Http\Requests\CreateCustomer;


class CustomerController extends Controller 
{
    private CustomerService $customerService;

    public function __construct(CustomerService $customerService) 
    {
        $this->customerService = $customerService;
    }

    public function index(Request $request) 
    {
        $customers = $this->customerService->index($request);
    }

    public function show($id) 
    {
        $customer = $this->customerService->show($id);
    }

    public function store(CreateCustomer $request)
    {
        $customer = $this->customerService->store($request->get('name'));

    }

    public function update(CreateCustomer $request, $id)
    {
        $customer = $this->customerService->update($request, $id);
    }

    public function delete($id)
    {
        $customer = $this->customerService->delete((int) $id);
    }

}