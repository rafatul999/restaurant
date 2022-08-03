@extends('layouts.app')  

@section('title','View | Reservation')


@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
              <h4 class="card-title">Reservation</h4>
          </div>
          <div class="card-body">
            
            <p>{{ $reservation->name }}</p>
            <p>{{ $reservation->phone }}</p>
            <p>{{ $reservation->email }}</p>
            <p>{{ $reservation->date_and_time }}</p>
            <p>{{ $reservation->message }}</p>
               
          </div>
                    
           <a class="btn btn-primary" href="{{ route('reservation.index') }}">back</a>

           </div>
        </div>
      </div>
    </div>
  </div>
</div>   

@endsection

