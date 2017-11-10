
    <!-- Header Information -->
    <div class="inverted upper">
        <div class="ui main text container ">
            <h1 class="ui header inverted">{{ $data->name }}</h1>
            <p>{{ $data->description }}</p>
            <div class="ui label red">
                <i class="white marker icon "></i> 
                {{ $data->address }}
            </div>
            @if( ! is_null($data->phone) )
            <div class="ui label blue">
                <i class="white call icon "></i> 
                {{ $data->phone->contact }}
            </div>
            @endif
            <div class="ui label yellow">
                <i class="white mail icon"></i> 
                {{ $data->owner->email }}
            </div>
        </div>
    </div>
