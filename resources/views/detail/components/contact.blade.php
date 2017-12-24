
        <!-- Contact -->
        <div class="ui tab" data-tab="contact">
            <h2 class="header">Alamat dan Kontak</h2>
            <a class="ui button primary" href="{{ url('profile/'.$data->owner->id) }}">Lihat Pemilik<i class="chevron right icon"></i></a>
            <h2 class="header">Alamat dan Kontak</h2>
            <div class="ui two column grid">
                <div class="column">
                    <div class="ui list link">
                        <div class="item">
                            <i class="icon marker red"></i>
                            <div class="content">
                                <div class="header">Alamat</div>
                                <div class="list">
                                    <div class="item">
                                    {{ $data->address }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <i class="icon mail yellow"></i>
                            <div class="content">
                                <div class="header">Email</div>
                                <div class="list">
                                    <a href="mailto:{{ $data->owner->email }}"class="item">
                                    {{ $data->owner->email }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @if($data->has_website)
                        <div class="item">
                            <i class="icon linkify blue"></i>
                            <div class="content">
                                <div class="header">Website</div>
                                <div class="list">
                                @foreach($data->contact as $item)
                                    @if($item->type === 'website')
                                        <a class="item"> 
                                        {{ $item->contact }}
                                        </a>
                                    @endif
                                @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($data->has_telepon)
                        <div class="item">
                            <i class="icon call grey"></i>
                            <div class="content">
                                <div class="header">Telepon</div>
                                <div class="list">
                                @foreach($data->contact as $item)
                                    @if($item->type === 'telepon')
                                    <div class="item">
                                    {{ $item->contact }}
                                    </div>
                                    @endif
                                @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($data->has_whatsapp)
                        <div class="item">
                            <i class="icon whatsapp green"></i>
                            <div class="content">
                                <div class="header">Whatsapp</div>
                                <div class="list">
                                @foreach($data->contact as $item)
                                    @if($item->type === 'whatsapp')
                                    <div class="item">
                                    {{ $item->contact }}
                                    </div>
                                    @endif
                                @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <h2 class="header">Media Sosial</h2>
            <div class="ui two column grid">
                <div class="column">
                    <div class="ui list link">
                        @if($data->has_facebook)
                        <div class="item">
                            @foreach($data->contact as $item)
                                @if($item->type === 'facebook')
                                <i class="right icon facebook blue"></i>
                                <a 
                                target="_blank" 
                                href="https://www.facebook.com/{{ $item->contact }}" 
                                class="content">
                                @{{ $item->contact }}
                                </a>
                                @endif
                            @endforeach
                        </div>
                        @endif
                        @if($data->has_twitter)
                        <div class="item">
                            @foreach($data->contact as $item)
                                @if($item->type === 'twitter')
                                <i class="right icon twitter teal"></i>
                                <a 
                                target="_blank" 
                                href="https://twitter.com/{{ $item->contact }}" 
                                class="content">
                                @{{ $item->contact }}
                                </a>
                                @endif
                            @endforeach
                        </div>
                        @endif
                        @if($data->has_instagram)
                        <div class="item">
                            @foreach($data->contact as $item)
                                @if($item->type === 'instagram')
                                <i class="right icon instagram pink"></i>
                                <a 
                                target="_blank" 
                                href="https://www.instagram.com/{{ $item->contact }}" 
                                class="content">
                                @{{ $item->contact }}
                                </a>
                                @endif
                            @endforeach
                        </div>
                        @endif                        
                    </div>
                </div>
                <div class="column right aligned">
                    <div class="ui list link">
                        @if($data->has_line)
                        <div class="item">
                            @foreach($data->contact as $item)
                                @if($item->type === 'line')
                                <a 
                                target="_blank" 
                                href="http://line.me/ti/p/~{{ $item->contact }}" 
                                class="content">
                                {{ $item->contact }}
                                </a>
                                <img class="ui image" src="//upload.wikimedia.org/wikipedia/commons/4/41/LINE_logo.svg" style="width:15px">
                                @endif
                            @endforeach
                        </div>
                        @endif
                        @if($data->has_bukalapak)
                        <div class="item ">
                            @foreach($data->contact as $item)
                                @if($item->type === 'bukalapak')
                                <a 
                                target="_blank" 
                                href="https://www.bukalapak.com/u/{{ $item->contact }}" 
                                class="content">
                                @{{ $item->contact }}
                                </a>
                                <img class="ui image" src="//www.bukalapak.com/images/desktop/aset-brand/download/Ikon-Bukalapak-Merah.svg" style="width:15px">
                                @endif
                            @endforeach
                        </div>
                        @endif
                        @if($data->has_tokopedia)
                        <div class="item ">
                            @foreach($data->contact as $item)
                                @if($item->type === 'tokopedia')
                                <a 
                                target="_blank" 
                                href="https://www.tokopedia.com/{{ $item->contact }}" 
                                class="content">
                                @{{ $item->contact }}
                                </a>
                                <img class="ui image" src="//ecs7.tokopedia.net/img/microsite-brand-resource/hires-toped-tokopedia-mascot-new.png" style="width:15px">
                                @endif
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>