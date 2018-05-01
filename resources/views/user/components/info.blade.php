        <!-- Information -->
        <div class="ui active tab" data-tab="info">
            <h2 class="ui top attached header">
                <i class="user icon "></i> Info Pengguna
            </h2>
            <div class="ui attached segment">
                <h5 class="ui horizontal header divider">
                    <i class="mail icon"></i>
                    E-mail
                </h5>
                <div class="ui mini statistic">
                    <div class="value">
                        <a href="mailto:{{ $data->email }}">
                        {{ $data->email }}
                        </a>
                    </div>
                </div>

                @if($data->is_admin == 1 && Auth::id() == $data->id)
                <h5 class="ui horizontal header divider">
                    <i class="users icon"></i>
                    Admin
                </h5>
                <a href="{{ url('admin') }}"class="ui primary button">
                    <i class="users icon"></i> Go to Admin Page
                </a>
                @endif
            </div>
        @unless ( empty($data->ukm) )
            <h2 class="ui attached header">
                <i class="home icon "></i> UKM
            </h2>
            <div class="ui attached segment">
                <h5 class="ui horizontal header divider">
                    <i class="home icon"></i>
                    Nama UKM
                </h5>
                <div class="ui mini horizontal statistic">
                    <div class="value">
                        <a href="{{ url('ukm/' . $data->ukm['id']) }}">
                        {{ $data->ukm['name'] }}
                        
                        </a>
                    </div>
                    <div class="label">
                        <div class="ui red label">
                            <i class="in cart icon"></i> {{ $data->ukm['count'] }} Produk
                        </div>
                    </div>
                </div>

                <h5 class="ui horizontal header divider">
                    Deskripsi
                </h5>
                <div class="ui mini horizontal statistic">
                    <div class="value">
                        <div class="ui {{ $data->ukm['cat_color'] }} label">
                            <i class="{{ $data->ukm['cat_icon'] }} icon"></i> {{ $data->ukm['category'] }}
                        </div>
                    </div>
                    <div class="label">
                        {{ $data->ukm['description'] }}
                    </div>
                </div>
                
                <h5 class="ui horizontal header divider">
                    <i class="in marker icon"></i> 
                    Alamat
                </h5>
                <div class="ui mini horizontal statistic">
                    <div class="value">
                        {{ $data->ukm['address'] }}
                    </div>
                </div>
            </div>
            <div class="ui bottom attached segment ">
                <div class="ui fluid">
                    <div class="content mapper">
                        {!! Mapper::render(0) !!}
                    </div>
                </div>
            </div>
            @endunless
        </div>