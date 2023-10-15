<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use App\Models\Note;


class NoteController extends Controller 
{
    public function index($customer_id) 
    {
        return Note::where('customer_id', $customer_id)->get();;
    }

    public function show($customer_id, $id) 
    {
        $customer = Note::find($customer_id);

        if(!$customer) {    
            return response()->json([
                'message' => 'Note not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return $note;
    }

    public function store(Request $request, $customer_id)
    {
        $note = new Note;
        $note->note = $request->get('note');
        $note->customer_id = $customer_id;
        $note->save();

        return response()->json([
            'message' => 'Note created'
        ], Response::HTTP_CREATED);
    }

    public function update(Request $request, $customer_id, $id)
    {
        $note = Note::find($id);

        if(!$note) {
            return response()->json([
                'message' => 'Note not found'
            ], Response::HTTP_NOT_FOUND);
        }

        if($note->customer_id != $request->get('customer_id')) {
            return response()->json([
                'message' => 'Customer ID does not match'
            ], Response::HTTP_BAD_REQUEST);
        }

        $note->note = $request->get('note');
        $note->save();

        return response()->json([
            'message' => 'Note updated'
        ], Response::HTTP_OK);
    }

    public function delete($customer_id, $id)
    {
        $note = Note::find($id);
        $note->delete();

        return response()->json([
            'message' => 'Customer deleted'
        ], Response::HTTP_OK);
    }
}