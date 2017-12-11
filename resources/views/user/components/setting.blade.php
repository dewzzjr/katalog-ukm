
        <!-- Settings -->
        <div class="ui tab" data-tab="setting">
                <h2 class="ui top attached header">
                    <i class="setting icon "></i> Pengaturan
                </h2>
                <div class="ui attached segment">
                    <form class="ui form" action="{{ url('user/change') }}" method="POST">
                        {!! csrf_field() !!}
                        <input name="id" type="hidden" value="{{ $data->id }}"/>
                        <div class="field">
                            <label for="email">Ganti Email</label>
                            <input name="email" type="email" class="form-control" placeholder="E-mail" value="{{ $data->email or '' }}"/>
                        </div>
                        <div class="field">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Password"/>
                        </div>
                        <div class="field">
                            <label for="newpassword">Password Baru</label>
                            <input name="newpassword" type="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password"/>
                        </div>
                        <div class="field">
                            <label for="newpassword">Konfirmasi Password Baru</label>
                            <input name="newpassword_confirmation" type="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password"/>
                        </div>
                        <button type="submit" class="ui fluid positive labeled icon button">
                            <i class="checkmark icon"></i> Submit
                        </button>
                    </form>
                </div>
                @if( isset($data->ukm) )

                <h2 class="ui attached header">
                    <i class="cart icon "></i> Produk
                </h2>
                <div class="ui attached segment">
                    <button class="ui positive right labeled icon button add">
                        Tambah Produk
                        <i class="plus icon"></i>
                    </button>
                    @if( sizeof($data->product) > 0)

                    <table id="daftarProduk" class="ui celled table">
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $data->product as $product )

                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->money }}</td>
                            
                            <td>
                            <div class="ui small basic icon buttons">
                                <button class="ui button edit" data-tooltip="Edit Produk"
                                    data-nama="{{ $product->name }}"
                                    data-price="{{ $product->price }}"
                                    data-description="{{ $product->description }}"
                                    data-id="{{ $product->id }}">
                                    <i class="edit icon"></i>
                                </button>
                                <button class="ui button" data-tooltip="Upload Gambar"><i class="upload icon"></i></button>
                                <button class="ui button" data-tooltip="Hapus Produk"><i class="delete icon"></i></button>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                    </table>
                    @else
                    
                    <p> NO PRODUCT YET</p>
                    @endif

                </div>
                @endif

                <form class="ui form" action="{{ url('user/ukm') }}" method="POST">
                    {!! csrf_field() !!}
                    <h2 class="ui attached header">
                        <i class="home icon "></i> UKM
                    </h2>
                    <div class="ui attached segment">
                        <input name="user_id" type="hidden" value="{{ $data->id }}"/>
                        @if($data->ukm != null)

                            <input name="id" type="hidden" value="{{ $data->ukm['id'] }}"/>
                        @endif

                        <input name="latitude" type="hidden" value="{{ $data->ukm['latitude'] or '' }}"/>
                        <input name="longitude" type="hidden" value="{{ $data->ukm['longitude'] or '' }}"/>
                        <div class="field">
                            <label for="nama">Nama</label>
                            <input name="name" type="text" class="form-control" placeholder="Masukkan Nama UKM" value="{{ $data->ukm['name'] or '' }}"/>
                        </div>
                        <div class="field">
                            <label>Kategori</label>
                            <select name="category_id" id="category" class="ui dropdown category" value="">
                                <option value="" >Pilih Kategori</option>
                                <option value="1" @if($data->ukm['cat_id'] == 1) selected="selected" @endif>
                                Handycraft dan Furniture</option>
                                <option value="2" @if($data->ukm['cat_id'] == 2) selected="selected" @endif>
                                Makanan Olahan</option>
                                <option value="3" @if($data->ukm['cat_id'] == 3) selected="selected" @endif>
                                Sentra Batik Tulis dan Garmen</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="description">Deskripsi</label>
                            <input name="description" type="text" class="form-control" placeholder="Deskripsi UKM Anda (jenis produk, ciri khas, slogan)" value="{{ $data->ukm['description'] or '' }}"/>
                        </div>
                        <div class="field">
                            <label for="alamat">Alamat</label>
                            <input name="alamat" type="text" class="form-control" placeholder="Masukkan Alamat" value="{{ $data->ukm['alamat'] or '' }}"/>
                        </div>
                        <div class="two fields">
                            <div class="field">
                                <label for="kecamatan">Kecamatan</label>
                                <input name="kecamatan" type="text" class="form-control" placeholder="Kecamatan" value="{{ $data->ukm['kecamatan'] or '' }}"/>
                            </div>
                            <div class="field">
                                <label for="kabupaten">Kabupaten</label>
                                <input name="kabupaten" type="text" class="form-control" placeholder="Kabupaten" value="{{ $data->ukm['kabupaten'] or '' }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="ui attached segment ">
                        <div class="ui fluid">
                            <div class="content mapper">
                                {!! Mapper::render( ($data->ukm == null ? 0 : 1) ) !!}
                            </div>
                        </div>
                        <button type="submit" class="ui attached bottom fluid positive labeled icon button">
                            <i class="checkmark icon"></i> Submit
                        </button>
                    </div>
                </form>

                <!-- Modal Tambah Produk -->
                <form method="POST" id="formModal" action="{{ url('admin/product/add') }}">
                <div class="ui modal form">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" id="idProduk">
                    <i class="close icon"></i>
                    <div class="header">
                        Tambah Produk
                    </div>
                    <div class="content">
                        <label for="nama">Nama</label>
                        <div class="field">
                            <input type="text" class="form-control" name="name" id="addNama" placeholder="Masukkan Nama">
                        </div>
                        <label for="description">Deskripsi</label>
                        <div class="field">
                            <input type="text" class="form-control" name="description" id="addDescription" placeholder="Deskripsi Produk Anda">
                        </div>
                        <label for="harga">Harga</label>
                        <div class="field">
                            <div class="ui labeled input">
                                <span class="ui label">Rp</span>
                                <input type="number" class="form-control" name="price" id="addHarga" placeholder="Harga Produk per Pembelian">
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <button type="submit" class="ui positive right labeled icon button">
                            Submit
                            <i class="checkmark icon"></i>
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        
    @push('scripts')

        <script>
        
        $( '.ui.button.edit').click(function () {
            var modal = $('.ui.modal');
            $('#addNama').val($(this).attr('data-nama'));
            $('#addDescription').val($(this).attr('data-description'));
            $('#addHarga').val($(this).attr('data-price'));
            $('#idProduk').val($(this).attr('data-id'));  
            $('#formModal').attr('action', url);
            modal.modal('show');
        });

        $( '.ui.button.add').click(function () {
            var modal = $('.ui.modal');
            $('#addNama').val('');
            $('#addDescription').val('');
            $('#addHarga').val('');
            $('#idProduk').val('');
            $('#formModal').attr('action', '{{ url('admin/product/add') }}');
            modal.modal('show');
        });

        $('.ui.dropdown.category').dropdown();
        
        function addMarkerListener(map) {
            map.addListener('click', function(e) {
                placeMarker(e.latLng, map);
                setLatLng(e.latLng);
            });
        }
				
        function setLatLng(latLng) {
            $('[name="latitude"]').val(latLng.lat())
            $('[name="longitude"]').val(latLng.lng())
            console.log(latLng.lat())
            console.log(latLng.lng())
		}

        function placeMarker(location, map) {
            if (maps[order].markers[0] == undefined){
                maps[order].markers[0] = new google.maps.Marker({
                    position: location,
                    map: map, 
                    animation: google.maps.Animation.DROP,
                });

            }
            else{
                maps[order].markers[0].setPosition(location);
            }
            
            map.setCenter(location);
            map.panTo(location);

        }
        </script>
    @endpush
