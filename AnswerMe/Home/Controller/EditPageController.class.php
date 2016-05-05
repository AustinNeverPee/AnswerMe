<?php
namespace Home\Controller;
use Think\Controller;
class EditPageController extends Controller {
    public function index($hid,$version){
        if(!session("uid")){
            $this->error("请先登录！", "/answer_me/home.php/HomePage", 3);
        }

    	//assign data
    	$data = array();
    	//DB
    	$homework = M('homework');
    	$contain = M('contain');
    	$course = M('course');
    	$courseIndex = M('courseindex');
    	//get courseName
    	$cid = $contain->where("hid=".$hid)->find();
    	$cid = $cid['cid'];
    	$courseVersion = $courseIndex->where('cid='.$cid)->getField('version');
    	$courseName = $course->where('cid='.$cid.' AND version='.$courseVersion)->getField('course_name');
    	$data['courseName']=$courseName;
    	
    	//get courses homeworks
    	$hids = $contain->where('cid='.$cid)->getField('hid',true);
    	$homeworkData=array();
        for($i=0;$i<count($hids);$i++){
            $hw=array();
        	$homworkIndex = M('homeworkindex');
        	$homworkVersion = $homworkIndex->where('hid='.$hids[$i])->getField('version');
        	$hw['hid'] = $hids[$i];
            $hw['version'] = $homworkVersion;
            $hw['title'] = $homework->where('hid='.$hids[$i].' AND version='.$homworkVersion)->getField('title');
            $homeworkData[$i] =$hw;
        }
        $data['homeworks']=$homeworkData;
        $data['hid']=$hid;
        $data['version']=$version;
        $data['cid']=$cid;
       	//get homework content
        $this->assign('data',$data);
        $this->display();
    }
    public function getContent(){
    	$hid=  $_POST['hid'];
    	$version = $_POST['version'];
    	$data=array();
    	$homework = M('homework');
    	$data['content']=$homework->where('hid='.$hid.' AND version='.$version)->getField('content');
  		$this->ajaxReturn($data,'json');
    }

    public function setContent(){
        $status=1;
        $hid=  $_POST['hid'];
        $content = $_POST['content'];
        $version=$_POST['version'];

        $homework = M('homework');
        $homeworkIndex = M('homeworkindex');
        $edithw = M('edithw');
        $user = M('user');

        // 获取用户名
        $uid = session('uid');
        $editor = $user->where('uid='.$uid)->getField('username');

        // 找不到作业
        $homeworkData=$homework->where('hid='.$hid.' AND version='.$version)->find();
        if(!$homeworkData)
            $status=-1;

        $homeworkData['content']=$content;
        $latestVersion=$homeworkIndex->where('hid='.$hid)->getField('version');
        $homeworkData['version']=(string)(intval($latestVersion)+1);
        $homeworkData['editor'] = $editor;
        $homeworkData['update_time'] = date('Y-m-d H:i:s');
        //change index
        if(!$homeworkIndex->where('hid='.$hid)->setInc('version')) {
            $status=-2;
        }
        
        //write back to DB
        if(!$homework->add($homeworkData)) {
            $status=-3;
        }
        
        $edithw_data['uid'] = session('uid');
        $edithw_data['hid'] = $hid;
        $edithw_data['version'] = $homeworkData['version'];
        $edithw_data['edit_time'] = date('Y-m-d H:i:s');
        
        if (!$edithw->add($edithw_data)) {
            $status = -4;
        }

        $data['status']=$status;
        $data['hid']=$hid;
        $data['version']=$homeworkData['version'];
        $this->ajaxReturn($data,'json');
    }

    public function createNew() {
        //$cid=$_GET['cid'];
        $cid=$_POST['cid'];
        $status=1;
        $homeworkIndex=M('homeworkindex');
        $homework=M('homework');
        $contain=M('contain');
        $edithw = M('edithw');
        $user = M('user');

        // 获取新uid
        $hid=$homeworkIndex->where("hid=(select max(hid) from `homeworkindex`)")->getField('hid');
        $hid=(string)(intval($hid)+1);
        //$order=$homeworkIndex->where()->getField('hid');
        
        // 计算第几次作业
        $list_hw = $contain->where('cid = '. $cid)->select();
        $num_hw = 1;
        foreach ($list_hw as $hw)
        {
            $num_hw++;
        }

        // 更新homeworkindex表
        $i['hid']=$hid;
        $i['version']=1;
        $i['like_number']=0;
        $i['order']=$num_hw;
        if(!$homeworkIndex->add($i))
            $status=-2;

        // 更新contain表
        $c['hid']=$hid;
        $c['cid']=$cid;
        if(!$contain->add($c))
            $status=-1;

        // 获取用户名
        $uid = session('uid');
        $editor = $user->where('uid='.$uid)->getField('username');

        // 更新homework表
        $newHomework['hid']=$hid;
        $newHomework['version']=1;
        $newHomework['title']="第".$num_hw."次作业";
        $newHomework['editor']=$editor;
        $newHomework['update_time']=date('Y-m-d H:i:s');
        // TO DO: 更新截止日期
        $newHomework['due_time']="2014-12-02 00:00:00";
        $newHomework['content']="";
        if(!$homework->add($newHomework))
            $status=-3;

        $edithw_data['uid'] = $uid;
        $edithw_data['hid'] = $hid;
        $edithw_data['version'] = 1;
        $edithw_data['edit_time'] = date('Y-m-d H:i:s');
        
        if (!$edithw->add($edithw_data)) {
            $status = -4;
        }

        $data["version"]=1;
        $data['hid']=$hid;
        $data['status']=$status;
        $this->ajaxReturn($data,'json');
    }
}