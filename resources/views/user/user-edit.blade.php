@extends('templates.core')
@section('content')
 <!-- page content -->
<div class="right_col" role="main">
    <div class="">
    <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2><small>Form User</small></h2>
              <div class="clearfix"></div>
            </div>
            @if (count($errors) > 0)
            <div class = "alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="x_content">
              <br />
              <form id="form-user" class="form-horizontal form-label-left" action="{{ url('/user-edit')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="name" required="required" class="form-control" name="name" value="{{$userdata->name}}">
                    <input type="hidden" id="id" required="required" class="form-control" name="id" value="{{$userdata->id}}">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="email" required="required" class="form-control" name="email" value="{{$userdata->email}}">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="Role">role<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <select id="role" name="role" required="required" class="form-control">
                      <option></option>
                    @foreach($array_role as $key=>$val)
                      @if($key==$userdata->role)
                        <option value="{{$key}}" selected >{{$val}}</option>
                      @else
                        <option value="{{$key}}">{{$val}}</option>
                      @endif
                    @endforeach
                    </select>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                  <div class="col-md-6 col-sm-6 offset-md-3">
                    <a class="btn btn-primary" type="button" href="{{url('/user')}}">Cancel</a>
                    <a onclick="document.getElementById('form-user').submit();" class="btn btn-success" >Submit</a>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>   
    </div>
</div>


        <!-- /page content -->

@endsection