<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\ProductMain;
use App\Models\ProductAppinfo;
use App\Models\ProductDbinfo;
use App\Models\ProductWebinfo;
use Yajra\Datatables\Datatables;
use App\User;
use Auth;


class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        return view('product.index');
    }

    public function detail($sku)
    {
//        $product_main = DB::select("select * from v_product_main where prod_sku = ?",[$sku]);
        $product_main = DB::table('v_product_main')->where('prod_sku',$sku)->get()->toArray();
        $product_info = $product_main[0];
        $product_appinfo = ProductAppinfo::where('prod_sku',$sku)->get();
        $product_dbinfo = ProductDbinfo::where('prod_sku',$sku)->get();
        $product_webinfo = ProductWebinfo::where('prod_sku',$sku)->get();
        return view('product.detail',['product_info'=>$product_info,'product_appinfo'=>$product_appinfo,'product_dbinfo'=>$product_dbinfo,'product_webinfo'=>$product_webinfo,]);
    }


    public function _list(){
        $aColumns = array('prod_name', 'prod_version','prod_manager','proj_manager','yunwei','prod_arch','description', 'prod_sku');
        $sTable = "v_product_main";
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


//        $product = ProductMain::select(['prod_name', 'prod_version','prod_manager','proj_manager','yw_person','prod_arch','desc', 'prod_sku'])
//            ->where('prod_enable','enabled');
//        return Datatables::of($product)->make();
    }

}
