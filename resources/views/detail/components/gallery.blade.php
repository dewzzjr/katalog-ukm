
        <!-- Gallery -->
        <div class="ui tab" data-tab="gallery">
            <h2 class="header">Galeri</h2>
            <div id="images" class="ui small images">
            @foreach($data->gallery as $key=>$image)
                <a href="#" onclick="viewer.view({{ $key }})">
                    <img src="{{ url('storage/' . $image->path) }}" title="{{ $image->description }}">
                </a>
            @endforeach
            </div>
        </div>
        