@extends('layouts.app') 

@section('title','Edit | Slider')


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
               <form action="{{ route('slider.update',$slider->id) }}" method="POST" 
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Slider Tittle</label>
                          <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Slider SubTittle</label>
                          <input type="text" class="form-control" name="subtitle" value="{{ $slider->subtitle }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <img src="{{ asset('uploads/slider/'.$slider->image) }}" alt="" style="height:70px; width:130px;">
                          <label class="bmd-label-floating">Feature Image</label>
                          <input type="file" name="image" class="form-control">
                        </div>
                      </div>
                </div>
                    
                    <a class="btn btn-primary" href="{{ route('slider.index') }}">back</a>
                    
                    <button type="submit" class="btn btn-primary float-end">Create</button>
                    
                  </form>
                </div>
        </div>
      </div>
    </div>
  </div>
</div>   

@endsection

