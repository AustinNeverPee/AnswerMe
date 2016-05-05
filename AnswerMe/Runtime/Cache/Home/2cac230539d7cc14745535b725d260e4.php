<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--题目-->
    <title>AnswerMe-Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS-->
    <link href="/answer_me/AnswerMe/Common/Static/css/bootstrap.min.css" rel="stylesheet">
    <!-- Flat UI CSS-->
    <link href="/answer_me/AnswerMe/Common/Static/css/flat-ui.css" rel="stylesheet">
    <!--模板css-->
    <link href="/answer_me/AnswerMe/Common/Static/css/template.css" rel="stylesheet">
    <link href="/answer_me/AnswerMe/Common/Static/css/home.css" rel="stylesheet">
    <!--添加你的CSS-->

    <!--收藏夹图标-->
    <link rel="shortcut icon" href="/answer_me/AnswerMe/Common/Static/resource/favor-icon.jpg">
  </head>

  <body>  
    <!-- 导航栏 -->
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <a class="navbar-brand" href='http://localhost/answer_me/home.php/HomePage'>
          <img src="/answer_me/AnswerMe/Common/Static/resource/logo-green.jpg">
          <span>Answer Me</span>
        </a>
      </div>
      <!--导航栏右侧状态(未登录/登陆后)-->
      <div class="collapse navbar-collapse" id="navbar-collapse-01">
        <div class="loged hidden">
          <span class="fui-user"></span>
          <a href="http://localhost/answer_me/home.php/PersonalPage" id="usersname">KenLee</a>
          <span class="fui-heart"></span>
          <a href="like.html" class="like-num">256</a>
          <div class="btn-group">
            <button id="chooseBtn" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
             more <span class="caret"></span>
            </button>
            <ul id="dropdownMenu" class="dropdown-menu" role="menu">
              <li><a href="http://localhost/answer_me/home.php/HistoryPage">编辑历史</a></li>
              <li><a href="http://localhost/answer_me/home.php/SettingPage">设置</a></li>
              <li class="divider"></li>
              <li><a id="logout_">退出</a></li>
            </ul>
          </div>
        </div>
        <div class="unloged ">
          <div id="btnNav" class="nav navbar-nav navbar-right btn-group">
            <button id="btnRegister" class="btn btn-sm navbar-btn" type="button" data-toggle="modal" data-target="#modalLogin">登录</button>
            <button id="btnLogin" class="btn btn-sm navbar-btn" type="button" data-toggle="modal" data-target="#modalRegister">注册</button>
          </div>
        </div>
      </div>
    </nav>
    <!-- /.导航栏 -->
    <!-- 模态框 -->
    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">登录</h4>
      </div>
      <div class="modal-body">
            <form class="form-horizontal" role="form">
              <div class="form-group">
                <label for="inputUsername" id="labelUsername" class="col-sm-2 control-label">账号</label>
                <div class="col-sm-10">
                  <input type="username" class="form-control" id="inputUsername" placeholder="输入账号">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword" id="labelPassword" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="输入密码">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> 记住我
                    </label>
                    <label id="freeLog">
                      <input type="checkbox"> 自动登录
                    </label>
                    <label id="forgetPassword">
                      <input type="checkbox"> 忘记密码
                    </label>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-block" data-dismiss="modal" id="login_">登录</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">注册</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form">
              <div class="form-group">
                <label for="inputUsername1" class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputUsername1">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword1" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword1">
                </div>
              </div>
              <div class="form-group">
                <label for="inputRepeatpassword" class="col-sm-2 control-label">重复密码</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputRepeatpassword">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">邮箱</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputEmail">
                </div>
              </div>              
              <div class="form-group">
                <label for="inputSchool" class="col-sm-2 control-label">学校</label>
                <select class="form-control" id="selectSchool">
                  <option>选择你的学校</option>
                  <option>中山大学</option>
                  <option>清华大学</option>
                  <option>北京大学</option>
                  <option>华南理工大学</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputCollege" class="col-sm-2 control-label">学院</label>
                <select class="form-control" id="selectCollege">
                  <option>选择你的学院</option>
                  <option>软件学院</option>
                  <option>岭南学院</option>
                  <option>医学院</option>
                  <option>社会教育学院</option>
                  <option>信息科学与技术学院</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputMajor" class="col-sm-2 control-label">专业</label>
                <select class="form-control" id="selectMajor">
                  <option>选择你的专业</option>
                  <option>数字媒体</option>
                  <option>电子政务</option>
                  <option>嵌入式软件</option>
                  <option>通用软件</option>
                  <option>计算机应用</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputYear" class="col-sm-2 control-label">入学年份</label>
                <select class="form-control" id="selectYear">
                  <option>选择你的入学年份</option>
                  <option>2014</option>
                  <option>2013</option>
                  <option>2012</option>
                  <option>2011</option>
                  <option>2010</option>
                </select>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-block" id="register_">确认注册</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.模态框 -->
  <!-- 内容 --> 
  <div id="content" class="container"> 
   <!-- 大家在content中填写自己的页面内容 --> 
   <!-- 把你的css添加到上面的css中，把你的js添加到下面的js中--> 
   <!-- 除了添加，不要改动一切其他东西--> 
   <form role="form"> 
    <div class="span1"> 
     <a href='http://localhost/answer_me/home.php/SearchPage'>
      <div class="input-group" > 
      <input type="text" class="form-control" id="search" /> 
      <span class="input-group-btn"> <button type="submit" class="btn btn-primary" id = "searchcourse"> 搜索课程 </button> <button type="submit" class="btn btn-primary" id="searchhw"> 搜索作业 </button> </span>      
      
     </div>
   </a>
     <!-- /input-group --> 

    </div>
    <!-- /.span1 --> 
   </form> 

   <div class="span2"> 
    <p><font color="#ADADAD">最热课程</font></p> 
   </div> 
   <div class="sum"> 
    <div class="top10"> 
     <a href="#" class="list-group-item active" id = "top10title">
   贡献排行榜
