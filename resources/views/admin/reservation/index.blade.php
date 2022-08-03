@extends('layouts.app') 

@section('title','Reservation | index')

@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

<link rel="stylesheet"  href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">

@endpush

@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Add New</h4>
                  <p class="card-category"> All Reservation</p>
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
    