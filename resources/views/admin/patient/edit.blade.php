@extends('admin.layouts.app')
@section('content')
     <!-- page content -->
     <div class="right_col" role="main">
            <div class="">
              <div class="page-title">
                <div class="title_left">
                  <h3>Add Patient</h3>
                </div>
  
                @if (Session::has('message'))
                  <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                
              </div>
              <div class="clearfix"></div>
  
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Patient Form</h2>
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
                    <form method="post" action="{{ action('PatientsController@update', $share->id) }}">
                    @method('PATCH')
                    @csrf
                        <div class="form-group">
                            <label for="name">Share Name:</label>
                            <input type="text" class="form-control" name="name" value={{ $share->name }} />
                        </div>
                        <div class="form-group">
                            <label for="price">Share Price :</label>
                            <input type="text" class="form-control" name="email" value={{ $share->email }} />
                        </div>
                        <div class="form-group">
                            <label for="quantity">Share Quantity:</label>
                            <input type="text" class="form-control" name="number" value={{ $share->number }} />
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /page content -->
@endsection