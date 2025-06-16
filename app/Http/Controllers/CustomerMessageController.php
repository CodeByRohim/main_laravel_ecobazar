<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerMessage;
class CustomerMessageController extends Controller
{
    function index(){
        $messages = CustomerMessage::latest()->paginate(1);
        return view('Backend.CustomerMessage.index',compact('messages'));
    }


    public function storeOrUpdate(Request $request, $id = null)
{
    $request->validate([
        'name' => 'required|min:3',
        'email' => 'nullable|email|unique:customer_messages,email,' . $id,
        'subject' => 'nullable|string',
        'message' => 'required|min:5',
    ]);

    $customerMsg = CustomerMessage::findOrNew($id);

    $customerMsg->name = $request->name;
    $customerMsg->email = $request->email;
    $customerMsg->subject = $request->subject;
    $customerMsg->message = $request->message;
    $customerMsg->save();

    return redirect()->back()->with('success', $id ? 'Message updated!' : 'Message created!');
}

}
