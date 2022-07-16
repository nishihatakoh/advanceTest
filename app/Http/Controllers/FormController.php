<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class FormController extends Controller
{
    public function index ()
    {
        return view('/form');
    }

    public function check(Request $request)
    {
        $this->validate($request, contact::$rules);
        $fullname = $request->last_name.$request->first_name;
        $confirm = $request->only('email','gender','postcode','address','building_name','opinion');
        return view('check' , compact('confirm','fullname'));
    }
    public function store(Request $request)
    {
        if($request->input('back') == 'back'){
            return redirect('/form')->withInput();
        }
        $contact = new Contact;
        $form = $request->all();
        unset($form['_token']);
        unset($form['submit']);
        $contact->fill($form)->save();
        return view('success');
    }
    
    public function manage(Request $request)
    {
        $items = Contact::paginate(5);
        return view('/manage',compact('items',));
    }

    public function find(Request $request)
    {   
        $keyword = $request->input('keyword');
        $gender = $request->input('gender');
        $from = $request->input('from');
        $until = $request->input('until');
        $email = $request->input('email');
        $query = Contact::query();

        if(!empty($keyword)) {
            $query->where('fullname', 'LIKE', "%{$keyword}%");
        }

        if(!empty($from) && !empty($until)){
            $query->whereBetween('created_at', [$from , $until]);
        }

        if(!empty($gender)) {
            $query->where('gender', 'LIKE', $gender);
        }

        if(!empty($email)) {
            $query->where('email', 'LIKE', "%{$email}%");
        }

        $items = $query->paginate(5);


        return view('/manage',compact('items' , 'keyword',  'gender', 'email'));
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/manage');
    }
}
