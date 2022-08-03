@extends('layouts.app')

@section('title','Dashboard')
 
@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

<link rel="stylesheet"  href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">

@endpush

@section('content')

 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">category</i>
                  </div>
                  <p class="card-category">Category</p>
                  <h3 class="card-title">{{$categoryCount}}
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="">All Category Here</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">Slideshow</i>
                  </div>
                  <p class="card-category">Slider</p>
                  <h3 class="card-title">{{$sliderCount}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href=""> All Slider Here</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">category</i>
                  </div>
                  <p class="card-category">Item</p>
                  <h3 class="card-title">{{$itemCount}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                   <a href=""> All Item Here</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">restaurant</i>
                  </div>
                  <p class="card-category">Requestd reservation</p>
                  <h3 class="card-title">{{$reservations->count()}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                   <a href=""> Waiting Reservation Here</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">contacts</i>
                  </div>
                  <p class="card-category">Requested Contact</p>
                  <h3 class="card-title">{{$contacts->count()}}
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="">All Contact Here</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Reservation</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="table">
                      <thead class=" text-primary">
                        <th> SI </th>
                        <th> name </th>
                        <th> Phone </th>
                        <th> Email</th>
                        <th> Date & Time</th>
                        <th> Message</th>
                        <th> Status</th>
                        <th> Action</th>
                      </thead>
                      <tbody>
                        @foreach($reservations as $key=>$reservation)
                        <tr>
                          <td> {{ $key+1 }} </td>
                          <td> {{ $reservation->name }}</td>
                          <td> {{ $reservation->phone }} </td>
                          <td> {{ $reservation->email }} </td>
                          <td> {{ $reservation->date_and_time }} </td>
                          <td> {{ $reservation->message }} </td>
                          <td> 
                            @if($reservation->status == 1)
                              <span class="badge badge-success">Confirmed</span>
                            @endif
                            @if($reservation->status == 0)
                            <span class="badge badge-danger">Waiting</span>
                            @endif
                          </td>
                          <td>
                            @if($reservation->status == 0)
                            <form id="status-form-{{ $reservation->id }}" action="{{route('reservation.status',$reservation->id)}}" method="POST" style="display: none;">
                              @csrf
                            </form>
                            <button type="button" class="btn btn-info float-right" onclick="if(confirm('Are you verfiy this request by phone')){event.preventDefault(); document.getElementById('status-form-{{ $reservation->id }}').submit();}
                            else{event.preventDefault();}"><i class="material-icons">check</i></button>
                            @endif
                                     
                            <form id="delete-form-{{ $reservation->id }}" action="{{ route('reservation.destroy',$reservation->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              </form>
                              <button class="btn btn-danger float-right" type="button" onclick="if(confirm('Are you sure want to delete?')){
                                event.preventDefault();document.getElementById('delete-form-{{ $reservation->id }}').submit();
                              }else{
                                event.preventDefault();
                              } ">
                              <i class="material-icons">delete</i>
                              </button>
                            <a href="{{ route('reservation.view',$reservation->id) }}" class="btn btn-info float-right">view </a>
                          </td>
                        </tr>
                        @endforeach 
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Contact</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="table">
                      <thead class=" text-primary">
                        <th> SI </th>
                        <th> name </th>
                        <th> Email</th>
                        <th> Subject</th>
                        <th> Message</th>
                        <th> Status</th>
                        <th> Action</th>
                      </thead>
                     <tbody>
                        @foreach($contacts as $key=>$contact)
                        <tr>
                          <td> {{ $key+1 }} </td>
                          <td> {{ $contact->name }}</td>
                          <td> {{ $contact->email }} </td>
                          <td> {{ $contact->subject }} </td>
                          <td> {{ $contact->message }} </td>
                          <td> 
                            @if($contact->status == 1)
                              <span class="badge badge-success">Confirmed</span>
                            @endif
                            @if($contact->status == 0)
                            <span class="badge badge-danger">Waiting</span>
                            @endif
                          </td>
                          <td>
                            @if($contact->status == 0)
                            <form id="status-form-{{ $contact->id }}" action="{{route('contact.status',$contact->id)}}" method="POST" style="display: none;">
                              @csrf
                            </form>
                            <button type="button" class="btn btn-info float-right" onclick="if(confirm('Have you contact with them')){event.preventDefault(); document.getElementById('status-form-{{ $contact->id }}').submit();}
                            else{event.preventDefault();}"><i class="material-icons">check</i></button>
                            @endif
                                     
                            <form id="delete-form-{{ $contact->id }}" action="{{ route('contact.destroy',$contact->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              </form>
                              <button class="btn btn-danger float-right" type="button" onclick="if(confirm('Are you sure want to delete?')){
                                event.preventDefault();document.getElementById('delete-form-{{ $contact->id }}').submit();
                              }else{
                                event.preventDefault();
                              } ">
                              <i class="material-icons">delete</i>
                              </button>

                            
                            <a href="{{ route('contact.view',$contact->id) }}" class="btn btn-info float-right">view </a>

                          </td>
                        </tr>
                        @endforeach
                       
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
       </div>

     </div>
 </div> 

@endsection
    @push('js')  
    <script  src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script> 
    <script  src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script> 

    <script>
      $(document).ready(function() {
        $('#table').DataTable();
        } );
    </script>
    
    @endpush 