</a>
<?php if(is_array($userlist)): $i = 0; $__LIST__ = $userlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$step): $mod = ($i % 2 );++$i;?><a href="#" class="list-group-item"><?php echo ($step["username"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div> 
    <div class="main"> 

     <?php if(is_array($courselist)): $i = 0; $__LIST__ = $courselist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$steps): $mod = ($i % 2 );++$i;?><div class="clear">
     <div class="span3"> 
      <div class="class_text"> 
       <div class="class_head"> 
        <p style="font-family:verdana;color:#19B68A" class="coursetitle"> <a href="http://localhost/answer_me/home.php/CoursePage?cid=<?php echo ($steps["cid"]); ?>&version=<?php echo ($steps["version"]); ?>"><?php echo ($steps["school"]); echo ($steps["college"]); ?> <?php echo ($steps["teacher"]); ?> <?php echo ($steps["course_name"]); ?></a> </p> 
       </div> 
       <div class="class_content"> 
        <p style="font-family:verdana;font-size:50%;color:black" class="lasthw"> <?php echo ($steps["brief"]); ?> </p> 
        <div class="fans_num"> 
          
          <a href="javascript:;" style="font-family:verdana;font-size:30%;color:#19B68A" class = "like"> <?php echo ($steps["like_number"]); ?>赞</a> 
           <a>&nbsp</a>
          <a href="javascript:;" style="font-family:verdana;font-size:30%;color:#19B68A" class = "follow"> <?php echo ($steps["taken_number"]); ?>关注</a> 
         </div> 
       </div> 
      </div> 
      <div class="classpic"> 
       <a href="http://localhost/answer_me/home.php/CoursePage?cid=<?php echo ($steps["cid"]); ?>&version=<?php echo ($steps["version"]); ?>"><img src="/answer_me/AnswerMe/Common/Static/resource/<?php echo ($steps["picture"]); ?>" width="120" ;="" align="right" height="170" class= "bookimg" /></a> 
      </div> 
     </div> 
     </div><?php endforeach; endif; else: echo "" ;endif; ?>

      
    </div> 
    </div> 
    </div> 
    <!-- jQuery 的js --> 
    <script src="/answer_me/AnswerMe/Common/Static/js/jquery.min.js"></script> 
    <!-- 其他插件的js --> 
    <!-- // <script src="/bootstrap/js/bootstrap.min.js"></script>  -->
    <script src="/answer_me/AnswerMe/Common/Static/js/flat-ui.min.js"></script> 
    <script src="/answer_me/AnswerMe/Common/Static/js/prettify.js"></script> 
    <script src="/answer_me/AnswerMe/Common/Static/js/application.js"></script> 
    <script src="/answer_me/AnswerMe/Common/Static/js/home.js"></script> 
    <script src="/answer_me/AnswerMe/Common/Static/js/template.js"></script>
    <script src="/answer_me/AnswerMe/Common/Static/js/jquery.cookie.js"></script>
 </body>
</html>