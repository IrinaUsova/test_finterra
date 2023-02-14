<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Man;
use App\Models\Transfer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManController extends Controller
{
    use HasFactory;
    //Получения списка всех пользователей и информации об их последнем переводе
    public function index(Man $user){
        $id = $user->id;
        $men_all = Man::select('men.id', 'men.name', 'men.account_number', 'men.balance', DB::raw('MAX(transfers.date_transfer) as created_at'))->
                        leftJoin('transfers', 'men.id', '=', 'transfers.men_from_id')->
                        groupBy('men.id', 'men.name', 'men.account_number', 'men.balance')->
                        having('men.id', '!=', $id)->
                        get();

        $current_user  = Man::select('men.id', 'men.name', 'men.account_number', 'men.balance', DB::raw('MAX(transfers.date_transfer) as created_at'))->
                              leftJoin('transfers', 'men.id', '=', 'transfers.men_from_id')->
                              groupBy('men.id', 'men.name', 'men.account_number', 'men.balance')->
                              having('men.id', $id)->
                              get();
        return view('users.index', compact('men_all'), compact('current_user'));

    }
    //страница создание пользователей (тестово)
    public function create(){
        return view('users.create');
    }
    //процесс получение данных из формы и запись в базу данных пользователей
    public function store(){
        $data = request() -> validate([
            'name'=>'string',
            'account_number'=>'string',
            'balance'=>'numeric',
        ]);
        Man::create($data);
        return redirect()->route('main.index');
    }

    //страница создание перевода
    public function show(Man $user, Man $men){
        return view('users.show', compact('user'), compact('men'));
    }
    //процесс отправки денежных средств от одного пользователя к другому
    public function transfer(){
        //получаем id пользователя и остаток на счете того, кто отправляет деньги
        $id_user_from = request()->get('men_from_id');
        $balance_from = Man::where('id', $id_user_from)->get('balance');
        foreach ($balance_from as $item) $balance_from = $item->balance;

        $data = request() -> validate([
            'men_from_id'=>'numeric',
            'men_to_id'=>'numeric',
            'sum'=>'numeric|between:0,'.$balance_from,
            'date_transfer'=> 'after:'.date(DATE_ATOM, time()),
        ]);
        $sum = $data['sum']; //сумма перевода
        //получаем id пользователя и остаток на счете того, кто получает деньги
        $id_user_to = $data['men_to_id'];
        $balance_to = Man::where('id', $id_user_to)->get('balance');
        foreach ($balance_to as $item) $balance_to = $item->balance;

        //совершаем транзакцию
        try {
            DB::beginTransaction();
            $total_sum_from = $balance_from - $sum;
            $total_sum_to = $balance_to + $sum;
            Transfer::create($data);
            DB::table('men')->where('id', $id_user_from)->update(['balance' => $total_sum_from]);
            DB::table('men')->where('id', $id_user_to)->update(['balance' => $total_sum_to]);
            DB::commit();

        }catch (\Exception $exception){
            DB::rollBack();
            return $exception->getMessage();
        }

        return redirect()->route('men.index', ['user'=>$id_user_from]);
    }


    public function edit(Man $men){
        return view('users.edit', compact('men'));
    }

    public function update(Man $men){
        $data = request() -> validate([
            'name'=>'string',
            'account_number'=>'string',
            'balance'=>'numeric',
        ]);
        $men -> update($data);
        return redirect()->route('men.show', $men->id);
    }

    public function destroy(Man $men){
       $men->delete();
    }

}
