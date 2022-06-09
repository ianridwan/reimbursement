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
                        <a href="{{url('/reimbursement-add') }}"></a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

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
                                <td class=" ">{{$reimbursement->jenis_pengajuan}} </td>
                                <td class=" ">{{$reimbursement->status}}</td>
                                <td class="a-right a-right ">$7.45</td>
                                <td class=" last"><a href="#">View</a>
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