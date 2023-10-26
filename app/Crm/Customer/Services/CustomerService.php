<?php 

namespace Crm\Customer\Services;

use Illuminate\Http\Request;
use Crm\Customer\Models\Customer;
use Crm\Customer\Requests\CreateCustomerRequest;

use Crm\Customer\Events\CustomerCreationEvent;
use Crm\Customer\Listeners\SendWelcomeEmailListener;
use Crm\Customer\Listeners\NotifySalesOnCustomerCreationListener;

use Crm\Customer\Repositories\CustomerRepository;

class CustomerService
{
    private CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }
    
    public function index()
    {
        return $this->customerRepository->all();
    }

    public function show($id)
    {
        return $this->customerRepository->find($id);
    }

    public function store(CreateCustomerRequest $request)
    {
        $customer = new Customer;
        $customer->name = $request->name;

        $customer->save();

        event(new CustomerCreationEvent($customer));
        return response()->json($customer, 201);
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());

        return response()->json($customer, 200);
    }

    public function delete(Customer $customer)
    {
        $customer->delete();

        return response()->json(null, 204);
    }   


}