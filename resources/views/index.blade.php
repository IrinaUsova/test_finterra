@extends('layaouts.main')
@section('content')
    <div>
        <h5>Выберите текущего пользователя</h5>
        @foreach($men as $man)
            <div><a href='{{route('men.index', $man->id)}}'>{{$man->id}}. {{$man->name}}</a></div>
        @endforeach
    </div>
@endsection
