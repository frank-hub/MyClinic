@extends('admin.layouts.app')
@section('content')
<div class="right_col" role="main">
<div class="row">
    <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>All Patients <small>
                {{-- <a href="{{url('/patient_pdf')}}" class="btn btn-success"><i class="fa fa-pdf"></i>PDF</a>   --}}
                </small></h2>
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
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Patient N0.</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Number</th>
                      <th>Occupation</th>
                      <th>Phone</th>
                      <th>Location</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                          <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                          <td>-</td>
                            <td>
                                <a href="{{ action('PatientsController@edit',$user->id)}}" class="btn btn-primary">Edit</a>
                                <form action="{{action('PatientsController@destroy', $user['id'])}}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                          </tr>
                    @endforeach
                    @foreach ($patient as $patients)
                          <tr>
                            <th scope="row">{{$patients->id}}</th>
                            <td>{{$patients->name}}</td>
                            <td>{{$patients->email}}</td>
                            <td>{{$patients->number}}</td>
                            <td>{{$patients->occupation}}</td>
                            <td>{{$patients->phone}}</td>
                          <td>{{$patients->area}}</td>
                            <td>
                                <a href="{{ action('PatientsController@edit',$patients->id)}}" class="btn btn-primary">Edit</a>
                                <form action="{{action('PatientsController@destroy', $patients['id'])}}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
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
@endsection