@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
    <small> UKM</small>
    
    <ol class="breadcrumb">
      <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
      <li class="active"><i class="fa fa-briefcase"></i> UKM</li>
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
                    <form method="POST" action="{{ url('admin/ukm/add') }}">
                    {{ csrf_field() }}
                    <input name="latitude" type="hidden"/>
                    <input name="longitude" type="hidden"/>
                    <div class="box-header">
                      <h4 class="title" id="title-ukm"></h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                          <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                              <label>Pemilik</label>
                              <select name="user_id" id="user" class="form-control select2" style="width: 100%;" required>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Kategori</label>
                              <select name="category_id" id="category" class="form-control select2" style="width: 100%;">
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="nama">Nama</label>
                              <input name="name" type="text" class="form-control" placeholder="Masukkan Nama UKM" required/>
                            </div>
                            <div class="form-group">
                              <label for="description">Deskripsi</label>
                              <input name="description" type="text" class="form-control" placeholder="Deskripsi UKM Anda (jenis produk, ciri khas, slogan)" required/>
                            </div>
                            <div class="form-group">
                              <label for="alamat">Alamat</label>
                              <input name="alamat" type="text" class="form-control" placeholder="Masukkan Alamat" required/>
                            </div>
                            <div class="form-group">
                              <label for="kabupaten">Kabupaten</label>
                              <input name="kabupaten" type="text" class="form-control" placeholder="Kabupaten" required/>
                            </div>
                            <div class="form-group">
                              <label for="kecamatan">Kecamatan</label>
                              <input name="kecamatan" type="text" class="form-control" placeholder="Kecamatan" required/>
                            </div>
                          </div>
                          <div class="col-md-9 col-sm-12 mapper" >
                            {!! Mapper::render() !!}
                          </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
            </div>
          <a 
              href="#ukm-box"
              id="add-ukm"
              class="btn btn-app" 
              onclick="setInput(this)">
            <i class="fa fa-play"></i> Tambah
          </a>
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
              <table id="ukm-list" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Deskripsi</th>
                  <th>Pemilik</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $ukms as $ukm )
                    <tr>
                        <td><a href="{{ url('/admin/ukm/' . $ukm->id) }}">{{ $ukm->name }}</a></td>
                        <td>{{ $ukm->description }}</td>
                        <td>
                            @if(isset($ukm->user))
                            <a href="{{ url('/admin/user/' . $ukm->user->id) }}">
                            {{ $ukm->user->name }}
                            </a>
                            @endif
                        </td>
                        
                        <td>
                        <div class="btn-group-vertical btn-block">
                            <button 
                                href="#ukm-box"
                                type="button" 
                                class="btn btn-default btn-block"
                                onclick="setInput(this)"
                                data-nama="{{ $ukm->name }}"
                                data-username="{{ $ukm->user->name }}"
                                data-user="{{ $ukm->user_id }}"
                                data-cat="{{ $ukm->category_id }}"
                                data-catname="{{ $ukm->cat->name }}"
                                data-description="{{ $ukm->description }}"
                                @if(isset($ukm->location))
                                data-kabupaten="{{ $ukm->location->kabupaten }}"
                                data-kecamatan="{{ $ukm->location->kecamatan }}"
                                data-lat="{{ $ukm->location->latitude }}"
                                data-lng="{{ $ukm->location->longitude }}"
                                data-alamat="{{ $ukm->location->alamat }}"
                                @endif
                                data-id="{{ $ukm->id }}">
                                    Edit
                            </button>
                            <button type="button" class="btn btn-default btn-xs  btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/admin/ukm/' . $ukm->id . '/delete') }}">Delete</a>
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
                  <th>Deskripsi</th>
                  <th>Pemilik</th>
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
    <style>
    .mapper {
        height: 800px;
    }
    </style>
    {{--  <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />  --}}
@stop

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $('#user').select2({
          minimumInputLength: 2,
          placeholder: 'Masukkan Nama Pemilik',
          ajax: {
              url: '{{ url("ajax/user") }}',
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
        
        $('#category').select2({
          placeholder: 'Pilih Kategori',
          ajax: {
              url: '{{ url("ajax/category") }}',
              dataType: 'json',
              type: "GET",
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
        var marker;
        $(document).ready(function() {
            $('#ukm-list').DataTable();
        });
        function setInput( btn ) {
            google.maps.event.trigger(maps[0].map, 'resize');
            var button = $(btn) // Button that triggered the modal
            var box = $('#ukm-box')
            var id = button.data('id')
            if (id != null) {
              var nama = button.data('nama') 
              var description = button.data('description') 
              var kecamatan = button.data('kecamatan') 
              var kabupaten = button.data('kabupaten') 
              var alamat = button.data('alamat') 
              var kabupaten = button.data('kabupaten') 
              var alamat = button.data('alamat') 
              var lat = button.data('lat') 
              var lng = button.data('lng') 
              var user = button.data('user') 
              var username = button.data('username') 
              var cat = button.data('cat') 
              var catname = button.data('catname') 
              $('#title-ukm').html('Edit UKM')
              $('[name="name"]').val(nama)
              $('[name="description"]').val(description)
              $('[name="kabupaten"]').val(kabupaten)
              $('[name="kecamatan"]').val(kecamatan)
              $('[name="alamat"').val(alamat)
              $('[name="latitude"]').val(lat)
              $('[name="longitude"]').val(lng)
              $('[name="user_id"]').html($('<option>', {
                    selected: 'selected',
                    value: user,
                    text: username
                }))
              $('[name="category_id"]').html($('<option>', {
                    selected: 'selected',
                    value: cat,
                    text: catname
                }))
              var myLatLng = {lat: lat, lng: lng};
              placeMarker(myLatLng, maps[0].map)
              box.find('form').attr('action', '{{ url("admin/ukm") }}/' + id + '/edit')
            } else {
              if(marker != null) {
                marker.setMap(null);
                marker = null;
              }
              clearInput();
              $('#title-ukm').html('Tambah UKM')
              box.find('form').attr('action', '{{ url("admin/ukm") }}/add')
            }
        }

        function clearInput() {
          $('#ukm-box')
            .find("input,textarea,select")
              .val('')
              .end()
            .find("input[type=checkbox], input[type=radio]")
              .prop("checked", "")
              .end();
        }

        function addMarkerListener(map) {
          map.addListener('click', function(e) {
              placeMarker(e.latLng, map);
              $('[name="latitude"]').val(e.latLng.lat())
              $('[name="longitude"').val(e.latLng.lng())
              console.log(e.latLng.lat())
              console.log(e.latLng.lng())
          });
        }

        function placeMarker(location, map) {
            if (marker == undefined){
                marker = new google.maps.Marker({
                    position: location,
                    map: map, 
                    animation: google.maps.Animation.DROP,
                });
            }
            else{
                marker.setPosition(location);
            }
            
            map.setCenter(location);
            map.panTo(location);

        }
    </script>
@stop