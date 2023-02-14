@extends('layaouts.main')
@section('content')
    <div>

        <h5>Текущий пользователь</h5>
        @foreach($current_user as $user)
            <div>
                {{$user->id}}. {{$user->name}}
            </div>
            <div>
                Номер счета: {{$user->account_number}}. Остаток: {{$user->balance}}
            </div>
            <div>
                Дата последнего перевода:{{$user->created_at}}
            </div>
        @endforeach

        <h5 class="mt-5">Все пользователи</h5>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Имя</th>
                <th scope="col">Номер счета</th>
                <th scope="col">Баланс</th>
                <th scope="col">Дата последнего перевода</th>
                <th scope="col"> </th>
            </tr>
            </thead>
            <tbody>
            @foreach($men_all as $man)
            <tr>
                <th scope="row">{{$man->id}}</th>
                <td>{{$man->name}}</td>
                <td>{{$man->account_number}}</td>
                <td>{{$man->balance}}</td>
                <td>{{$man->created_at}}</td>
                @foreach($current_user as $user)

                <td><a href='{{route('men.show', [$user->id, $man->id])}}'>Перевести деньги.</a></td>
                @endforeach
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
