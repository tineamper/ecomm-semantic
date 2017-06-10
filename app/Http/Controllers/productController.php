<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\products;
use App\Models\categories;
use DB;
use App\Http\Controllers\Controller;
use Input;

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
      $photo = $request->upphoto;
      $destinationPath = 'displayphoto/'; // upload path
      $extension = $photo->getClientOriginalExtension(); // getting image extension
      $fileName = rand(11111,99999).'.'.$extension; // renameing image
      $photo->move($destinationPath, $fileName); // uploading file to given path


       // $avatar = $request->file('upphoto'); // appears to work  
       // $path = $avatar->store('/app/storage/app/public/displayphoto'); //returns the right path and an MD5 based name  
       // $avatarName = explode('/',$path)[5]; //the name I want to store on the owning user object   


        $callId = $request->callId;

        if($callId==1)
        {
            $prod = new products;
              $prod->cat_id = $request->catname; 	
              $prod->prd_name = $request->prdname;
              $prod->prd_description = $request->prddesc;
              $prod->prd_price = $request->prdprice; 
	 			      $prod->prd_image =  $avatarName;		
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

		// $trimfilestring = explode(';', $photo);
		// //$ext = substr($trimfilestring[0], strpos($trimfilestring[0], "/") + 1);
	 //  //$base64string = substr($trimfilestring[1], strpos($trimfilestring[1], ",") + 1);
  //   $ext = substr($trimfilestring[0], strpos($trimfilestring[0], "/") + 1);
  //   $base64string = substr(isset($trimfilestring[1]) ? $trimfilestring[1] : null, strpos(isset($trimfilestring[1]) ? $trimfilestring[1] : null, ",") + 1);

		// $decodephoto = base64_decode($base64string);

		// $filename =  "displayphoto/" . str_random() . "." . $ext;

		// file_put_contents($filename, $decodephoto);  
		// return $filename;
    
    
      $destinationPath = 'displayphoto/'; // upload path
      $extension = $photo->getClientOriginalExtension(); // getting image extension
      $fileName = rand(11111,99999).'.'.$extension; // renameing image
      $photo->move($destinationPath, $fileName); // uploading file to given path
      return $fileName;


		//Storage::disk('public')->put($filename, $decodephoto);		
		//return asset(Storage::disk('public')->url($filename));

      // $imageName = mt_rand(999,999999)."_".time()."_".$photo->getClientOriginalExtension();
      //       //$type = $request->image->guessClientExtension();
      //       $photo->move(('displayphoto/'), $imageName);
      //       $imagePath = asset('/public/displayphoto/')."/".$imageName;
      //       return $imagePath;


      // $destinationPath = 'displayphoto/'; // upload path
      // $extension = $photo->getClientOriginalExtension(); // getting image extension
      // $fileName = rand(11111,99999).'.'.$extension; // renameing image
      // $photo->move($destinationPath, $fileName); // uploading file to given path
      // $filename =  asset("displayphoto/");
      //   return $filename;


	}//loadphoto


   
            

}////eeeeeeeeeeeeeennnnnnnnnnnnnnnnndddddddddd

	
