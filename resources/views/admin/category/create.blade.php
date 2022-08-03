@extends('layouts.app') 

@section('title','Create | Category')


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
                  <form action="{{ route('category.store') }}" method="POST" >
                    @csrf
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category Name</label>
                          <input type="text" class="form-control" name="name">
                        </div>
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

