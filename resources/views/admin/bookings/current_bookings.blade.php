@extends('admin.layouts.app')
@section('content')
<div class="right_col" role="main">
    <div class="row">
       {{-- PLus Table Design --}}
       <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Plus Table Design</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              
              <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                <thead>
                  <tr>
                    <th>
         <th><input type="checkbox" id="check-all" class="flat"></th>
        </th>
                    <th>Patient N0.</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($bookings as $booking)
                        <tr>
                            <td>
                                <th><input type="checkbox" id="check-all" class="flat"></th>
                                </td>
                          <th scope="row">{{$booking->id}}</th>
                          <td>{{$booking->name}}</td>
                          <td>{{$booking->email}}</td>
                          <td>{{$booking->phone}}</td>
                        <td>{{$booking->start}}</td>
                        <td>{{$booking->illness}}</td>
                        <td>
                          @if ($booking->status=="1")
                              <button class="btn btn-warning">Approved </button>
                          @else
                          <a href="{{action('BookingsController@edit',$booking['id'])}}" class="btn btn-info">Pending</a>
                          @endif
                        </td>
                          <td>                   
                          <form action="{{action('BookingsController@destroy',$booking['id'])}}" method="POST" >
                            @csrf
                              <input name="_method" type="hidden" value="DELETE">
                              <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> </button>
                          </form>
                          </td>
                        </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        {{-- END --}}
    </div>
 </div>
@endsection