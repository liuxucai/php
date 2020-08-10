<?php
namespace app\index\controller;
use think\Controller;
class Index extends Controller
{
    // 登录验证
    public function check()
    {
        if (!session("?username")) {
            $this -> error("您尚未登录！",'index/user/login');
        }
    }

    // 主页（信息查询）
    public function index($sousuo="")
    {
        // 调用登录验证
        $this -> check();

        // 获取查询框信息
        $sousuo = input("sousuo");

        // 查询信息表
        $re = db("mes")
            -> whereor("goods","like","%$sousuo%")
            -> whereor("type","like","%$sousuo%")
            -> select();




    	return view("",["mes"=>$re]);
    	
    }

    // 添加信息页面
    public function addgoods()
    {
        $this -> check();
        // 货物种类
        $re = db("mes")
            -> field("type")
            -> select();
        // dump($re);
        return view("",["re"=>$re]);
    }


    // 处理添加信息
    public function addGoodsDeal()
    {
        $this -> check();
        // 获取表单信息
        $data = [
            'goodsId' => input("goodsId"),
            'goods' => input("goods"),
            'addUser' => session("username"),
            'addTime' => time(),
            'type' => input("type"),
        ];

        // 插入表
        $re = db("mes")
            -> insert($data);

        // 成功分支
        if ($re == 1) {
            $this->success("添加成功!",url('index/index/index'));    
        }
        // 失败分支
        else{
            $this->error("添加失败，请重新尝试!",url('index/index/addgoods')); 
        }


    }


    // 删除信息
    public function delGoods(){       
        $this -> check();

        // 获取货物ID
        $goodsId = input("goodsId");

        // 从数据表中删除信息
        $re = db("mes")
            -> where("goodsId",$goodsId)
            -> delete();

        // 成功分支
        if ($re) {
            $this -> success("删除成功",'index/index/index');
        }
        // 失败分支
        else{
            $this -> error("删除失败",'index/index/index');
        }
    }
}
