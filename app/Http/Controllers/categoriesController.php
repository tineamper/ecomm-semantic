<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\categories;
use DB;
use App\Http\Controllers\Controller;

class categoriesController extends Controller
{
      public function index_categories(Request $req){
     
          $cat = DB::table('categories')
          ->orderBy('categories.id','DESC')
          ->get();


          return view('module.category') ->with('cat', $cat);       
     
      }

 
    public function categoriesCRUD(Request $request)
    {

        $callId = $request->callId;

        if($callId==1)
        {
            $category = new categories;
              $category->cat_name = $request->catname;
              $category->cat_description = $request->catdesc;
            $category->save();

        }

        if($callId==2)
        {
            $id = $request->id;
            $category = categories::find($id);

            return $category;

        }

        if($callId==3)
        {
            $id = $request->id;
            $category= categories::find($id);
            $category->cat_name = $request->catname;
            $category->cat_description = $request->catdesc;
            $category->save();
        }
    }


}
