<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use App\Models\Customer;

class CustomerController extends Controller 
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

    public function store(Request $request)
    {
        $customer = new Customer;
        $customer->name = $request->get('name');
        $customer->save();

        return response()->json([
            'message' => 'Customer created'
        ], Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
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

    public function delete($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return response()->json([
            'message' => 'Customer deleted'
        ], Response::HTTP_OK);
    }
}