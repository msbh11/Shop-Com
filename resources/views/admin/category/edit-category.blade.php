@extends('admin.master')

@section('body')
<br/>
<div class="row">
    <div class="col-md-9 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center text-success">Add Category Form</h4>
            </div>
            <div class="panel-body">
                <h3 class="text-center text-success"> {{ Session :: get('message') }} </h3>
                <form action="{{ route('update-category')}}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3">Category Name</label>
                        <div class="col-md-9">
                            <input type="text" name="category_name" value = " {{ $category->category_name  }}" class="form-control"/>
                            <input type="hidden" name="category_id" value = " {{ $category->id  }}" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Category Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="editor" name="category_description">{{ $category->category_description  }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Publication status</label>
                        <div class="col-md-9 radio">
                            <label><input type="radio" name="publication_status" {{ $category->publication_status == 1 ? 'checked' : '' }} value="1"/> Published</label>
                            <label><input type="radio" name="publication_status"{{ $category->publication_status == 0 ? 'checked' : '' }} value="0"/> Unpublished</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" name="btn" value="Update Category Info" class="btn btn-success btn-block"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection