@extends('layout.main')
@section('product')

<div class="container mt-5">
  <div class="row mb-5">
         <div class="col-6">
            <h2 class="text-primary"> PRODUCT MANAGEMENT </h2>
        </div>
        
         <div class="col-6 text-end">
            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</button>
        </div> 
  </div>  

<div id="product-list">
    {{-- RENDERS PRODUCT LIST  --}}
</div>
<div id="pagination-links">
    {{-- RENDERS PAGINATION LINK --}}
</div>


  {{-- MODAL FOR UPDATE PRODUCT --}} 
  <div class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success-subtle ">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"> 
            <div class="row">
                <div class="col">  <div class="mb-3">
                    <label for="product_name" class="form-label ">Product Name</label>
                    <input type="text" class="form-control" id="product_name_update" placeholder="name">
    
                    <div class="text-danger d-none name-validation-update">
                        Please select a valid state.
                      </div>
                </div> 
            </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="product_price" class="form-label ">Product Price</label>
                        <input type="price" class="form-control border " id="product_price_update" placeholder="PHP 00.00">
                        
                         <div class="text-danger d-none price-validation-update">
                            Please select a valid state.
                          </div>
                    </div> 
                </div>
            </div>
          

            <div class="mb-5">
                <label for="product_description" class="form-label ">Product Description</label>
                <input type="text" class="form-control" id="product_description_update" placeholder="description">

                <div class="text-danger d-none description-validation-update">
                    Please select a valid state.
                  </div>
            </div> 

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-success update-product" id="">Update Product</button>

        </div>
      </div>
    </div>
  </div>
{{-- MODAL FOR  DELETE  PRODUCT --}}
<div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger-subtle">
          <h1 class="modal-title fs-5 " id="exampleModalLabel">Product Delete</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"> 
            
            <div class="mb-5">
                <label for="product_description" class="form-label">Confirmation: </label>
                <h6 id="productDescription" class="text-danger">Are you sure you want to delete this <span id="deleteProductName">Product</span>  ? </6>
            </div> 

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger delete-product">Yes</button>
        </div>
      </div>
    </div>
  </div>

{{-- MODAL FOR VIEW DETAILS  --}}
<div class="modal fade" id="viewProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info-subtle">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Product Details</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> 
                
                <div class="row">
                    <div class="col"> 
                        <div class="mb-5">
                        <label for="product_name" class="form-label  ">Name : </label>
                        <h4 class="productName">Product Name </h4>
                    </div> 
                </div>

                    <div class="col">
                        <div class="mb-3">
                            <label for="product_price" class="form-label">Price : </label>
                            <h4 class="productPrice">676.00 (PHP) </h4>
                        </div> 
                    </div>
                </div>
            

                <div class="mb-5">
                    <label for="product_description" class="form-label">Description : </label>
                    <h6 class="productDescription"></h6>
                </div> 

                
        
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
        </div>


  {{-- MODAL FOR ADD  --}} 

<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Create Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"> 
            <div class="row">
                <div class="col">  <div class="mb-3">
                    <label for="product_name" class="form-label ">Product Name</label>
                    <input type="text" class="form-control" id="product_name" placeholder="name">
    
                    <div class="text-danger d-none name-validation">
                        Please select a valid state.
                      </div>
                </div> 
            </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="product_price" class="form-label ">Product Price</label>
                        <input type="price" class="form-control border " id="product_price" placeholder="PHP 00.00">
                        
                         <div class="text-danger d-none price-validation">
                            Please select a valid state.
                          </div>
                    </div> 
                </div>
            </div>
          

            <div class="mb-5">
                <label for="product_description" class="form-label ">Product Description</label>
                <input type="text" class="form-control" id="product_description" placeholder="description">

                <div class="text-danger d-none description-validation">
                    Please select a valid state.
                  </div>
            </div> 

           
       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary submit-product" id="">Save Product</button>

        </div>
      </div>
    </div>
  </div>

  </div>



@endsection

