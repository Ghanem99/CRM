<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Note;
use App\Models\Customer;

class NoteController 
{
    public function index(Customer $customer)
    {
        if($customer->count() == 0) {
            return response()->json(['message' => 'No customer with this id'], 404);
        }

        if(! $customer->notes->count()) {
            return response()->json(['message' => 'No notes for this customer'], 404);
        }


        // return all notes for a customer with id $customer_id
        return $customer->notes;
    }   

    public function show(Customer $customer, Note $note)
    {
        // return a single note with id $note_id for a customer with id $customer_id
        return $customer->notes()->find($note->id);
    }

    public function store(Request $request, Customer $customer)
    {
        // create a new note for a customer with id $customer_id
        $note = new Note;
        $note->note = $request->note;
        $note->customer_id = $customer->id;
        $note->save();

        return response()->json($note, 201);
    }

    public function update(Request $request, Customer $customer, Note $note)
    {
        // update a single note with id $note_id for a customer with id $customer_id
        $note = $customer->notes()->update($request->all());
        return response()->json($note, 200);
    }

    public function delete(Customer $customer, Note $note)
    {
        // delete a single note with id $note_id for a customer with id $customer_id
        $note->delete();
        return response()->json(null, 204);
    }
}