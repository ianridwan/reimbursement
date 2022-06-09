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
                    <h2><small>List Reimbursement</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <a href="{{url('/reimbursement-add') }}" class="btn btn-primary"><small>Add Reimbursement</small></a>
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
                            <th class="column-title">Pengajuan </th>
                            <th class="column-title">Jenis Pengajuan</th>
                            <th class="column-title">Status</th>
                            <th class="column-title">Nilai Pengajuan</th>
                            <th class="column-title">Created by</th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                        @if(isset($reimbursementlist) && $reimbursementlist->count() !=0 )
                            @foreach($reimbursementlist as $reimbursement)
                            <tr class="even pointer">
                                <td class="a-center">{{$loop->iteration}}</td>
                                <td class=" ">{{$reimbursement->nama_pengajuan}}</td>
                                <td class=" ">{{$reimbursement->jenis_reimbursement->jenis_reimbursement}} </td>
                                <td class=" ">{{$reimbursement->status_reimbursement->status}}</td>
                                <td class="a-right a-right ">Rp {{$reimbursement->nilai}}</td>
                                <td class=" ">{{$reimbursement->user->name}}</td>
                                <td class=" last">
                                    @can('isAdmin')
                                        @if($reimbursement->status==3)
                                            <form method="post" action="{{url('/reimbursement-process')}}">
                                            @csrf
                                            <input type="hidden" value="{{$reimbursement->id}}" name='id'>
                                            <input type="hidden" value="5" name='status'>
                                            <input type="submit" class="btn btn-primary" value="Approve & Proses pembayaran">
                                            </form> &nbsp;
                                        @elseif($reimbursement->status==2)
                                        <form method="post" action="{{url('/reimbursement-process')}}">
                                            @csrf
                                            <input type="hidden" value="{{$reimbursement->id}}" name='id'>
                                            <input type="hidden" value="5" name='status'>
                                            <input type="submit" class="btn btn-primary" value="Proses pembayaran">
                                            </form>
                                        @elseif($reimbursement->status==1)
                                            <a href="{{ url('/reimbursement-edit/'.$reimbursement->id.'')}}" class="btn btn-warning">Edit</a>
                                            <form method="POST" action="{{ url('/reimbursement-delete/'.$reimbursement->id.'')}}">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" value="{{$reimbursement->id}}" name='id'>
                                            <input type="submit" value="delete" class="btn btn-danger">
                                            </form>
                                        @endif
                                    @elsecan('isManager')
                                        @if($reimbursement->status==1)
                                            <form method="post" action="{{url('/reimbursement-process')}}">
                                            @csrf
                                            <input type="hidden" value="{{$reimbursement->id}}" name='id'>
                                            <input type="hidden" value="2" name='status'>
                                            <input type="submit" class="btn btn-primary" value="Approve">
                                            </form> &nbsp;

                                            <form method="post" action="{{url('/reimbursement-process')}}">
                                            @csrf
                                            <input type="hidden" value="{{$reimbursement->id}}" name='id'>
                                            <input type="hidden" value="3" name='status'>
                                            <input type="submit" class="btn btn-danger" value="Reject">
                                            </form>

                                            <form method="POST" action="{{ url('/reimbursement-delete/'.$reimbursement->id.'')}}">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" value="{{$reimbursement->id}}" name='id'>
                                            <input type="submit" value="delete" class="btn btn-danger">
                                            </form>
                                        @endif
                                    @else
                                        @if($reimbursement->status==1)
                                            <a href="{{ url('/reimbursement-edit/'.$reimbursement->id.'') }}" class="btn btn-warning">Edit</a>
                                            <form method="POST" action="{{ url('/reimbursement-delete/'.$reimbursement->id.'')}}">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" value="{{$reimbursement->id}}" name='id'>
                                            <input type="submit" value="delete" class="btn btn-danger">
                                            </form>
                                        @endif
                                    @endcan

                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr lass="even pointer">
                                <td colspan="7" style="text-align:center">No Data</td>
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