@section('script')
<script> 
$(document).ready(function(){   

    // RENDERS THE FIRST PAGE FOR DATA DISPLAY 
    fetchProductList(1); 

        function fetchProductList(page) {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/product-list', 
                type: 'GET',
                data: { page: page },
                success: function(response) { 

                //    console.log(response);
                //    console.log(response.products.data);
                //    console.log(response.products.first_page_url);
                //    console.log(response.products.next_page_url); 
                //    console.log(response.products.current_page);
                   
                    $('#total-products').text(response.message);
                    // PAGINATED PRODUCTS DATA 
                    var products = response.products.data; 
                    var html = ''; 

                    html += '<table class="table table-bordered" >';
                    html += '<thead>';
                    html += '<tr>';
                    html += '<th scope="col">Name</th>'; 
                    html += '<th scope="col">Description </th> '; 
                    html += '<th scope="col">Price (PHP) </th>' ;
                    html += '<th scope="col">Details </th>' ;
                    html += '<th scope="col">Update </th>' ;
                    html += '<th scope="col">Delete </th>' ;
                    html += '</tr>'; 
                    html += '</thead>'; 
                    html += '</tbody>'; 
                        
                    // LOOP THROUGH PRODUCTS TO RENDER HTML 
                    for (var i = 0; i < products.length; i++) { 
                        var price = Number(products[i].product_price); 
                        var priceConvertedString = price.toLocaleString()
                        html += '<tr>';
                        html += '<td>' + products[i].product_name + '</td>';
                        html += '<td>' + products[i].product_description + '</td>';
                        html += '<td>' + priceConvertedString + '</td>';
                        html += '<td> <button type="button" data-bs-toggle="modal" data-bs-target="#viewProductModal" class="btn btn-outline-info" id=" '+ products[i].id+'" onclick="viewProductDetails('+ products[i].id+')">View</button> </td>' ;
                        html += '<td> <button type="button" data-bs-toggle="modal" data-bs-target="#updateProductModal" class="btn btn-outline-success"  id=" '+ products[i].id+'" onclick="updateProductDetails('+ products[i].id+')">Update</button></td>' ;
                        html += '<td> <button type="button" data-bs-toggle="modal" data-bs-target="#deleteProductModal" class="btn btn-outline-danger"  id=" '+ products[i].id+'" onclick="deleteProductDetails('+ products[i].id+')">Delete</button></td>' ;
                        html += '</tr>';   
                    } 

                    html += '</tbody>';
                    html += '</table>';
                    // REPLACE AND RENDER HTML RESULTS 
                    $('#product-list').html(html);

                    // GENERATE PAGINATION LINKS 
                    var paginationHtml = ''; 
                    paginationHtml += '<p class="text-success">Page : '+ response.products.current_page + ' of ' + response.products.last_page +' </p>'; 
                    paginationHtml += '<nav aria-label="Page navigation example">';  
                    paginationHtml += '        <ul class="pagination justify-content-end">';     


                    if (response.products.prev_page_url) { 
                        paginationHtml += '  <li class="page-item">'; 
                        paginationHtml += '         <a href="#" class="page-link" data-page="' + (response.products.current_page - 1) + '">Previous</a> ';
                        paginationHtml += '  </li>'; 
                    }
                    // for (var i = 1; i <= response.products.last_page; i++) { 
                        
                    //         if (response.products.next_page_url) {
                    //             paginationHtml += '<li class="page-item">'; 
                    //             paginationHtml += '<a href="#" class="page-link" data-page="' +i+ '">'+ i+'</a>'; 
                    //             paginationHtml += '</li>'; 
                          
                    //     } 

                    // }
                    // paginationHtml += 'Current Page : '+ response.products.current_page;
                    if (response.products.next_page_url) { 
                        paginationHtml += '<li class="page-item">'; 
                        paginationHtml += '<a href="#" class="page-link" data-page="' + (response.products.current_page + 1) + '">Next</a>';
                        paginationHtml += '</li>'; 
                    } 
                    paginationHtml += ' </ul>'; 
                    paginationHtml += ' </nav>';     


                    // INSERT PAGINATION LINKS TO HTML CONTAINER 
                    $('#pagination-links').html(paginationHtml);
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(error);
                }
            });
        }

    // EVERYTIME THE PAGINATION BUTTON CLICKS IT WILL FREFRESH DATA PAGINATED . 
    $(document).on('click', '.page-link', function(event) {
        event.preventDefault();
        var page = $(this).data('page');
        fetchProductList(page);
    });

    //CREATE PRODUCT 
  $(".submit-product").on( "click" ,function() {

    let formData = {
                product_name : $('#product_name').val(),
                product_description : $('#product_description').val(),
                product_price : $('#product_price').val()
        }
        
            $.ajax({
                url: 'http://127.0.0.1:8000/api/product-store',
                type: 'POST',
                data: JSON.stringify(formData),
                contentType: 'application/json',
                success: function(response) {

                //    console.log(response); 
                //    alert(response); 

                // HIDE MODAL AFTER DELETE 
                $("#addProductModal").modal('hide');

                 Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Product Successfuly Added",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {  
                         $('#product_name').val(''); 
                         $('#product_description').val(''); 
                         $('#product_price').val(''); 
                            location.reload();
                        });
                },
                error: function(xhr) { 
                    console.log('This is coming from error response'); 
                    // PARSE THE JSON RESPONSE 
                    let error = JSON.parse(xhr.responseText);  

                    // DISPLAYING ERROR RESPONSE  
                     if(error.error.product_name ){
                        console.log(error.error.product_name);
                        $( ".name-validation" ).removeClass( "d-none" ).text(error.error.product_name);
                        $(" #product_name").addClass('border border-danger'); 
                    }else {
                        $( ".name-validation" ).addClass( "d-none" );
                        $(" #product_name").removeClass('border border-danger'); 
                    }
                   
                    if(error.error.product_description){
                        console.log(error.error.product_description);
                        $( ".description-validation" ).removeClass( "d-none" ).text(error.error.product_description);
                        $(" #product_description").addClass('border border-danger'); 
                    }else {
                        $( ".description-validation" ).addClass( "d-none" );
                        $(" #product_description").removeClass('border border-danger'); 
                    }   
                    
                    if(error.error.product_price){
                        console.log(error.error.product_price);
                        $( ".price-validation" ).removeClass( "d-none" ).text(error.error.product_price);
                        $(" #product_price").addClass('border border-danger'); 
                    }else {
                        $( ".price-validation" ).addClass( "d-none" ); 
                        $(" #product_price").removeClass('border border-danger'); 
                    }
            
                }
            });
    });
    
  }); 
  
  // VIEW DETAILS 
    function viewProductDetails(id){
            var product_id = id;    

            // PERFORM REQUEST 
            $.ajax({
                type: "GET",
                url: "http://127.0.0.1:8000/api/product-details/"+product_id,
                success: function (response) {
                        console.log(response); 
                        $('.productName').text(response.product.product_name); 
                        $('.productDescription').text(response.product.product_description); 
                        $('.productPrice').text(response.product.product_price+'\t'+ 'PHP'); 
                }
            });
        }


    // DELETE PRODUCTS 
    function deleteProductDetails (id){
        var product_id = id;  

        // PERFORM REQUEST TO GET THE ID AND PRODUCT DETAILS 
        $.ajax({
                type: "GET",
                url: "http://127.0.0.1:8000/api/product-details/"+product_id,
                success: function (response) {
                        console.log(response); 

                        $('#deleteProductName').text(response.product.product_name);  
                }
            }); 
        
            $( ".delete-product" ).on( "click", function() {
                    $.ajax({
                        type:"DELETE",
                        url: "http://127.0.0.1:8000/api/product-delete/"+product_id,
                        success: function (response) { 

                        // HIDE MODAL AFTER DELETE 
                        $("#deleteProductModal").modal('hide'); 

                        Swal.fire({
                        icon: "success",
                        title: "Product Successfuly Deleted",
                        showConfirmButton: false,
                        timer: 2000 }).then(function() {  
                                location.reload();
                            }); 

                        
                        }
                    });
            } );

        
    }
    // UPDATE PRODUCTS 
    function updateProductDetails(id){
        var product_id = id;  
        
         // PERFORM REQUEST TO POPULATE THE FORM 
         $.ajax({
            type: "GET",
            url: "http://127.0.0.1:8000/api/product-details/"+product_id,
            success: function (response) {
                    console.log(response); 
                    $('#product_name_update').val(response.product.product_name); 
                    $('#product_description_update').val(response.product.product_description); 
                    $('#product_price_update').val(response.product.product_price); 
            }
        }); 


        // PERFORM UPDATE 
        $(".update-product").on( "click" ,function() {

        let formData = {
            product_name : $('#product_name_update').val(),
            product_description : $('#product_description_update').val(),
            product_price : $('#product_price_update').val()
        }
    
        $.ajax({
            url: 'http://127.0.0.1:8000/api/product-update/'+product_id,
            type: 'PUT',
            data: JSON.stringify(formData),
            contentType: 'application/json',
            success: function(response) {

            // HIDE MODAL AFTER DELETE 
            $("#updateProductModal").modal('hide');

             Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Product Successfuly Updated",
                showConfirmButton: false,
                timer: 1500
            }).then(function() {  
                        location.reload();
                    });
            },
            error: function(xhr) { 
                console.log('This is coming from error response'); 
                // PARSE THE JSON RESPONSE 
                let error = JSON.parse(xhr.responseText);  

                // DISPLAYING ERROR RESPONSE  
                 if(error.error.product_name ){
                    console.log(error.error.product_name);
                    $( ".name-validation-update" ).removeClass( "d-none" ).text(error.error.product_name);
                    $(" #product_name_update").addClass('border border-danger'); 
                }else {
                    $( ".name-validation-update" ).addClass( "d-none" );
                    $(" #product_name_update").removeClass('border border-danger'); 
                }
               
                if(error.error.product_description){
                    console.log(error.error.product_description);
                    $( ".description-validation-update" ).removeClass( "d-none" ).text(error.error.product_description);
                    $(" #product_description_update").addClass('border border-danger'); 
                }else {
                    $( ".description-validation-update" ).addClass( "d-none" );
                    $(" #product_description_update").removeClass('border border-danger'); 
                }   
                
                if(error.error.product_price){
                    console.log(error.error.product_price);
                    $( ".price-validation-update" ).removeClass( "d-none" ).text(error.error.product_price);
                    $(" #product_price_update").addClass('border border-danger'); 
                }else {
                    $( ".price-validation-update" ).addClass( "d-none" ); 
                    $(" #product_price_update").removeClass('border border-danger'); 
                }
        
            }
        });
    });

    }

</script>
    
@endsection