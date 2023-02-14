@extends('layaouts.main')
@section('content')
    <div>
        <form class="w-25" action="{{route('men.update', $men->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input type="text" name="name" class="form-control" id="name" value="{{$men->name}}">
            </div>
            <div class="mb-3">
                <label for="account_number" class="form-label">Номер счета</label>
                <input type="text" name="account_number" class="form-control" id="account_number" value="{{$men->account_number}}">
            </div>
            <div class="mb-3">
                <label for="balance" class="form-label">Баланс</label>
                <input type="number" name='balance' class="form-control" id="balance" value="{{$men->balance}}">
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection
