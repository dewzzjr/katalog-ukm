
    <!-- Header Information -->
    <div class="inverted upper">
        <div class="ui main text container ">
            <div>
                <img class="ui tiny circular image floated" src="{{ url( $data->url ) }}"/>
                <h1 class="ui header inverted">{{ $data->name }}</h1>
                @unless( empty($data->ukm) )
                <div class="ui label blue">
                    <i class="white home icon "></i> 
                    {{ $data->ukm['name'] }}
                </div>
                @endunless
                <div class="ui label yellow">
                    <i class="white mail icon"></i> 
                    {{ $data->email }}
                </div>
            </div>
        </div>
    </div>
