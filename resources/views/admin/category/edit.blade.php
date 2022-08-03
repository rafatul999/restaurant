@extends('layouts.app') 

@section('title','Edit | Category')


@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
              <h4 class="card-title">Edit</h4>
          </div>
          <div class="card-body">
               <form action="{{ route('category.update',$category->id) }}" method="POST" 
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category Name</label>
                          <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                        </div>
                      </div>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                    <a class="btn btn-primary pull-right" href="{{ route('category.index') }}">back</a>
                    <div class="clearfix"></div>
                    
                  </form>
                </div>
        </div>
      </div>
    </div>
  </div>
</div>   

@endsection

