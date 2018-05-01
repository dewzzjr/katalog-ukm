@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
    <small> Produk</small>
    
    <ol class="breadcrumb">
        <li><a href="../admin"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li class="active"><i class="fa fa-shopping-cart"></i> Produk</li>
    </ol>
@stop

@section('content')
        <div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="input">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form action="#" method="post">
              {!! csrf_field() !!}
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editProductLabel">Edit Produk</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>UKM</label>
                  <select name="ukm_id" id="editUkm" class="form-control select2" style="width: 100%;">
                  </select>
                </div>
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" name="name" id="editNama" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                  <label for="description">Deskripsi</label>
                  <input type="text" class="form-control" name="description" id="editDescription" placeholder="Deskripsi Produk Anda">
                </div>
                <div class="form-group">
                  <label for="harga">Harga</label>
									<div class="input-group">
										<span class="input-group-addon">Rp</span>
										<input type="number" class="form-control" name="price" id="editHarga" placeholder="Harga Produk per Pembelian">
									</div>
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
                <h3 class="box-title">Tambah Produk</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{ url('admin/product/add') }}">
              {!! csrf_field() !!}
                <div class="box-body">
                  <div class="form-group">
                    <label>UKM</label>
                    <select name="ukm_id" id="addUkm" class="form-control select2" style="width: 100%;">
                    </select>
                  </div>
									<div class="form-group">
										<label for="nama">Nama</label>
										<input type="text" class="form-control" name="name" id="addNama" placeholder="Masukkan Nama">
									</div>
									<div class="form-group">
										<label for="description">Deskripsi</label>
										<input type="text" class="form-control" name="description" id="addDescription" placeholder="Deskripsi Produk Anda">
									</div>
									<div class="form-group">
										<label for="harga">Harga</label>
                  	<div class="input-group">
											<span class="input-group-addon">Rp</span>
											<input type="number" class="form-control" name="price" id="addHarga" placeholder="Harga Produk per Pembelian">
										</div>
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
              <h3 class="box-title">Daftar Produk</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="product" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>UKM</th>
                  <th>Deskripsi</th>
                  <th>Harga</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $products as $product )
                    <tr>
                      <td>{{ $product->name }}</td>
                      <td>
                        @if(isset($product->ukm))
                        <a href="{{ url('/ukm/' . $product->ukm->id) }}">
                        {{ $product->ukm->name }}
                        </a>
                        @endif
                      </td>
                      <td>{{ $product->description }}</td>
                      <td>{{ $product->money }}</td>
                      
                      <td>
                      <div class="btn-group-vertical btn-block">
                        <button 
                            type="button" 
                            class="btn btn-default btn-block"
                            data-toggle="modal" 
                            data-target="#editProduct"
                            data-nama="{{ $product->name }}"
                            data-price="{{ $product->price }}"
                            data-ukm="{{ $product->ukm_id }}"
                            data-ukmname="{{ $product->ukm->name }}"
                            data-description="{{ $product->description }}"
                            data-id="{{ $product->id }}">
                                Edit
                        </button>
                        <button type="button" class="btn btn-default btn-xs  btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="{{ url('/admin/product/' . $product->id . '/delete') }}">Delete</a>
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
                  <th>UKM</th>
                  <th>Deskripsi</th>
                  <th>Harga</th>
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
@stop

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
        $(document).ready(function() {
            $('#product').DataTable();
        });
        var ajax = {
          minimumInputLength: 2,
          placeholder: 'Masukkan Nama UKM',
          ajax: {
              url: '{{ url("ajax/ukm") }}',
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
        }
        $('#addUkm').select2(ajax);
        $('#editUkm').select2(ajax);

        $('#editProduct').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
						
						var modal = $(this)
            var id = button.data('id') 
						console.log(id)
						if(id == null) {
							{{--  modal.find('form').attr('action', '{{ url("admin/product/add") }}')  --}}
						} else {
							var nama = button.data('nama') 
							var description = button.data('description') 
							var price = button.data('price') 
							var ukm = button.data('ukm') 
							var ukmname = button.data('ukmname') 
							$('#editUkm').html($('<option>', {
                    selected: 'selected',
                    value: ukm,
                    text: ukmname
                }))
							$('#editNama').val(nama)
							$('#editDescription').val(description)
							$('#editHarga').val(price)
							modal.find('form').attr('action', '{{ url("admin/product") }}/' + id + '/edit')
						}
        })
    </script>

@stop