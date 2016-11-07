<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\Serverconfig;

class ServerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $address = Serverconfig::select('option','value','order','status','description')->where(['name'=>'机房','status'=>'启用'])->get()->toArray();
        $os = Serverconfig::select('option','value','order','status','description')->where(['name'=>'操作系统','status'=>'启用'])->get()->toArray();
        $type = Serverconfig::select('option','value','order','status','description')->where(['name'=>'机器类型','status'=>'启用'])->get()->toArray();
        $addressHtml="";
        $osHtml="";
        $typeHtml = "";
        foreach($address as $list){
            $addressHtml .="<option value='".$list['value']."'>".$list["option"]."</option>";
        }
        foreach($os as $list){
            $osHtml .="<option value='".$list['value']."'>".$list["option"]."</option>";
        }
        foreach($type as $list){
            $typeHtml .="<option value='".$list['value']."'>".$list["option"]."</option>";
        }
        return view('server.list',['address'=>$addressHtml,'type'=>$typeHtml,'os'=>$osHtml]);
    }
    public function detail($id)
    {
        $data = Server::find($id);
        return view('server.detail',['data'=>$data]);
    }

    public function create(Request $request)
    {
        $server = new Server;
        $host_ip = $request->input('cip');
        if(Server::where('host_ip',"$host_ip")->count() > 0){
            return redirect('server')->with('status','服务器已经存在!');
        }else{
            $server->host_ip = $host_ip;
            $server->host_address = $request->input('caddress');
            $server->host_type = $request->input('ctype');
            $server->host_os = $request->input('cos');
            $server->host_cpunum = $request->input('ccpu');
            $server->host_memorysize = $request->input('cmem');
            $server->host_disksize =$request->input('cdisk');
            $server->dept_name =$request->input('cdepartment');
            $server->yw_person =$request->input('cyw');
            $server->beizhu =$request->input('cbz');
            $server->save();
            return redirect('server')->with('status','新增事业部成功');
        }
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $uparray = [
            'host_ip'=>$data['eip'],
            'host_address'=>$data['eaddress'],
            'host_type'=>$data['etype'],
            'host_os'=>$data['eos'],
            'host_cpunum'=>$data['ecpu'],
            'host_memorysize'=>$data['emem'],
            'host_disksize'=>$data['edisk'],
            'dept_name'=>$data['edepartment'],
            'yw_person'=>$data['eyw'],
            'beizhu'=>$data['ebz'],
        ];
        Server::where('id',$data['eid'])
            ->update($uparray);
        return redirect('server')->with('status','修改成功');
    }
    public function delete(Request $request)
    {
        $id = $request->input('did');
        Server::where('id',$id)->delete();
    }

    public function _list()
    {
        $aColumns = array('host_ip','host_address','host_type','host_os','host_cpunum','host_memorysize','host_disksize','dept_name','yw_person','id','host_id','beizhu');
        $sTable = "s_server_info";
        $sLimit = "";
        if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
        {
            $sLimit = "LIMIT ".intval( $_GET['iDisplayStart'] ).", ".
                intval( $_GET['iDisplayLength'] );
        }
        $sOrder = "";
        if ( isset( $_GET['iSortCol_0'] ) )
        {
            $sOrder = "ORDER BY ";
            for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
            {
                if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
                {
                    $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
                        ".($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
                }
            }
            $sOrder = substr_replace( $sOrder, "", -2 );
            if ( $sOrder == "ORDER BY" )
            {
                $sOrder = " ";
            }
        }
        $sWhere = "";
        if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
        {
            $sWhere = "WHERE (";
            for ( $i=0 ; $i<count($aColumns) ; $i++ )
            {
                if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" )
                {
                    $sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
                }
            }
            $sWhere = substr_replace( $sWhere, "", -3 );
            $sWhere .= ')';
        }
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
            {
                if ( $sWhere == "" )
                {
                    $sWhere = "WHERE ";
                }
                else
                {
                    $sWhere .= " AND ";
                }
                $sWhere .= $aColumns[$i]." LIKE '%".$_GET['sSearch_'.$i]."%' ";
            }
        }

        $sql = "SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))." FROM $sTable $sWhere $sOrder $sLimit";
        $list =DB::select($sql);

        $list = json_decode(json_encode($list), true);

        foreach($list as $aRow)
        {
            $row = array();
            for ( $i=0 ; $i<count($aColumns) ; $i++ )
            {
                $row[] = $aRow[ $aColumns[$i] ];
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output,true);

    }
}
