<?php

namespace App\Modules\Contact\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Contact\Contact;
use DB;

class ContactApiController extends Controller
{
    public function getContact($id)
    {
        $contact = Contact::find($id);

        $category = DB::table('contact_category')->select('contact_category_name as text', 'id as value')->get();
        $agent = DB::table('agents')
            ->select('display_name as text', 'id as value')->get();
        
        return response()->json([
            'contact'   =>  $contact,
            'category'  =>  $category,
            'agent'     =>  $agent,
        ], 201);
    }
}
