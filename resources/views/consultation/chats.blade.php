@extends('admin.layouts.app')
@section('content')


<div class="right_col" role="main" style="min-height: 1069px;">

    <div class="">
    <div class="page-title">
    <div class="title_left">
    <h3>Inbox Design <small>Some examples to get you started</small></h3>
    </div>
    <div class="title_right">
    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
    <div class="input-group">
    <input type="text" class="form-control" placeholder="Search for...">
    <span class="input-group-btn">
    <button class="btn btn-secondary" type="button">Go!</button>
    </span>
    </div>
    </div>
    </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
    <div class="col-md-12">
    <div class="x_panel">
    <div class="x_title">
    <h2>Inbox Design<small>User Mail</small></h2>
    <ul class="nav navbar-right panel_toolbox">
    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
    </li>
    <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Settings 1</a>
    <a class="dropdown-item" href="#">Settings 2</a>
    </div>
    </li>
    <li><a class="close-link"><i class="fa fa-close"></i></a>
    </li>
    </ul>
    <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <div class="row">
    <div class="col-sm-3 mail_list_column">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModal">
    Compose
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{action('ChatController@store')}}" method="post">
            @csrf
        <div class="modal-body">
         
            <div class="form-group">
                <select name="name" id="" class="form-control" required>
                    <option value="" disabled  selected>Select A Patient</option>
                    @foreach ($users as $user)
                        <option value="{{$user->name}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
              <div class="form-group">
                  <textarea type="text" name="message" required class="form-control"></textarea>
              </div>
              <input type="text" name="sender" hidden value="{{Auth::user()->name}}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form> 
      </div>
    </div>
  </div>
        @foreach ($users as $user)
        <a href="#">
            <div class="mail_list">
                <div class="left">
                    <i class="fa fa-circle"></i> <i class="fa fa-edit"></i>
                </div>
                <div class="right">
                    <h3>{{$user->name}}<small>3.00 PM</small></h3>
                </div>
            </div>
        </a>
        @endforeach    
    </div>
    
    
    <div class="col-sm-9 mail_view">
    <div class="inbox-body">
    <div class="mail_heading row">
    <div class="col-md-8">
    {{-- <div class="btn-group">
    <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-reply"></i> Reply</button>
    <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Forward"><i class="fa fa-share"></i></button>
    <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Print"><i class="fa fa-print"></i></button>
    <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Trash"><i class="fa fa-trash-o"></i></button>
    </div> --}}
    </div>
    
    </div>
   @foreach ($chats as $chat)
   <div class="sender-info">
    <div class="row">
     <div class="col-md-12">
    <strong>{{$chat->name}}</strong> Consults
    <strong>{{Auth::user()->name}}</strong>
    <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
    </div>
    </div>
    </div>
    <div class="view-mail">
    <p>{{$chat->message}} </p>
    </div>
   @endforeach
    
    
    </div>
    </div>
    </div>
    
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

  @endsection