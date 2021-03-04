{{$box->name}}
<ul>
@foreach($retentions as $ret)
<li>
    {{$ret->product->id}} - {{$ret->product->name}}
</li>
@endforeach
</ul>


{{$moo}}
