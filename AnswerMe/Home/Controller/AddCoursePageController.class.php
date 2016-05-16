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
        $editor = $user->where("uid=".$uid)->find();
        //get a new hid
        $cid = $courseindex->where("cid=(select max(cid) from `courseindex`)")->getField('cid');
        $cid = (string)(intval($cid)+1);
        
        // 添加course表
        $c['cid'] = $cid;
        $c['version'] = 1;
        $c['picture'] = 'book_1.jpg'; // TO DO: 添加上传图片功能
        $c['course_name'] = $course_name;
        $c['teacher'] = $course_teacher;
        $c['course_time'] = $course_time;
        $c['course_place'] = $course_place;
        $c['editor'] = $editor;
        $c['update_time'] = date('Y-m-d H:i:s');
        $c['brief'] = 'test'; // TO DO: 添加更多输入框
        $c['profession'] = $course_major;
        $c['college'] = $course_school;
        $c['school'] = $course_college;
        if (!$course->add($c)) {
            $data['status'] = -1;
            $data['msg'] = '添加course数据库失败！';
            $this->ajaxReturn($data, 'json');
        }

        // 添加courseindex表
        $ci['cid'] = $cid;
        $ci['version'] = 1;
        $ci['like_number'] = 0;
        $ci['taken_number'] = 0;
        if (!$courseindex->add($ci)) {
            $data['status'] = -1;
            $data['msg'] = '添加courseindex数据库失败！';
            $this->ajaxReturn($data, 'json');
        }

        //添加createcourse表
        $cc['uid'] = $uid;
        $cc['cid'] = $cid;
        $cc['version'] = 1;
        $cc['create_time'] = date('Y-m-d H:i:s');
        if (!$createcourse->add($cc)) {
            $data['status'] = -1;
            $data['msg'] = '添加createcourse数据库失败！';
            $this->ajaxReturn($data, 'json');
        }

        $data['status'] = 1;
        $data['msg'] = '课程创建成功！';
        $data['url'] = "http://localhost/answer_me/home.php/CoursePage?cid=".$cid."&version=1";
        $this->ajaxReturn($data, 'json');
	}
}