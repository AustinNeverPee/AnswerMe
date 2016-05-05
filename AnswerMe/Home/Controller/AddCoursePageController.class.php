<?php
namespace Home\Controller;
use Think\Controller;
class AddCoursePageController extends Controller {
	public function index(){
		if(!session("uid")){
            $this->error("请先登录！", "/answer_me/home.php/HomePage", 3);
        }

		$this->display();
	}

	public function EditCourse() {
		// 获取前端信息
		$course_college = I('post.course_college'); 
        $course_school = I('post.course_school'); 
        $course_major = I('post.course_major');
        $course_grade = I('post.course_grade'); 
        $course_name = I('post.course_name'); 
        $course_teacher = I('post.course_teacher'); 
        $course_time = I('post.course_time'); 
        $course_place = I('post.course_place');

        // 实例化模型类
        $course = M('course');
        $courseindex = M('courseindex');
        $createcourse = M('createcourse');
        $user = M('user');

        // 获取创建课程用户uid
        $uid = session("uid");

        // 添加数据库
        $status = 1;
        $editor = $user->where("uid=".$uid)->find();
        //get a new hid
        $cid = $courseindex->where("cid=(select max(cid) from `courseindex`)")->getField('cid');
        $cid = (string)(intval($cid)+1);
        // 添加course表
        $c['cid'] = $cid;
        $c['version'] = 1;
	}
}