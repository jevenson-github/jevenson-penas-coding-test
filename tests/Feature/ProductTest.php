<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product\Products;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /* USE THIS IF YOU WANT TO CLEAR YOUR DATABASE TESTING INVIROMENT EVERYTIME YOU RUN TESTS   */
    // use RefreshDatabase; 
  
    //

/*** 
 * TEST CASE SCENARIOS FOR PRODUCT LIST API  
 * ***/
   public function test_product_list(){
                
            $response = $this->getJson('/api/product-list'); 
            // $response->assertStatus(200); 
            $response->assertJson(['status' =>200]); 

   } 
/*** 
 * TEST CASE SCENARIOS FOR PRODUCT CREATE API  
 * ***/

    public function test_product_store_success(){

        // SUPPPLY THE VALUE OF 'product_name' VALUE NOT EXISTING IN DATABASE TESTING ENVIRONMENT 
        $response = $this->postJson('/api/product-store' ,[
            'product_name' => 'Test Product Store 111',
            'product_description' => 'Sample Description',
            'product_price' => '37'
        ]); 
        /* TO ACCESS INDIVIDUAL RESPONSE COMING FROM THE CONTOLLER JSON RESPONSE  */ 
        // $response->assertJson(['status' => 201]); 
        $response->assertStatus(201);

        /*ANOTHER WAY TO ACCESS INDIVIDUAL JSON RESPONSE COMING FROM THE CONTROLLER  */
        // $responseData = json_decode($response->getContent(), true);
        // $this->assertEquals(201, $responseData['status']); 
    } 

    public function test_product_empty_required_fields_error(){ 

         $response = $this->postJson('/api/product-store' ,[
            'product_name' => '',
            'product_description' => '',
            'product_price' => ''
        ]); 

        $response->assertStatus(422); 
    }  

    public function test_product_maximum_characters_name_error(){

                $response = $this->postJson('/api/product-store' ,[
                    'product_name' => 'Bananas are long, curved fruits with smooth, yellow, and sometimes slightly green skin. 
                                    The average length of a banana is about 7 to 9 inches, and it is about 2 to 3 inches in diameter. 
                                    The skin of the banana is usually yellow when it is ripe, 
                                        but it can also be green, red, or purple depending on the variety.',
                    'product_description' => 'Test Description',
                    'product_price' => '35' 
                ]);  

                $response->assertStatus(422); 
        }

     public function test_product_price_type_numeric_error(){

                    $response = $this->postJson('/api/product-store' ,[
                        'product_name' => 'Banana',
                        'product_description' => 'Test Description',
                        'product_price' => 'PRICE' 
                    ]);  
                    $response->assertStatus(422); 
        
        }

     public function test_product_unique_name_error(){  
            
            // SUPPLY THE 'product_name' VALUE EXISTING IN DATABASE TESTING ENVIRONMENT 
            $response = $this->postJson('/api/product-store' ,[
                'product_name' => 'Test Product',
                'product_description' => 'Test Description',
                'product_price' => '35' 
            ]);  

            $response->assertStatus(422); 
        }
  
/*** 
 * TEST CASE SCENARIOS FOR PRODUCT DETAILS API  
 * ***/
    public function test_product_details_api(){
    
               // SUPPLY THE 'product_name' VALUE NOT EXISTING IN DATABASE TESTING ENVIRONMENT 
                $product = Products::create([
                    'product_name' => 'Test Product Create',
                    'product_description' => 'This is a test product description.',
                    'product_price' => '25'
                ]); 

                // GET THE VALUE OF ID COLUMN IN NEWLY INSERTED PRODUCTS 
                // dd($product->id); 
                $response = $this->getJson("/api/product-details/{$product->id}");
                $response->assertJson(['status' => 200]);
    }


/*** 
 * TEST CASE SCENARIOS FOR PRODUCT DELETE API  
 * ***/

    public function test_product_delete_api(){ 
         
            // MANUALLY CREATE A PRODUCT OF YOUR OWN 
            $product = Products::create([
                'product_name' => 'Test Product Delete',
                'product_description' => 'This is a test product description.',
                'product_price' => '25'
            ]); 

                // GET THE VALUE OF ID COLUMN IN NEWLY INSERTED PRODUCTS 
                // dd($product->id); 
                $response = $this->deleteJson("/api/product-delete/{$product->id}"); 
                $response->assertJson(['status' => 200]);

                /* YOU CAN SUPPLY THIS DIRECTLY A VALUE */
                // $response = $this->delete("/api/product-delete/6"); 
                // $response->assertJson(['status' => 200]);  

    }


/*** 
 * TEST CASE SCENARIOS FOR PRODUCT UPDATE API  
 * ***/

        public function test_product_update_success(){ 

        // SUPPLY THE 'product_name' VALUE NOT EXISTING IN DATABASE TESTING ENVIRONMENT 
            $product = Products::create([
                'product_name' => 'Sample Product',
                'product_description' => 'This is a test product description.',
                'product_price' => '25'
            ]);   

            // UPDATE SIMULATION
            $response = $this->putJson("/api/product-update/{$product->id}" ,[ 

                // SUPPLY THE 'product_name' VALUE NOT EXISTING IN DATABASE TESTING ENVIRONMENT 
                    'product_name' => 'Sample Product Updated',
                    'product_description' => 'This is a test product description.',
                    'product_price' => '25'
            ] ); 

            $response->assertStatus(200); 

    } 

    public function test_product_update_missing_required_fields_error(){

         // SUPPLY THE 'product_name' VALUE NOT EXISTING IN DATABASE TESTING ENVIRONMENT 
         $product = Products::create([
            'product_name' => 'Missing Fields',
            'product_description' => 'This is a test product description.',
            'product_price' => '25'
        ]);   

        // UPDATE SIMULATION
        $response = $this->putJson("/api/product-update/{$product->id}" ,[ 

                'product_name' => '',
                'product_description' => '',
                'product_price' => ''
        ] ); 

        $response->assertStatus(422); 
    }

    public function test_product_update_maximum_characters_name_error(){

          // SUPPLY THE 'product_name' VALUE NOT EXISTING IN DATABASE TESTING ENVIRONMENT 
          $product = Products::create([
            'product_name' => 'Missing Fields',
            'product_description' => 'This is a test product description.',
            'product_price' => '25'
        ]);   

        // UPDATE SIMULATION
        $response = $this->putJson("/api/product-update/{$product->id}" ,[ 

                'product_name' => 'Bananas are long, curved fruits with smooth, yellow, and sometimes slightly green skin. 
                                    The average length of a banana is about 7 to 9 inches, and it is about 2 to 3 inches in diameter. 
                                    The skin of the banana is usually yellow when it is ripe, 
                                        but it can also be green, red, or purple depending on the variety.',
                'product_description' => 'Test Description',
                'product_price' => '55'
        ] ); 

        $response->assertStatus(422); 
    } 

    public function test_product_update_product_price_type_error(){ 

          // SUPPLY THE 'product_name' VALUE NOT EXISTING IN DATABASE TESTING ENVIRONMENT 
          $product = Products::create([
            'product_name' => 'Missing Fields',
            'product_description' => 'This is a test product description.',
            'product_price' => '25'
        ]);   

        // UPDATE SIMULATION
        $response = $this->putJson("/api/product-update/{$product->id}" ,[ 

                'product_name' => 'Bananas',
                'product_description' => 'Test Description',
                'product_price' => 'TEST'
        ] ); 

        $response->assertStatus(422); 
    }


}
