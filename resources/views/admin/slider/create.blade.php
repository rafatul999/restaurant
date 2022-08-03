@extends('layouts.app') 

@section('title','Create | Slider')


@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add new</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Slider Tittle</label>
                          <input type="text" class="form-control" name="title">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Slider SubTittle</label>
                          <input type="text" class="form-control" name="subtitle">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <label class="bmd-label-floating">Feature Image</label>
                          <input type="file" name="image" class="form-control">
                        </div>
                      </div>
                    </div>
                      
                    <button type="submit" class="btn btn-primary pull-right">Create</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            </div>
        </div>
       </div>   

@endsection

