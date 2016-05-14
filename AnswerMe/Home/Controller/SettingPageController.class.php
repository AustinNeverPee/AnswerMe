<?php
namespace Home\Controller;
use Think\Controller;
class SettingPageController extends Controller {
    public function index(){
    	if(!session("uid")){
            $this->error("请先登录！", "/answer_me/home.php/HomePage", 3);
        }
    	
        
    	
        $this->display();
    }

    public function complete() {
    	// 获取用户名
        $uid = session('uid');

        // 更新数据库
        $user = M('user');
        
        // 获取前端传递数据
        $u['username'] = $_POST['username'];
        $u['password'] = md5($_POST['password']);
        $u['email'] = $_POST['email'];
        //$u['experience'] = 1;
        $u['school'] = $_POST['school'];
        $u['college'] = $_POST['college'];
        $u['profession'] = $_POST['profession'];
        $u['entry_year'] = $_POST['enteryear'];

        if ($user->where('uid='.$uid)->save($u) === False) {
        	$data['status'] = -1;
        	$data['msg'] = "数据库更新失败！";
        }
        else {
        	$data['status'] = 1;
        	$data['msg'] = "修改成功！";
        }

        $this->ajaxReturn($data, 'json');
    }
}