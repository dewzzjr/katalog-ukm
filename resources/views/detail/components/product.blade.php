
        <!-- Product -->
        <div class="ui active tab" data-tab="product">
            <h2 class="header">Daftar Produk</h2>
            <div class="ui items">
                @if(sizeof($data->product) == 0)

                    <p>BELUM ADA PRODUK</p>
                @endif
                @foreach($data->product as $item)

                <div class="item">
                    <div class="ui small image">
                    @if($item->image() == null)

                        <img src="{{ url('noimage.png') }}">
                    @else

                        <img src="{{ asset($item->image()) }}">
                    @endif

                    </div>
                    <div class="content">
                        <div class="header">{{ $item->name }}</div>
                        <div class="meta">
                            <span class="price">{{ $item->money }}</span>
                        </div>
                        <div class="description">
                            <p>{{ $item->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>