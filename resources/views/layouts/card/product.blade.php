<div class="ui card">
    <div class="ui fluid">
        <div class="content">
        @if( $product_image != "")
        <img class="ui image" src="{{ url($product_image) }}"/>
        @else
        <img class="ui image" src="{{ url('noimage.png') }}"/>
        @endif
        </div>
    </div>
    <div class="content">
        <div class="ui {{ $cat_color }} right ribbon label">
            <i class="{{ $cat_icon }} icon"></i> {{ $category }}
        </div>
        <a class="header" href="{{ url('ukm/'. $ukm_id) }}">
            {{ $name }}
        </a>
        <span class="meta">
            Produk
        </span>
        <div class="description">
            {{ $description }}
        </div>
    </div>
    <div class="extra content">
        <span>
            <i class="marker icon"></i>
            {{ $ukm_name }}
        </span>
        <br />
        <span>
            <i class="payment icon"></i>
            {{ $money }}
        </span>
    </div>
</div>