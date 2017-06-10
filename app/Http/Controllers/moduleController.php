<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\categories;
use App\Models\products;
use DB;
use App\Http\Controllers\Controller;

class moduleController extends Controller
{
	public function phome(){
       return view('module.phome');
    }

     public function home(){

           $load = products::with('categories')->get();

       return view('module.home') ->with('load', $load);
    }

     public function category(){
        return view('module.category');
    }

     public function product(){
        return view('module.product');
    }

}
