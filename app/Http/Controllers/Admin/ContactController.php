<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{
    public function addContact(Request $request){
        feedback::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'note' => $request->note
        ]);
        return redirect('/contact');

    }
}
