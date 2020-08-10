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


    public function index()
    {
        // 调用登录验证
        $this -> check();

        // 
    	return view();
    	
    }



    public function hello()
    {
        $this -> check();
    	return view();
    }
}
