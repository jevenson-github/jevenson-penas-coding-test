<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory; 

    // DECLARE THE TABLE NAME TO BE USED 
    protected $table ="products"; 
        
    //FIELDS TO BE INSERTED WITH VALUES 
    // MAKE SURE THE COLUMNS DECLARE HERE ARE MATCH WITHIN THE MIGRATIONS 
    protected $fillable = ['product_name','product_description','product_price']; 
}
