$(document).ready(function() {
	// init();

	$("#finish").click(function() {
        FinishEdit();
    });

    $("#")
});

// // 判断用户是否需要登录
// function init() {
// 	$.ajax({
//         type: "POST",
//         url: "http://localhost/answer_me/home.php/MainNavigation/JudgeSession",
//         data: {},
//         dataType: "json",
//         success: function(data) {
//             if (data.status == 0) {
//             	alert(data.msg);

            	
//             }
//         },
//         error: function() {
//             alert("ajax访问失败！");
//         }
//     });
// }

// 点击“完成编辑”按钮，上传数据
function FinishEdit() {
	var course_college = $.trim($("#course_college").val());
	var course_school = $.trim($("#course_school").val());
	var course_major = $.trim($("#course_major").val());
	var course_grade = $.trim($("#course_grade").val());
	var course_name = $.trim($("#course_name").val());
	var course_teacher = $.trim($("#course_teacher").val());
	var course_time = $.trim($("#course_time").val());
	var course_place = $.trim($("#course_place").val());

	if (course_college == "" || course_school == "" || course_major == "" || course_grade == "" || course_name == "" || course_teacher == "" || course_time == "" || course_place == "") {
		alert("您输入的信息不完整!");
	}
	else {
        // alert(course_college + course_school + course_major + course_grade + course_name + course_teacher + course_time + course_place);
		$.ajax({
            type: "POST",
            url: "http://localhost/answer_me/home.php/AddCoursePage/EditCourse",
            data: {course_college: course_college, 
            	course_school: course_school, 
            	course_major: course_major, 
            	course_grade: course_grade, 
            	course_name: course_name, 
            	course_teacher: course_teacher, 
            	course_time: course_time, 
            	course_place: course_place},
            dataType: "json",
            success: function(data) {
                if (data.status == 1) {
                    alert(data.msg);

                    //将页面重定向到新添加的课程页面
                    window.location.href = data.url;
                } else {
                    alert(data.msg);
                }
            },
            error: function() {
                alert("ajax访问失败！");
            }
        });
	}
}