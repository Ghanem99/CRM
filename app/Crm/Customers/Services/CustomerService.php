<?php 

namespace Crm\Customers\Services;

use Crm\Customers\Models\Customer;
use Crm\Customers\Requests\CreateCustomer;

class CustomerService 
{

    public function index() 
    {
        return Customer::all();
    }

    public function show($id) 
    {
        $customer = Customer::find($id);

        if(!$customer) {    
            return response()->json([
                'message' => 'Customer not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return $customer;
    }

    public function store(string $name)
    {
        $customer = new Customer;
        $customer->name = $name;
        $customer->save();

        event(new CustomerCreation($customer));

        return response()->json([
            'message' => 'Customer created'
        ], Response::HTTP_CREATED);
    }

    public function update(CreateCustomer $request, $id)
    {
        $customer = Customer::find($id);

        if(!$customer) {
            return response()->json([
                'message' => 'Customer not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $customer->name = $request->get('name');
        $customer->save();

        return response()->json([
            'message' => 'Customer updated'
        ], Response::HTTP_OK);
    }

    public function delete(int $id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return response()->json([
            'message' => 'Customer deleted'
        ], Response::HTTP_OK);
    }
}