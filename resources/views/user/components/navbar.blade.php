
    <!-- Sidebar navigation -->
    <div class="ui borderless secondary menu inverted">
        <div class="ui text container">
            <div href="#" class="header item">
                {{ $data->name }}
            </div>
            <a href="#" class="item active" data-tab="info" id="info">Informasi</a>
            @if(Auth::id() == $data->id)
                <a href="#" class="item" data-tab="setting" id="setting">Pengaturan</a>
            @endif
        </div>
    </div>
