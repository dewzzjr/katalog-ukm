
        <!-- Settings -->
        <div class="ui tab" data-tab="setting">
            <!-- Bagian Pengaturan User-->
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

            <!-- Bagian Detail UKM -->
            <h2 class="ui attached header">
                <i class="address book icon "></i> Detail
            </h2>
            <div class="ui attached segment">
                <form class="ui form detail" action="{{ url('admin/ukm/'. $data->ukm['id'] .'/detail') }}" method="POST">
                    {!! csrf_field() !!}
                    <input name="id" type="hidden" value="{{ $data->id }}"/>
                    <div class="two fields">
                        <div class="field">
                            <label for="telepon">
                                <i class="grey call icon"></i> Telepon
                            </label>
                            <input name="telepon" type="tel" class="form-control" placeholder="Masukkan nomor Telepon" 
                            @if($data->social['has_telepon']) 
                            @foreach($data->contact as $item)
                                @if($item->type === 'telepon')
                                
                            value="{{ $item->contact }}"
                                    @break
                                @endif
                            @endforeach
                            @endif

                            />
                        </div>
                        <div class="field">
                            <label for="whatsapp">
                                <i class="green whatsapp icon"></i> WhatsApp
                            </label>
                            <input name="whatsapp" type="tel" placeholder="Kosongkan bila tidak ada"
                            @if($data->social['has_whatsapp']) 
                            @foreach($data->contact as $item)
                                @if($item->type === 'whatsapp')

                            value="{{ $item->contact }}"
                                    @break
                                @endif
                            @endforeach
                            @endif

                            />
                        </div>
                    </div>
                        <div class="field">
                            <label for="facebook">
                                <i class="blue facebook icon"></i> Facebook
                            </label>
                            <div class="ui labeled input">
                                <div class="ui label">http://www.facebook.com/</div>
                                <input name="facebook" type="text" class="form-control" placeholder="Link Halaman Profil"
                                @if($data->social['has_facebook']) 
                                @foreach($data->contact as $item)
                                    @if($item->type === 'facebook')
                                    
                                value="{{ $item->contact }}"
                                        @break
                                    @endif
                                @endforeach
                                @endif

                                />
                            </div>                            
                        </div>
                        <div class="field ui">
                            <label for="twitter">
                                <i class="teal twitter icon"></i> Twitter
                            </label>
                            <div class="ui labeled input">
                                <div class="ui label">http://www.twitter.com/</div>
                                <input name="twitter" type="text" class="form-control" placeholder="Link Halaman Profil"
                                @if($data->social['has_twitter']) 
                                @foreach($data->contact as $item)
                                    @if($item->type === 'twitter')
                                    
                                value="{{ $item->contact }}"
                                        @break
                                    @endif
                                @endforeach
                                @endif

                                />
                            </div>
                        </div>
                        <div class="field ui">
                            <label for="instagram">
                                <i class="pink instagram icon"></i> Instagram
                            </label>
                            <div class="ui labeled input">
                                <div class="ui label">http://www.instagram.com/</div>
                                <input name="instagram" type="text" class="form-control" placeholder="Username Instagram"
                                @if($data->social['has_instagram']) 
                                @foreach($data->contact as $item)
                                    @if($item->type === 'instagram')
                                    
                                value="{{ $item->contact }}"
                                        @break
                                    @endif
                                @endforeach
                                @endif

                                />
                            </div>
                        </div>
                    <div class="fields">
                    </div>
                    {{--  <div class="ui error message"></div>  --}}
                    <button type="submit" class="ui fluid positive labeled icon button">
                        <i class="checkmark icon"></i> Submit
                    </button>
                </form>
            </div>

            <!-- Bagian Produk -->
            <h2 class="ui attached header">
                <i class="cart icon "></i> Produk
            </h2>
            <div class="ui attached segment">
                <button class="ui positive right labeled icon button add produk baru">
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
                            <button class="ui button edit produk"   
                                data-tooltip="Edit Produk"
                                data-nama="{{ $product->name }}"
                                data-price="{{ $product->price }}"
                                data-description="{{ $product->description }}"
                                data-id="{{ $product->id }}">
                                <i class="edit icon"></i>
                            </button>
                            <button class="ui button add gambar produk" 
                                data-tooltip="Upload Gambar"
                                data-id="{{ $product->id }}"
                                data-description="{{ $product->name }}">
                                <i class="upload icon"></i>
                            </button>
                            <a href="{{ url('/admin/product') . '/' . $product->id . '/delete' }}" class="ui button" data-tooltip="Hapus Produk"><i class="delete icon"></i></a>
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

            <!-- Bagian UKM -->
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
            @if( isset($data->ukm) )

            <!-- Bagian Gambar -->
            <h2 class="ui attached header">
                <i class="image icon "></i> Gambar
            </h2>
            <div class="ui attached segment">
                <button class="ui positive right labeled icon button add gambar ukm">
                    Tambah Gambar UKM
                    <i class="plus icon"></i>
                </button>

                <button class="ui positive right labeled icon button add gambar profil">
                    Ubah Gambar Profil
                    <i class="user icon"></i>
                </button>
                <table id="daftarGambar" class="ui celled table">
                <tfoot>
                    <tr>
                        <th>Link Gambar</th>
                        <th>Deskripsi</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <thead>
                    <tr>
                        <th>Link Gambar</th>
                        <th>Deskripsi</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if( $data->ukm['ukm_image']->count() > 0 )
                    @foreach( $data->ukm['ukm_image'] as $image )

                    <tr>
                        <td><a href="{{ url($image->path) }}"> {{ $image->ukm_name }} {{ $image->id }}</a></td>
                        <td>{{ $image->description }}</td>
                        <td>UKM</td>
                        
                        <td>
                        <div class="ui small basic icon buttons">
                            {{--  <button class="ui button edit" data-tooltip="Edit Gambar"
                            data-path="{{ $image->path }}"
                            data-type="ukm"
                            data-id="{{ $image->id }}">
                                <i class="edit icon"></i>
                            </button>  --}}
                            <a href="{{ url('/admin/image/ukm') . '/' . $image->id . '/delete' }}" class="ui button" data-tooltip="Hapus Gambar"><i class="delete icon"></i></a>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                    @if( $data->ukm['product_image']->count() > 0 )
                    @foreach( $data->ukm['product_image'] as $image )

                    <tr>
                        <td><a href="{{ url($image->path) }}">Gambar Produk {{ $image->id }}</a></td>
                        <td>{{ $image->description }}</td>
                        <td>Produk: {{ $image->product_name }} </td>
                        <td>
                        <div class="ui small basic icon buttons">
                            {{--  <button class="ui button edit" data-tooltip="Edit Gambar"
                            data-path="{{ $image->path }}"
                            data-type="product"
                            data-id="{{ $image->id }}">
                                <i class="edit icon"></i>
                            </button>  --}}
                            <a href="{{ url('/admin/image/product') . '/' . $image->id . '/delete' }}" class="ui button" data-tooltip="Hapus Gambar"><i class="delete icon"></i></a>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                    @if( isset($data->ukm['user_image']) )
                    @foreach( $data->ukm['user_image'] as $image )

                    <tr>
                        <td><a href="{{ url($image->path) }}">Gambar Profil</a></td>
                        <td>{{ $image->description }}</td>
                        <td>Profil</td>
                        
                        <td>
                        <div class="ui small basic icon buttons">
                            {{--  <button class="ui button edit" data-tooltip="Edit Gambar"
                            data-path="{{ $image->path }}"
                            data-type="user"
                            data-id="{{ $image->id }}">
                                <i class="edit icon"></i>
                            </button>  --}}
                            <a href="{{ url('/admin/image/user') . '/' . $image->id . '/delete' }}" class="ui button" data-tooltip="Hapus Gambar"><i class="delete icon"></i></a>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                    
                </tbody>
                </table>
                
            </div>
            @endif

            <!-- Modal Tambah Produk -->
            <div class="ui modal produk">
                <i class="close icon"></i>
                <div class="header">
                    Tambah Produk
                </div>
                <div class="content">
                
                <form method="POST" class="ui form" id="formModal" action="{{ url('admin/product/add') }}">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" id="idProduk">
                    @if($data->ukm != null)

                        <input name="ukm_id" type="hidden" value="{{ $data->ukm['id'] }}"/>
                    @endif

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
                    </form>
                </div>
                <div class="actions">
                    <button type="submit" form="formModal" class="ui positive right labeled icon button">
                        Submit
                        <i class="checkmark icon"></i>
                    </button>
                </div>
            </div>

            @if($data->ukm != null)

            <!-- Modal Upload Gambar -->
            <div class="ui modal gambar">
                <i class="close icon"></i>
                <div class="header">
                    Upload Gambar
                </div>
                <div class="content">
                
                <form method="POST" class="ui form" id="formImage" action="{{ url('admin/image/add') }}" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <input type="hidden" name="product_id" id="idProdukImg">
                    <input type="hidden" name="type" id="typeImg">
                    <input type="hidden" name="ukm_id" value="{{ $data->ukm['id'] }}"  id="idUkmImg"/>
                    <input type="hidden" name="user_id" value="{{ $data->id }}" id="idUserImg"/>
                    
                    <label for="description">Deskripsi</label>
                    <div class="field">
                        <input type="text" class="form-control" name="description" id="imgDescription" placeholder="Deskripsi Gambar">
                    </div>
                    <label for="imageInput">File input</label>
                    <div class="field">
                        <input data-preview="#preview" name="image" type="file" id="imageInput">
                    </div>
                    <img class="small image" id="preview"  src="{{ url('noimage.png')}}"></img>

                </form>
                </div>
                <div class="actions">
                    <button type="submit" form="formImage" class="ui positive right labeled icon button">
                        Submit
                        <i class="checkmark icon"></i>
                    </button>
                </div>
            </div>
            @endif

        </div>
    </div>
        
    @push('scripts')

        <script>
        @if( isset($data->ukm) )

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

        $( '.ui.button.edit.produk').click(function () {
            var modal = $('.ui.modal.produk');
            $('#addNama').val($(this).attr('data-nama'));
            $('#addDescription').val($(this).attr('data-description'));
            $('#addHarga').val($(this).attr('data-price'));
            $('#idProduk').val($(this).attr('data-id'));
            var url = '{{ url("admin/product") }}/' + $(this).attr('data-id') + '/edit'  
            $('#formModal').attr('action', url);
            modal.modal('show');
        });

        $( '.ui.button.add.produk.baru').click(function () {
            var modal = $('.ui.modal.produk');
            $('#addNama').val('');
            $('#addDescription').val('');
            $('#addHarga').val('');
            $('#idProduk').val('');
            $('#formModal').attr('action', '{{ url("admin/product/add") }}');
            modal.modal('show');
        });

        
        $( '.ui.button.add.gambar.ukm').click(function () {
            var modal = $('.ui.modal.gambar');
            $('#imgDescription').val('');
            $('#idProdukImg').val('');
            $('#idUserImg').val('');
            $('#idUkmImg').val("{{ $data->ukm['id'] }}");
            $('#preview').attr('src', '{{ url("noimage.png") }}');
            $('[name="image"]').val('');
            $('#formImage').attr('action', '{{ url("admin/image/add") }}');
            modal.modal('show');
        });

        $( '.ui.button.add.gambar.profil').click(function () {
            var modal = $('.ui.modal.gambar');
            $('#imgDescription').val('');
            $('#idProdukImg').val('');
            $('#idUserImg').val("{{ $data->id }}");
            $('#idUkmImg').val('');
            $('#preview').attr('src', '{{ url("noimage.png") }}');
            $('[name="image"]').val('');
            $('#formImage').attr('action', '{{ url("admin/image/add") }}');
            modal.modal('show');
        });

        $( '.ui.button.add.gambar.produk').click(function () {
            var modal = $('.ui.modal.gambar');
            $('#imgDescription').val($(this).attr('data-description'));
            $('#idProdukImg').val($(this).attr('data-id'));
            $('#idUserImg').val('');
            $('#idUkmImg').val('');
            $('[name="image"]').val('');
            $('#formImage').attr('action', '{{ url("admin/image/add") }}');
            modal.modal('show');
        });
        @endif

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
