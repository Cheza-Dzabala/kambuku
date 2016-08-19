<span><h2>Be Safe</h2></span>
<span style="visibility: hidden">{{ $i = 1 }}</span>
@foreach($guidelines as $key => $value)
    <div >
        <h4>{{ $i.'.'. $value['title'] }}</h4>
        <p>{{ $value['guide'] }}</p>
        <span style="visibility: hidden">{{ $i++ }}</span>
    </div>
@endforeach