<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\products;
use App\Models\categories;
use DB;
use App\Http\Controllers\Controller;

class productController extends Controller
{
      public function index_product(Request $req){
     
          $prod = DB::table('products')
          ->orderBy('products.prd_id','DESC')
          ->get();
          $categ = DB::table('categories')
          ->orderBy('categories.id','DESC')
          ->get();

          $load = products::with('categories')->get();


          return view('module.product')
          ->with('categ',$categ)
          ->with('prod', $prod)
          ->with('load',$load);       
     
      }

    public function find(Request $request){
        $prody = $request->id;
    	$id = products::find($prody);
    	return $id;
    }  

 
    public function productCRUD(Request $request)
    {

        $callId = $request->callId;

        if($callId==1)
        {
            $prod = new products;
              $prod->cat_id = $request->catname; 	
              $prod->prd_name = $request->prdname;
              $prod->prd_description = $request->prddesc;
              $prod->prd_price = $request->prdprice; 
	 			$prod->prd_image = $this->loadphoto($request->upphoto);		
            $prod->save();

        }

        if($callId==2)
        {
            $id = $request->id;
            $prod = products::find($id);

            return $prod;

        }

        if($callId==3)
        {
            $id = $request->id;
            $prod= products::find($id);
            $prod->cat_id = $request->catname; 	
            $prod->prd_name = $request->prdname;
            $prod->prd_description = $request->prddesc;
            $prod->prd_price = $request->prdprice; 
	 		$prod->prd_image = $this->loadphoto($request->upphoto);
            $prod->save();
        
    }

}

    public function loadphoto($photo) {

		$trimfilestring = explode(';', $photo);
		$ext = substr($trimfilestring[0], strpos($trimfilestring[0], "/") + 1);
	//	$base64string = substr($trimfilestring[1], strpos($trimfilestring[1], ",") + 1);

		//$decodephoto = base64_decode($base64string);

		$filename =  public_path("displayphoto/" . str_random() . "." . $ext);

		//file_put_contents($filename, $decodephoto);

    return asset($filename);
		//return $filename;
		//Storage::disk('public')->put($filename, $decodephoto);

		
		//return asset(Storage::disk('public')->url($filename));
	}//loadphoto




}////eeeeeeeeeeeeeennnnnnnnnnnnnnnnndddddddddd

	
