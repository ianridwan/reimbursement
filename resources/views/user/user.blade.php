@extends('templates.core')
@section('content')
 <!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row" style="display: block;">
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>List Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <a href="{{url('/user-add') }}" class="btn btn-primary"><small>Add User</small></a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  @if($pesan == "updated" && isset($pesan) )
                <div class = "alert alert-success">
                    <ul>
                        <li>Data Berhasil Simpan</li>
                    </ul>
                </div>
                @elseif($pesan == "saved" && isset($pesan))
                <div class = "alert alert-success">
                    <ul>
                        <li>Data Berhasil di Simpan</li>
                    </ul>
                </div>
                @elseif($pesan == "deleted" && isset($pesan))
                <div class = "alert alert-success">
                    <ul>
                        <li>Data Berhasil di Hapus</li>
                    </ul>
                </div>
                @elseif($pesan == "error" && isset($pesan))
                <div class = "alert alert-danger">
                    <ul>
                        <li>ERROR</li>
                    </ul>
                </div>
                @elseif(isset($pesan) and $pesan != '')
                <div class = "alert alert-success">
                    <ul>
                        <li>{{$pesan}}</li>
                    </ul>
                </div>
                @endif
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">No</th>
                            <th class="column-title">Name</th>
                            <th class="column-title">Email</th>
                            <th class="column-title">Create at</th>
                            <th class="column-title">Role</th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                        @if(isset($userlist) && $userlist->count() !=0 )
                            @foreach($userlist as $userdata)
                            <tr class="even pointer">
                                <td class="a-center">{{$loop->iteration}}</td>
                                <td class=" ">{{$userdata->name}}</td>
                                <td class=" ">{{$userdata->email}} </td>
                                <td class=" ">{{$userdata->created_at}}</td>
                                <td class=" ">{{$userdata->role}}</td>
                                <td class=" last">
                                <a href="{{ url('/user-edit/'.$userdata->id.'')}}" class="btn btn-warning">Edit</a>
                                <form method="POST" action="{{ url('/user-delete/'.$userdata->id.'')}}">
                                @method('delete')
                                @csrf
                                <input type="hidden" value="{{$userdata->id}}" name='id'>
                                <input type="submit" value="delete" class="btn btn-danger">
                                </form> &nbsp;
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr lass="even pointer">
                                <td colspan="6" style="text-align:center">No Data</td>
                            </tr>
                        @endif
                        </tbody>
                      </table>
                    </div>
							
						
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection