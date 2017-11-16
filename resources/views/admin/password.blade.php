@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content_header')
    <h1>Pengaturan</h1>
    <small> Ubah Password</small>
    
    <ol class="breadcrumb">
        <li><a href="../admin"><i class="fa fa-dashboard"></i> Pengaturan </a></li>
        <li class="active"><i class="fa fa-lock"></i> Password</li>
    </ol>
@stop

@section('content')
    
          <!-- Horizontal Form -->
          <div class="box box-danger">
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputOldPassword" class="col-sm-2 control-label">Password Lama</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputOldPassword" placeholder="Password Lama" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword" class="col-sm-2 control-label">Password Baru</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password Baru" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword1" class="col-sm-2 control-label">Password Baru</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword1" placeholder="Password Baru" required>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop