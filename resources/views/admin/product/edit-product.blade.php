@extends('admin.master')

@section('body')
<br/>
<div class="row">
    <div class="col-md-8 col-md-offset-1">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <h3 class="text-center text-success" id='xyz'> {{ Session :: get('message') }} </h3>
                <form action="{{ route('update-product') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="control-label col-md-3">Category Name</label>
                        <div class="col-md-9">
                            <select class="form-control" name="category_id">
                              <option>----------------------------------Select Category-------------------------</option>
                              @foreach($categories as $category)
                              <option value=" {{$category->id}}">{{  $category->category_name }}</option>
                              @endforeach
                            </select>
                             <span class="text-danger">{{ $errors-> has('category_id') ? $errors->first('category_id') : ' ' }} </span>
                        </div>
                    </div>

                <div class="form-group">
                        <label class="control-label col-md-3">Brand Name</label>
                        <div class="col-md-9">
                            <select class="form-control" name="brand_id">
                              <option>----------------------------------Select Brand-----------------------------</option>
                              @foreach($brands as $brand)
                              <option value=" {{ $brand->id }}">{{ $brand->brand_name }}</option>
                              @endforeach
                            </select>
                             <span class="text-danger">{{ $errors-> has('brand_id') ? $errors->first('brand_id') : ' ' }} </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Product Name</label>
                        <div class="col-md-9">
                            <input type="text" name="product_name" value = "{{ $product -> product_name}}" class="form-control"/>
                            <input type="hidden" name="product_id" value = "{{ $product -> id}}" class="form-control"/>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-md-3">Product Price</label>
                        <div class="col-md-9">
                            <input type="number" name="product_price" value = "{{ $product -> product_price}}" class="form-control"/>
                            
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-md-3">Product Quantity</label>
                        <div class="col-md-9">
                            <input type="number" name="product_quantity" value = "{{ $product -> product_quantity}}" class="form-control"/>
                           
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Short Description</label>
                        <div class="col-md-9">
                            <textarea name="short_description" value = "{{ $product -> short_description}}" class="form-control"></textarea>
                            
                        </div>
                    </div>

                      <div class="form-group">
                        <label class="control-label col-md-3">Long Description</label>
                        <div class="col-md-9">
                            <textarea name="long_description" value = "{{ $product -> long_description}}" class="form-control"></textarea>
                            
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-md-3">Product Image</label>
                        <div class="col-md-9">
                            <input type="file" name="product_image" accept="image/*"/>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3">Publication status</label>
                        <div class="col-md-9 radio">
                            <label><input type="radio" name="publication_status" 
                                {{ $product->publication_status == 1 ? 'checked' : ''}} value="1"/> Published</label>
                            <label><input type="radio" name="publication_status"
                             {{ $product->publication_status == 0 ? 'checked' : ''}} value="0"/> Unpublished</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" name="btn" value="Update Product Info" class="btn btn-success btn-block"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection