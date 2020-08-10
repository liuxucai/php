<?php
namespace app\index\controller;
use think\Controller;
class User extends Controller
{
	// 渲染登录页面
	public function login()
	{
		return view();
	}


	// 登录处理
	public function doLogin()
	{
		// 获取表单信息
		$name = input("username");
		$pd = md5(input("passwd"));

		// 验证表信息
		$re = db("user")
			-> where("name",$name)
			-> where("password",$pd)
			-> find();

		// 成功分支
		if ($re != null) {
			session("username",$name);
			$this -> success("登录成功！",'index/index/index');
		}
		// 失败分支
		else{
			$this -> error("登录失败！请重新登录");
		}
	}


































}