<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'last_name' => 'required',
        'first_name' => 'required',
        'gender' => 'required',
        'email' => 'required|email',
        'postcode' =>'required|regex:/^[0-9]{3}-[0-9]{4}$/',
        'address' =>'required',
        'opinion' =>'required|max:120'
    );
}
