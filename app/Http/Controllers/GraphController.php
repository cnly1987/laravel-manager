<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class GraphController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('graph.index');
    }

    public function worksheet()
    {
        $sql = "select ywsj_bu as department ,count(id) as number from gta_oam_worksheet where YEARWEEK(date_format(ywsj_start_date,'%Y-%m-%d')) = YEARWEEK(now())-2 and ywsj_bu not like '产品运维部' GROUP BY department";
        $query = DB::select($sql);
        $query = json_decode(json_encode($query), true);
        $department='';
        $number = '';
        foreach($query as $list)
        {
            $department[] = $list['department'];
            $number[] = intval($list['number']);
        }
        $department = json_encode($department);
        $data = array(array("name"=>"事业部运维分类统计图","data"=>$number));
        $data = json_encode($data);
        return view('graph.worksheet',['department'=>$department,'data'=>$data]);
    }

    public function ticket()
    {
        return view('graph.ticket');
    }

}
