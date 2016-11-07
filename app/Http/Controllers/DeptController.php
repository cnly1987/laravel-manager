<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Dept;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class DeptController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('department.list');
    }

    public function createGroup(Request $request)
    {
        $department = new Dept;
        $dept_name = $request->input('adepartmentName');
        if(Dept::where('dept_name',"$dept_name")->count() > 0){
            return "<script type='text/javascript'>alert('事业部群已经存在');</script><script type='text/javascript'> window.history.back(-1);</script>";
        }else {
            $department->dept_name = $dept_name;
            $department->dept_pid = 0;
            $department->dept_descrip = $request->input('adepartmentDes');
            $department->create_date = $request->input('acreate_date');
            $department->create_user = $request->input('acreate_user');
            $department->modify_date = $request->input('amodify_date');
            $department->dept_status = $request->input('agroupStaus');
            $department->save();
            return redirect('department')->with('status', '新增事业部群成功');
        }
    }

    public function createDepartment(Request $request)
    {
        $department = new Dept;
        $dept_name = $request->input('departmentName');
        if(Dept::where('dept_name',"$dept_name")->count() > 0){
            return "<script type='text/javascript'>alert('事业部已经存在');</script><script type='text/javascript'> window.history.back(-1);</script>";
        }else{
            $department->dept_name = $dept_name;
            $department->dept_pid = $request->input('dept_pid');
            $department->create_date = $request->input('create_date');
            $department->create_user = $request->input('create_user');
            $department->modify_date = $request->input('modify_date');
            $department->modify_user = $request->input('modify_user');
            $department->dept_status =$request->input('dept_status');
            $department->save();
            return redirect('department',['status'=>'新增事业部成功']);
        }

    }

    public function update(Request $request)
    {
        $id = $request->input("groupId");
        $status  =$request->input('groupStaus');
        if($status == "已发布"){
            $status =1;
        }elseif($status == "未发布"){
            $status =0;
        }
        $data=[
            "dept_name"=> $request->input('groupName'),
            "dept_descrip"=>  $request->input('groupDes'),
            "modify_date"=> $request->input('Gmodify_date'),
            "modify_user"=> $request->input('Gmodify_user'),
            "dept_status"=> $status,
        ];
        Dept::where('id',$id)
            ->update($data);
        return redirect('department')->with('status','修改事业部成功');
    }

    public function down(Request $request)
    {
        $id = $request->input("down_id");
        Dept::where('id',$id)
            ->update(['dept_status'=>0]);
        return redirect('department')->with('status','修改成功');
    }

    public function up(Request $request)
    {
        $id = $request->input("up_id");
        Dept::where('id',$id)
            ->update(['dept_status'=>1]);
        return redirect('department')->with('status','修改成功');
    }

    public function delete(Request $request)
    {
        $id = $request->input("delete_id");
        Dept::find($id)->delete();
        Dept::where('dept_pid',$id)->delete();
        return redirect('department')->with('status','删除成功');

    }

    public function _list()
    {
        $aColumns = array('groups','dept_descrip','department','modify_date','dept_status','id');
        $sTable = "v_p_department";

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
