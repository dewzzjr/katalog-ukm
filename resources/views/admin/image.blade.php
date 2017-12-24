@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
    <small> Gambar</small>
    
    <ol class="breadcrumb">
      <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
      <li class="active"><i class="fa fa-picture-o"></i> Gambar</li>
    </ol>
@stop

@section('content')
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
            <div class="box" id="ukm-box" >
                <form enctype="multipart/form-data" method="POST" action="{{ url('admin/image/add') }}">
                {{ csrf_field() }}
                <div class="box-header">
                    <h4 class="title" id="title-ukm">Upload Gambar</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>
                                    <input type="radio" value="user" name="type" class="minimal" checked/>
                                    User&emsp;&emsp;&emsp;
                                </label>
                                <label>
                                    <input type="radio" value="ukm" name="type" class="minimal"/>
                                    UKM&emsp;&emsp;&emsp;
                                </label>
                                <label>
                                    <input type="radio" value="product" name="type" class="minimal"/>
                                    Product&emsp;&emsp;&emsp;
                                </label>
                            </div>
                            <div class="form-group">
                                <label id="type-label"></label>
                                <select name="" id="type" class="form-control select2" style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <input class="form-control" name="description" id="description" type="text" placeholder="Masukkan deskripsi gambar">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 mapper" >
                            <div class="form-group">
                                    <label for="imageInput">File input</label>
                                    <input data-preview="#preview" name="image" type="file" id="imageInput">
                                    
                                    <p class="help-block">
                                    <img class="col-sm-6" id="preview"  src="{{ url('noimage.png')}}"></img>
                                    </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <button class="form-control" class="btn btn-primary btn-block" name="Upload" type="submit">Upload</button>    
                    </div>
                </div>
                </form>
            </div>
          </div>
        </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Gambar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="image-list" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Link Gambar</th>
                  <th>Deskripsi</th>
                  <th>Tipe</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $ukms as $image )
                    <tr>
                        <td><a href="{{ url($image->path) }}">{{ $image->path }}</a></td>
                        <td>{{ $image->description }}</td>
                        <td>UKM</td>
                        <td>
                        <div class="btn-group-vertical btn-block">
                            <button 
                                href="#image-box"
                                type="button" 
                                class="btn btn-default btn-block"
                                onclick="setImage(this)"
                                data-path="{{ $image->path }}"
                                data-type="ukm"
                                data-id="{{ $image->id }}">
                                    Open
                            </button>
                            <button type="button" class="btn btn-default btn-xs  btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/admin/image/ukm/'. $image->id . '/delete') }}">Delete</a>
                                </li>
                            </ul>
                        </div>
                        </td>
                    </tr>
                @endforeach
                @foreach( $users as $image )
                    <tr>
                        <td><a href="{{ url($image->path) }}">{{ $image->path }}</a></td>
                        <td>{{ $image->description }}</td>
                        <td>Pengguna</td>
                        <td>
                        <div class="btn-group-vertical btn-block">
                            <button 
                                href="#image-box"
                                type="button" 
                                class="btn btn-default btn-block"
                                onclick="setImage(this)"
                                data-path="{{ $image->path }}"
                                data-type="user"
                                data-id="{{ $image->id }}">
                                    Open
                            </button>
                            <button type="button" class="btn btn-default btn-xs  btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/admin/image/user/'. $image->id . '/delete') }}">Delete</a>
                                </li>
                            </ul>
                        </div>
                        </td>
                    </tr>
                @endforeach
                @foreach( $products as $image )
                    <tr>
                        <td><a href="{{ url($image->path) }}">{{ $image->path }}</a></td>
                        <td>{{ $image->description }}</td>
                        <td>Produk</td>
                        <td>
                        <div class="btn-group-vertical btn-block">
                            <button 
                                href="#image-box"
                                type="button" 
                                class="btn btn-default btn-block"
                                onclick="setImage(this)"
                                data-path="{{ $image->path }}"
                                data-type="product"
                                data-id="{{ $image->id }}">
                                    Open
                            </button>
                            <button type="button" class="btn btn-default btn-xs  btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/admin/image/product/'. $image->id . '/delete') }}">Delete</a>
                                </li>
                            </ul>
                        </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Link Gambar</th>
                  <th>Deskripsi</th>
                  <th>Tipe</th>
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
    {{--  <link rel="stylesheet" href="/css/admin_custom.css">  --}}
    <link href="{{ url('vendor/adminlte/plugins/iCheck/square/blue.css') }}" rel="stylesheet">
    <style>
        img {
            max-width: 400px;
            max-height: 400px;
        }
    </style>
@stop

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ url('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#image-list').DataTable();
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
            $('#type').attr('name', 'user_id')
            initSelect('user', 'Pengguna');
        });

        function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
        }

        $("[name='image']").change(function() {
            readURL(this);
        });

        $('input[name="type"]:radio').on('ifChecked', function(event){
            if ($(this).val() == 'user') {
                $('#type').attr('name', 'user_id')
                initSelect('user', 'Pengguna');
            }
            if ($(this).val() == 'ukm') {
                $('#type').attr('name', 'ukm_id')
                initSelect('ukm', 'UKM');
            } 
            if ($(this).val() == 'product') {
                $('#type').attr('name', 'product_id')
                initSelect('product', 'Produk');
            }
            
        })

        function initSelect(id, name) {
            $('#type-label').html(name);
            $('select.form-control.select2').val("");
            $('#type').select2({
                minimumInputLength: 2,
                placeholder: 'Masukkan Nama ' + name,
                ajax: {
                    url: '{{ url("ajax") }}/' + id,
                    dataType: 'json',
                    type: "GET",
                    delay: 50,
                    data: function (params) {
                        console.log(params);
                        return {
                            query: params.term,
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                console.log(data);
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        }
        
        function setImage( btn ) {
            var id = btn.data('id');
            var path = btn.data('path');
        }
        
    </script>
@stop