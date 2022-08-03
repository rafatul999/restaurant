@extends('layouts.app')  

@section('title','Edit | Item')


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
               <form action="{{ route('item.update',$item->id) }}" method="POST" 
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category</label>
                          <select class="form-control" name="category">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Item Name</label>
                          <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Item Description</label>
                          <input type="text" class="form-control" name="description" value="{{ $item->description }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Price</label>
                          <input type="text" class="form-control" name="price" value="{{ $item->price }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <img src="{{ asset('uploads/item/'.$item->image) }}" alt="" style="height:70px; width:130px;">
                          <label class="bmd-label-floating">Feature Image</label>
                          <input type="file" name="image" class="form-control">
                        </div>
                      </div>
                </div>
                    
                    <a class="btn btn-primary" href="{{ route('item.index') }}">back</a>
                    
                    <button type="submit" class="btn btn-primary float-end">Create</button>
                    
                  </form>
                </div>
        </div>
      </div>
    </div>
  </div>
</div>   

@endsection

