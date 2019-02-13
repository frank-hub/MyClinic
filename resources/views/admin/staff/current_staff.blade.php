@extends('admin.layouts.app')
@section('content')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Hover rows <small>Try hovering over the rows</small></h2>
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
                          <th>Phone</th>
                          <th>Location</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($staff as $staffs)
                              <tr>
                                <th scope="row">{{$staffs->id}}</th>
                                <td>{{$staffs->name}}</td>
                                <td>{{$staffs->email}}</td>
                                <td>{{$staffs->number}}</td>
                                <td>{{$staffs->phone}}</td>
                              <td>{{$staffs->area}}</td>
                                <td>
                                    <form action="{{action('StaffsController@destroy', $staffs['id'])}}" method="post">
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