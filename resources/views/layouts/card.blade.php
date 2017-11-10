<div class="card">
    <div class="ui fluid">
        
        <div class="content mapper">
            {!! Mapper::render($order) !!}
        </div>
    </div>
    <div class="content">
        <div class="ui {{ $cat_color }} right ribbon label">
            <i class="{{ $cat_icon }} icon"></i> {{ $category }}
        </div>
        <a class="header" href="{{ url('ukm/'. $id) }}">
            {{ $name }}
        </a>
        <span class="meta">
            UKM
        </span>
        <div class="description">
            {{ $description }}
        </div>
    </div>
    <div class="extra content">
        <span>
            <i class="marker icon"></i>
            {{ $address }}
        </span>
        <br />
        <span>
            <i class="in cart icon"></i>
            {{ $count }} Produk
        </span>
    </div>
</div>