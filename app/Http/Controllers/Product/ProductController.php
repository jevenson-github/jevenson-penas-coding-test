<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Product\Products; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{   
   
    // SET DEFAULT VALUE FOR CACHE KEY 
   public function setCacheKeyGlobalVariable($id){
         return "productDetails_cacheKey_".$id;
    } 

    // FETCH ALL PRODUCTS  
    public function index(){ 

        // FETCH PRODUCT LIST AND PAGINATE 
        $productList = Products::orderBy('id','desc')->paginate(5);
        
        // CHECK IF PRODUCTS ARE FOUND 
       if($productList->count()){    

        // PREPARE SUCCESS RESPONSE 
        $data['message'] = $productList->count().' '.'Records Found'; 
        $data['status'] = 200; 
        $data['products'] = $productList; 
        return response()->json($data,200);

       }else { 

        // PREPARE FAILURE RESPONSE 
        $data['message'] = 'No Records Found'; 
        $data['status'] = 404; 

        return response()->json($data,404);
       }
     
    } 

    //CREATE PRODUCT 
    public function store(Request $request){ 
        
        // PRODUCT VALIDATION 
        $productValidation = Validator::make($request->all(),  [
            'product_name' => 'required|string|max:255|unique:products', 
            'product_description' => 'required|string', 
            'product_price' => ['required','numeric']
        ]);   
        
        // CHECK IF VALIDATION FAILS 
        if( $productValidation->fails()){  
           
            $data['error'] = $productValidation->messages(); 
            $data['status'] = 422; 
            return response()->json($data, 422);
        }else{   

                // INSERTS PRODUCT 
                $productInsert = Products::create([
                    'product_name' => $request->product_name, 
                    'product_description' => $request->product_description, 
                    'product_price' => $request->product_price, 
                ]);   

                //CHECK IF PRODUCT IS INSERTED SUCCESSFULY 
                if($productInsert){ 
                     $data['message'] = "Product Created Successfuly ."; 
                     $data['status'] = 201; 
                     return response()->json($data, 201);
                }else {
                    $data['message'] = "Oops , Something went wrong in product creation ."; 
                    $data['status'] = 500; 
                    
                    return response()->json($data, 500);
                }

        }
    }

     // PRODUCT DETAILS 
     public function show(Products $product){ 

    
             // PERFORM CACHING IMPLEMENTATION 
            $productDetailsCache = Cache::remember( $this->setCacheKeyGlobalVariable($product->id) , now()->addMinutes(2), function () use($product) {
                    return Products::find($product->id); 
            });
            
           //  VALIDATE IF PRODUCT EXISTS 
            if( !empty($productDetailsCache) ){
                $data['message'] = "Product Found";
                $data['product'] = $productDetailsCache;
                $data['status'] = 200; 
                return response()->json($data, 200);
            }else { 
                $data['message'] = "Product Not Found";
                $data['status'] = 400; 
                return response()->json($data, 400);
            }
           
     }

    // UPDATE PRODUCT 
    public function update(Request $request , Products $product){ 
      
          if($product->id){   

                // PRODUCT VALIDATION 
                $productValidation = Validator::make($request->all(),  [
                    'product_name' => 'required|string|max:255', 
                    'product_description' => 'required|string', 
                    'product_price' => ['required','numeric']
                ]);   

                    
                    if($productValidation->fails()){
                            $data['error'] = $productValidation->messages();
                            $data['status'] = 422; 
                            return response()->json($data, 422 );
                    }
                    else{ 

                        // PERFORM PRODUCT UPDATE 
                         $product->update($request->all());   
                        
                        //VALIDATE IF PRODUCT SUCCESSFULY UPDATED
                        if ($product){ 
                            
                            $data['message'] = "Product Successfuly Updated"; 
                            $data['status'] = 200; 

                            //CLEAR THE CACHE TO REFRESH THE DETAILS IMMEDIATELY: OPTIONAL , IF YOU WANT TO  APPLY THIS JUST UNCOMMENT THE LINE OF CODE BELOW . 
                           //Cache::forget($this->setCacheKeyGlobalVariable($id));  
                            
                            return response()->json($data, 200);
                            
                        }else{
                            $data['message'] = "Oops , Something went wrong in product update";
                            $data['status'] = 500; 
                            return response()->json($data, 500);
                        } 
                    }

        } 
        else { 
            $data['message'] = "Product ID Not Found";
            $data['status'] = 400; 
            return response()->json($data, 400);
        }
    } 


    //PRODUCT DELETE 
    public function destroy(Products $product){ 

        if($product->id){ 

            $product->delete(); 
            $data['message'] = "Product Deleted Successfuly"; 
            $data['status'] = 200;  

            //CLEAR THE CACHE TO REFRESH THE DETAILS IMMEDIATELY:  OPTIONAL , IF YOU WANT TO  APPLY THIS JUST UNCOMMENT THE LINE OF CODE BELOW . 
            //Cache::forget($this->setCacheKeyGlobalVariable($id));

            return response()->json($data, 200);

        }else {

            $data['message'] = "Oops, Something went wrong in product delete"; 
            $data['status'] = 500; 
            return response()->json($data, 500);
        } 

    }


    //SIMPLE IMPLEMENTATION OF CACHE IN LARAVEL  : FOR TESTING PURPOSE ONLY 
    public function testCaching(){  

       /* WAYS TO GET THE CACHE */
            //Cache::get('key'); 
            //$test = cache()->get(); 
        
        /* TO CREATE A CACHE USING ADD METHOD AND PUT METHOD */ 

            // Cache::put('cachekey', "This should be a Cachekey", 10);
            //Cache::add('cachekey2', "This should be a Cachekey 2 ", 10); 

       /* TO REMOVE OF FORGET THE CREATED CACHE BUT THE FILE WILL STILL BE THERE EMPTY   */
            //Cache::forget('cachekey');

        /* TO DELETE ENTIRE CACHE IN OUR STORAGE  */
            //Cache::flush();

      /* TO CHECK IF A CACHE EXISTS */
            //   if(Cache::has('cachekey')){
            //         echo Cache::get('cachekey');
            //   }
        
    /* USING CARBON TIME FORMAT  */
             //  echo now()->addSeconds(2);

    // dd(Cache::get( $this->setCacheKeyGlobalVariable(6)));
    } 

}
