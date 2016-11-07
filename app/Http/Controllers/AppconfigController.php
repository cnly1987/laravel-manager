<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Serverconfig;
use App\Models\ProudctCatagoryconfig;
use App\Models\ProudctAttrconfig;

class AppconfigController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //server_config start
    public function server()
    {
        $address = Serverconfig::select('option','value','order','status','description')->where('name','机房')->get();
        $os = Serverconfig::select('option','value','order','status','description')->where('name','操作系统')->get();
        $type = Serverconfig::select('option','value','order','status','description')->where('name','机器类型')->get();
        return view('appconfig.server',['address'=>$address,'os'=>$os,'type'=>$type]);
    }
    public function addServerAttr(Request $request)
    {
        $serverDict = new Serverconfig;
        $option = $request->input('soption');
        if(Serverconfig::where('option',$option)->count() > 0 ){
            return "<script type='text/javascript'>alert('机房已经存在');</script><script type='text/javascript'> window.history.back(-1);</script>";
        }else{
            $serverDict->name = $request->input('sname');
            $serverDict->option = $option;
            $serverDict->value = $request->input('svalue');
            $serverDict->order = $request->input('sorder');
            $serverDict->status = $request->input('sstatus');
            $serverDict->description = $request->input('sdes');
            $serverDict->save();
            return redirect('appconfig/server');
        }
    }
    public function updateServerAttr(Request $request)
    {
        $option = $request->input('eoption');
        $uparray = [
            'order'=>$request->input('eorder'),
            'status'=>$request->input('estatus'),
            'description'=>$request->input('edes'),
        ];
//        var_dump($uparray);
        Serverconfig::where('option',$option)
            ->update($uparray);
        return redirect('appconfig/server');
    }
    public function deleteServerAttr(Request $request)
    {
        $option = $request->input('doption');
//        var_dump($option);
        Serverconfig::where('option',$option)->delete();
        return redirect('appconfig/server');
    }
    //server_config end

    //product_config start
    public function productCatagory()
    {
        $data = ProudctCatagoryconfig::all()->toArray();
        return view("appconfig.productCatagory",['catagory'=>$data]);
//        var_dump($data);
    }
    public function productCatagoryDetail($id)
    {
        $data = ProudctAttrconfig::where('catalog_id',$id)->get();
        return view("appconfig.productAttr",['attr'=>$data]);
//        var_dump($data);
    }
    public function createProductCatagory(Request $request)
    {
        $catagory = new ProudctCatagoryconfig;
        $name = $request->input('cname');
        if(ProudctCatagoryconfig::where('catalog_name',$name)->count() > 0 ){
            return "<script type='text/javascript'>alert('分类已经存在');</script><script type='text/javascript'> window.history.back(-1);</script>";
        }else{
            $catagory->catalog_name = $name;
            $catagory->catalog_desc = $request->input('cdes');
            $catagory->create_user = $request->input('cuser');
            $catagory->create_date = $request->input('cdate');
            $catagory->update_user = $request->input('cuser');
            $catagory->update_date = $request->input('cdate');
            $catagory->save();
            return redirect('appconfig/product/catagory');
        }
    }
    public function updateProductCatagory(Request $request)
    {
        $eid = $request->input('eid');
        $data = ['catalog_name'=> $request->input('ename'),
                'catalog_desc'=>$request->input('edes'),
                'update_user'=>$request->input('euser'),
                'update_date'=>$request->input('edate'),
        ];
//        var_dump($data);
        ProudctCatagoryconfig::where('id',$eid)
            ->update($data);
        return redirect('appconfig/product/catagory');

    }
    public function deleteProductCatagory(Request $request)
    {
        $did =  intval($request->input('did'));
        var_dump($did);
        ProudctCatagoryconfig::where('id',$did)->delete();
        return redirect('appconfig/product/catagory');
    }

    public function createProductAttr(Request $request)
    {
        $attr = new ProudctAttrconfig;
        $name = $request->input('aoption');
        $cid = $request->input('cid');
        if(ProudctAttrconfig::where('config_name',"$name")->count() > 0 ){
            return "<script type='text/javascript'>alert('分类已经存在');</script><script type='text/javascript'> window.history.back(-1);</script>";
        }else{
            $attr->config_name = $name;
            $attr->config_value = $request->input('avalue');
            $attr->config_seq = $request->input('aorder');
            $attr->catalog_id = $cid;
            $attr->create_user = $request->input('auser');
            $attr->create_date = $request->input('adate');
            $attr->update_user = $request->input('auser');
            $attr->update_date = $request->input('adate');
            $attr->status = $request->input('astatus');
            $attr->save();
            return redirect('appconfig/product/catagory/attr/'.$cid);
        }
    }
    public function updateProductAttr(Request $request)
    {
        $eid = $request->input('eid');
        $cid = $request->input('cid');
        $data = ['config_name'=> $request->input('ename'),
            'config_value'=>$request->input('evalue'),
            'config_seq'=>$request->input('eorder'),
            'status'=>$request->input('estatus'),
            'update_user'=>$request->input('euser'),
            'update_date'=>$request->input('edate'),
        ];
//        var_dump($data);
        ProudctAttrconfig::where('id',$eid)
            ->update($data);
        return redirect('appconfig/product/catagory/attr/'.$cid);
    }
    public function deleteProductAttr(Request $request)
    {
        $did =  intval($request->input('did'));
        $cid = $request->input('cid');
        ProudctAttrconfig::where('id',$did)->delete();
        return redirect('appconfig/product/catagory/attr/'.$cid);
    }


    //product_config end


}
