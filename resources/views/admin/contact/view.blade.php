@extends('layouts.app')  

@section('title','View | Contact')


@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
              <h4 class="card-title">Contact</h4>
          </div>
          <div class="card-body">
            <p>{{ $contact->name }}</p>
            <p>{{ $contact->email }}</p>
            <p>{{ $contact->subject}}</p>
            <p>{{ $contact->message }}</p>
          </div>     
           <a class="btn btn-primary" href="{{ route('contact.index') }}">back</a>
           </div>
        </div>
      </div>
    </div>
  </div>
</div>   
@endsection

