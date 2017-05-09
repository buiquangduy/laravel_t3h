<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CateRequest;
use App\Transaction;
use Illuminate\Http\Request;
use App\Order;
use Carbon;
class ReportController extends Controller {

    public function tunover(){
        return view('admin.report.tunover');
    }

    public function getturnover()
    {
        $json = [];
        $y = date('Y') - 1; //thoi gian nam ngoai
        $m = date('m')+1; //thang hien tai + 1
        $arrTurnover = Transaction::select( [\DB::raw('DATE_FORMAT(created_at, "%Y/%m")  as month'), \DB::raw('count(*) as qty'), \DB::raw('sum(amount) as amount')])
            ->where('created_at', '>=', $y . '-' . str_pad($m, 2, '0', STR_PAD_LEFT))
            ->groupBy(\DB::raw('DATE_FORMAT(created_at, "%Y/%m")'))
            ->get();
        $month = array();
        while (count($month) < 12) {
            $month[] = $y . '/' . str_pad($m, 2, '0', STR_PAD_LEFT);
            $m++;
            if($m > 12) {
                $m = 1;
                $y++;
            }
        }

        $json['month'] = $month;
        $json['data'] = $arrTurnover;
        $json['code'] = 1;
        return $json;
    }
}
