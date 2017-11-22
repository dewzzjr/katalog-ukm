@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content_header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <h1>Dashboard</h1>
    <small> Pengguna</small>
    
    <ol class="breadcrumb">
      <li><a href="../admin"><i class="fa fa-dashboard"></i> Dashboard </a></li>
      <li class="active"><i class="fa fa-users"></i> Pengguna</li>
    </ol>
@stop

@section('content')
        <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="input">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form action="#" method="post">
              {!! csrf_field() !!}
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editUserLabel">Edit Pengguna</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" name="name" id="editNama" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="editEmail" placeholder="Alamat Email">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> Error!</h4>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </div>
        @endif
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Success!</h4>
          {{ session()->get('message') }}
        </div>
        @endif
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah Pengguna</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{ url('admin/user/add') }}">
              {!! csrf_field() !!}
                <div class="box-body">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="name" id="addNama" placeholder="Masukkan Nama">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="addEmail" placeholder="Alamat Email">
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Pengguna</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="user" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>UKM</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $users as $user )
                    <tr>
                      <td><a href="{{ url('/admin/user/' . $user->id) }}">{{ $user->name }}</a></td>
                      <td><a href="mailto:{{$user->email}}">{{ $user->email }}</a></td>
                      <td>
                        @if(isset($user->ukm))
                        <a href="{{ url('/admin/ukm/' . $user->ukm->id) }}">
                        {{ $user->ukm->name }}
                        </a>
                        @endif
                      </td>
                      
                      <td>
                      <div class="btn-group-vertical btn-block">
                        <button 
                            type="button" 
                            class="btn btn-default btn-block"
                            data-toggle="modal" 
                            data-target="#editUser"
                            data-nama="{{ $user->name }}"
                            data-email="{{ $user->email }}"
                            data-id="{{ $user->id }}">
                                Edit
                        </button>
                        <button type="button" class="btn btn-default btn-xs  btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="{{ url('/admin/user/' . $user->id . '/reset') }}">Reset Password</a>
                        </li>
                        <li>
                          <a href="{{ url('/admin/user/' . $user->id . '/delete') }}">Delete</a>
                        </li>
                        </ul>
                      </div>
                      </td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>UKM</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@stop

@section('css')
    {{--  <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">  --}}
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#user').DataTable();
        });
        $('#editUser').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var nama = button.data('nama') 
            var email = button.data('email') 
            var id = button.data('id') 
            var modal = $(this)
            $('#editNama').val(nama)
            $('#editEmail').val(email)
            modal.find('form').attr('action', '{{ url("admin/user") }}/' + id + '/edit')
            console.log(id + nama + email)
        })
    </script>
@stop