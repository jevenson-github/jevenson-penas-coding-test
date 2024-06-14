<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Products; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // FETCH PRODUCTS 
    public function productList(){ 

        // FETCH PRODUCT LIST AND PAGINATE 
        $product_list = Products::simplePaginate(5);
        // $product_list = Products::paginate(5);  
        //$product_list = Products::all();
        
       if(count($product_list)){  
        $data['message'] = count($product_list).' '.'Records Found'; 
        $data['status'] = 200; 
        $data['products'] = $product_list; 
            
        return response()->json($data,200);

       }else { 

        $data['message'] = 'No Records Found'; 
        $data['status'] = 404; 

        return response()->json($data);

         // OR WE CAN RETURN THE RESPONSE JUST LIKE THIS : 
        // return response()->json(['message'=>'No Records Found' , 'status'=> 404 ],404);
       }
     
    } 


    //CREATE PRODUCT 
    public function productCreate(Request $request){ 
        
        // PRODUCT VALIDATION 
        $product_validation = Validator::make($request->all(),  [
            'product_name' => 'required|string|max:255|unique:products', 
            'product_description' => 'required|string', 
            'product_price' => ['required','numeric']
        ]);   
     
        if($product_validation->fails()){  
           
            $data['error'] = $product_validation->messages(); 
            $data['status'] = 422; 
            return response()->json($data, 422);
        }else{   

                // INSERTS PRODUCT 
                $product_insert = Products::create([
                    'product_name' => $request->product_name, 
                    'product_description' => $request->product_description, 
                    'product_price' => $request->product_price, 
                ]);   

                //CHECK IF PRODUCT IS INSERTED 
                if($product_insert){ 
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
     public function productDetails($id){ 

            $product_details = Products::find($id);  

            // VALIDATE IF PRODUCT EXISTS 
            if($product_details){
                $data['message'] = "Product Found";
                $data['product'] = $product_details;
                $data['status'] = 200; 
                return response()->json($data, 200);
            }else { 
                $data['message'] = "Product Not Found";
                $data['status'] = 400; 
                return response()->json($data, 400);
            }
           
     }



}
