@extends('baseOption')
<style>
    .list-group-item:nth-child(odd){
        background-color: gray
    }
</style>

@section('content')

<ul class="liste-group">
    @foreach ($lists as $list)
        <li class="list-group-item">{{$list->option_name}} </li>
    @endforeach
</ul>
<div>
    {{ $list->links('pagination::bootstrap-5') }}
</div>

@endsection