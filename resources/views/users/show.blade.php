@extends('layaouts.main')
@section('content')
    <div>
        <p> Перевод пользователю: <b>{{$men->name}}</b>. Номер счета: <b>{{$men->account_number}}</b></p>
        <form class="w-25" action="{{route('men.transfer')}}" method="post">
            @csrf
            <div class="mb-3 d-none">
                <input type="number" name="men_from_id" class="form-control" id="men_from_id" value="{{$user->id}}">
            </div>
            <div class="mb-3 d-none">
                <input type="number" name="men_to_id" class="form-control" id="men_to_id" value="{{$men->id}}">
            </div>
            <div class="mb-3">
                <label for="sum" class="form-label">Сумма</label>
                <input type="number" name="sum" class="form-control" id="sum">
                @error('sum')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date_transfer" class="form-label">Дата и время перевода</label>
                <input type="datetime-local" name='date_transfer' class="form-control" id="date_transfer">
                @error('date_transfer')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Перевести</button>
        </form>


    </div>
    <div></div>
@endsection
