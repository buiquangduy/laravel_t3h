<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Transaction;
use App\Order;
use Hash;
use Auth;
use Illuminate\Http\Request;
class TransactionController extends Controller {

    public function getList(){
        $tran = Transaction::select('id','username','level')->orderBy('id','DESC')->get()->toArray();
        return view('admin.transaction.list',compact('tran'));
    }
}
