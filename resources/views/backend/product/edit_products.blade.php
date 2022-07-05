@extends('admin.dashboard.dashboard_master')

@section('con')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container-full">
	<!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Products</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="{{url('product/update/'.$products->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <!------------------- 1st Row Starts ------------------>
                                            <div class="row">	
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Brand <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="brand_id" id="brand_id" class="form-control">
                                                                <option value="" selected disabled>Select Brand</option>
                                                                @foreach($brands as $item)
                                                                <option value="{{$item->id}}" {{ $item->id == $products->brand_id ? 'selected' : ''}}>{{$item->brand_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('brand_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Category <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="category_id" id="category_id" class="form-control">
                                                                <option value="" selected disabled>Select Category</option>
                                                                @foreach($categories as $category)
                                                                <option value="{{$category->id}}" {{ $category->id == $products->category_id ? 'selected' : ''}}>{{$category->category_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('category_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>SubCategory <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="subcategory_id" id="subcategory_id" class="form-control">
                                                                <option value="" selected disabled>Select SubCategory</option>
                                                                @foreach($subcategories as $subcategory)
                                                                <option value="{{$subcategory->id}}" {{ $subcategory->id == $products->subcategory_id ? 'selected' : ''}}>{{$subcategory->subcategory_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('subcategory_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>			
                                            </div>
                                            <!------------------- 1st Row Ends -------------------->

                                            <!------------------- 2nd Row Starts ------------------>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Sub SubCategory <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="subsubcategory_id" id="subsubcategory_id" class="form-control">
                                                                <option value="" selected disabled>Select Sub SubCategory</option>
                                                                @foreach($subsubcategories as $subsubcategory)
                                                                <option value="{{$subsubcategory->id}}" {{ $subsubcategory->id == $products->subsubcategory_id ? 'selected' : ''}}>{{$subsubcategory->subsubcategory_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('subsubcategory_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>				
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_name" id="product_name" class="form-control" value="{{$products->product_name}}"> <div class="help-block"></div>
                                                            @error('product_name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Code <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_code" id="product_code" class="form-control" value="{{$products->product_code}}"> <div class="help-block"></div>
                                                            @error('product_code')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>				
                                            </div>
                                            <!-------------------- 2nd Row Ends ------------------->

                                            <!------------------- 3rd Row Starts ------------------>
                                            <div class="row">	
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Tags<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                        <input type="text" name="product_tags" id="product_tags" class="form-control" value="{{$products->product_tags}}" data-role="tagsinput" placeholder="add tags" style="display: none;">
                                                            @error('product_tags')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Size<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                        <input type="text" name="product_size" id="product_size" class="form-control" value="{{$products->product_size}}" data-role="tagsinput" placeholder="add sizes" style="display: none;">
                                                            @error('product_size')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Color<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                        <input type="text" name="product_color" id="product_color" class="form-control" value="{{$products->product_color}}" data-role="tagsinput" placeholder="add colors" style="display: none;">
                                                            @error('product_color')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>				
                                            </div>
                                            <!-------------------- 3rd Row Ends ------------------->

                                            <!------------------- 4th Row Starts ------------------>
                                            <div class="row">	
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Quantity <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_qty" id="product_qty" class="form-control" value="{{$products->product_qty}}"> <div class="help-block"></div>
                                                            @error('product_qty')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Selling Price <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="selling_price" id="selling_price" class="form-control" value="{{$products->selling_price}}"> <div class="help-block"></div>
                                                            @error('selling_price')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Discounted Price <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="discount_price" id="discount_price" class="form-control" value="{{$products->discount_price}}"> <div class="help-block"></div>
                                                            @error('discount_price')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>				
                                            </div>
                                            <!-------------------- 4th Row Ends ------------------->

                                            <!------------------- 5th Row Starts ------------------>
                                            <div class="row">	
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Thumbnail <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="product_thumbnail" id="product_thumbnail" class="form-control" onChange="mainThumbUrl(this)" > <div class="help-block"></div>
                                                            @error('product_thumbnail')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                            </br>
                                                            <img src="" id="mainThumb">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Multiple Image <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="multi_img[]" id="multi_img" class="form-control" multiple> <div class="help-block"></div>
                                                            @error('multi_img')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                            </br>
                                                            <div class="row" id="preview_img"></div> <!--For showing multiple image -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <h5>Status <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="status" id="status" class="form-control">
                                                                <option value="0" selected>Disable</option>
                                                                <option value="1" {{$products->status == 1 ? 'selected' : '' }}>Active</option>
                                                            </select>
                                                            @error('status')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>				
                                            </div>
                                            <!-------------------- 5th Row Ends ------------------->

                                            <!------------------- 6th Row Starts ------------------>
                                            <div class="row">	
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Long Description <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <textarea id="editor1" name="long_description" rows="5" cols="60" placeholder="Enter Text Here...">{{$products->long_description}}</textarea>
                                                            @error('long_description')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Short Description <span class="text-danger">*</span></h5>
                                                        <div class="controls">
							                                <textarea name="short_description" rows="20" cols="10" class="form-control" placeholder="Enter Short Description">{{$products->short_description}}</textarea>
                                                            @error('short_description')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>				
                                            </div>
                                            </br>
                                            <!-------------------- 6th Row Ends ------------------->

                                            <!------------------- 7th Row Starts ------------------>
                                            <div class="row">	
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="hidden" name="hot_deals" value="0">
                                                        <input type="checkbox" id="hot_deals" name="hot_deals" class="filled-in chk-col-primary" value="1" {{$products->hot_deals == 1 ? 'checked' : '' }}>
                                                        <label for="hot_deals">Hot Deals</label> 
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="featured" value="0">
                                                        <input type="checkbox" id="featured" name="featured" class="filled-in chk-col-primary" value="1" {{$products->featured == 1 ? 'checked' : '' }}>
                                                        <label for="featured">Featured</label> 
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="hidden" name="special_offer" value="0">
                                                        <input type="checkbox" id="special_offer" name="special_offer" class="filled-in chk-col-primary" value="1" {{$products->speacial_offer == 1 ? 'checked' : '' }}>
                                                        <label for="special_offer">Special Offer</label> 
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="special_deals" value="0">
                                                        <input type="checkbox" id="special_deals" name="special_deals" class="filled-in chk-col-primary" value="1" {{$products->speacial_deals == 1 ? 'checked' : '' }}>
                                                        <label for="special_deals">Special Deals</label> 
                                                    </div>
                                                </div>				
                                            </div>
                                            <!-------------------- 7th Row Ends ------------------->

                                
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-primary" value="Update Product">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                    <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>       
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
	<!-- /.content -->
</div>


<!-------------------- For Selecting SubCategory and SubSubCategory ------------------->
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id){
                $.ajax({
                    url: "{{ url('/category/subcategory/ajax') }}/"+category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        $('select[name="subsubcategory_id"]').html('');
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">'+ value.subcategory_name + '</option>');
                        });  
                    },
                });
            }else{
                alert('Please select category.');
            }
        });

        $('select[name="subcategory_id"]').on('click', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id){
                $.ajax({
                    url: "{{ url('/category/subcategory/subsubcategory/ajax') }}/"+subcategory_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        var d = $('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subsubcategory_id"]').append('<option value="'+ value.id + '">'+ value.subsubcategory_name + '</option>');
                        });
                    },
                });
            }else{
                alert('Please select category.');
            }
        });

    });
</script>
<!-------------------- For Selecting SubCategory and SubSubCategory Ends -------------------->

<!-- Note: Instead of 'select[name="category_id"]', we can also write '#category_id' which means id='category_id'. -->

<!-------------------- For Displaying Single Image As Per Selection ------------------->
<script type="text/javascript">

    function mainThumbUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainThumb').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
<!-------------------- For Displaying image as per selection ends ------------------->

<!-- -------------For Showing Multi Image As Per Selection ----------------- -->
<script>
 
  $(document).ready(function(){
   $('#multi_img').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
</script>
<!-- -------------For Showing Multi Image As Per Selection Ends ----------------- -->

@endsection