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
              <h2><small>Form Reimbursement</small></h2>
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
              <form id="form-reimbursement" class="form-horizontal form-label-left" action="{{ url('/reimbursement-add')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_pengajuan">Nama Pengajuan<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="nama_pengajuan" required="required" class="form-control" name="nama_pengajuan">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="jenis_pengajuan">Jenis Pengajuan<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <select id="jenis_pengajuan" name="jenis_pengajuan" required="required" class="form-control" onchange=check_pengajuan(this.value);>
                      <option></option>
                      
                    @foreach($jenisreimbursement as $reimbursement)
                      <option value="{{$reimbursement->id}}">{{$reimbursement->jenis_reimbursement}}</option>
                    @endforeach
                    </select>
                  </div>
                </div>
                <div class="item form-group">
                  <label for="nilai" class="col-form-label col-md-3 col-sm-3 label-align">Nilai</label>
                  <div class="col-md-6 col-sm-6 ">
                    <input id="nilai" class="form-control" type="number" name="nilai">
                  </div>
                </div>
                <div class="item form-group" id="transport" style="display:none">
                  <label class="col-form-label col-md-3 col-sm-3 label-align">Klien <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 " >
                    <input id="klien" name="klien" class="form-control" placeholder="Klien" type="text" required="required" >
                  </div>
                </div>
                <div class="item form-group" id="transport_alasan" style="display:''">
                  <label class="col-form-label col-md-3 col-sm-3 label-align">Catatan <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input id="alasan" name="alasan" class="form-control" placeholder="catatan" type="text" required="required" >
                  </div>
                </div>
                <div class="item form-group" id="kesehatan" style="display:''">
                  <label class="col-form-label col-md-3 col-sm-3 label-align">Bukti <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input id="bukti" name="bukti" class="form-control" placeholder="" type="file" required="required" >
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                  <div class="col-md-6 col-sm-6 offset-md-3">
                    <button class="btn btn-primary" type="button">Cancel</button>
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <a onclick="document.getElementById('form-reimbursement').submit();" class="btn btn-success" >Submit</a>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>   
    </div>
</div>
@section('child-scripts')
<script>
function check_pengajuan(id) {
  if(id==1){
        document.getElementById('transport').style.display = '';
        document.getElementById('transport_alasan').style.display = '';
        document.getElementById('kesehatan').style.display = '';
    }else if(id==2){
        document.getElementById('transport').style.display = 'none';
        document.getElementById('transport_alasan').style.display = '';
        document.getElementById('kesehatan').style.display = '';
    }else{
        document.getElementById('transport').style.display = '';
        document.getElementById('transport_alasan').style.display = '';
        document.getElementById('kesehatan').style.display = '';
    }
} 
</script>
@endsection

        <!-- /page content -->

@endsection