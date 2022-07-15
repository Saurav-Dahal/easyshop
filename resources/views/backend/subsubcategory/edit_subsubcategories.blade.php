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
                        <h4 class="box-title">Edit Sub SubCategories</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="{{url('subsubcategory/update/'.$subsubcategories->id)}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">	
                                            <div class="row">	
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Category <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="category_id" id="category_id" class="form-control">
                                                                <option value="" selected disabled>Select Category</option>
                                                                @foreach($categories as $item)
                                                                <option value="{{$item->id}}" {{$item->id == $subsubcategories->subcategory->category_id ? 'selected' : ''}} >{{$item->category_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('category_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>			
                                            </div>
                                            <div class="row">	
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Sub Category <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="sub_category_id" id="sub_category_id" class="form-control">
                                                                <option value="" selected disabled>Select SubCategory</option>
                                                                @foreach($subcategories as $subitem)
                                                                <option value="{{$subitem->id}}" {{$subitem->id == $subsubcategories->sub_category_id ? 'selected' : ''}} >{{$subitem->subcategory_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('sub_category_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>			
                                            </div>
                                            <div class="row">	
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Sub SubCategory <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="subsubcategory_name" id="subsubcategory_name" class="form-control"  value= "{{$subsubcategories->subsubcategory_name}}"> <div class="help-block"></div>
                                                            @error('subsubcategory_name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>				
                                            </div>
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-primary" value="Update SubSubCategory">
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
                        var d = $('select[name="sub_category_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="sub_category_id"]').append('<option value="'+ value.id + '">'+ value.subcategory_name + '</option>');
                        });
                       
                    },
                });
            }else{
                alert('danger');
            }
        });
    });
</script>

@endsection