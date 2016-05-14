$(document).ready(function(){
	// init();


	$("#confirm").click(function (){
		complete();
	});


});

// // 判断是否登陆
// function init() {
// 	$.ajax({
// 		type: "POST",
// 		url: "/answer_me/home.php/MainNavigation/JudgeSession",
// 		data: {},
// 		dataType: "json",
// 		success: function(data) {
//             if(data['status']==0){
//                 alert("请先登录！");
//             }
// 		},
//         error: function(data) {
//             alert("error");
//             console.log(data);
//         }
		
// 	});

// 	// $.ajax({
//  //        type: 'POST',
//  //        url: '/answer_me/home.php/EditPage/createNew',
//  //        data: {'cid':$('#cid').text()},
//  //        dataType: "json",
//  //        success: function(data) {
//  //            //console.log("Reply:");
//  //            //console.log(data);
//  //            if(data['status']==1){
//  //                //alert("提交成功");
//  //                location.href='/answer_me/home.php/EditPage/index/hid/'+data['hid']+'/version/'+data['version'];
//  //            }      
//  //            else
//  //                alert("提交失败 "+data['status']);
//  //        },
//  //        error: function(data) {
//  //            alert("error");
//  //            console.log(data);
//  //        }
//  //    });
// }

function complete() {
    if( $('#inputPassword2').val() != $('#inputRepeatpassword2').val()) {
        alert("您输入的密码不相符，请重新输入");
    } else {
		var username = $('#inputUsername2').val();
		var password = $('#inputPassword2').val();
		var email = $('#inputEmail2').val();
		var school = $('#selectSchool2').val();
		var college = $('#selectCollege2').val();
		var profession = $('#selectMajor2').val();
		var enteryear = $('#selectYear2').val();

		//alert(username + password + email + school + college + profession + enteryear);

		$.ajax({
	        type: "POST",
	        url: "http://localhost/answer_me/home.php/SettingPage/complete",
	        data: {username:username, 
	        	password:password,
	        	email:email,
	        	school:school,
	        	college:college,
	        	profession:profession,
	        	enteryear:enteryear
	        },
	        dataType: "json",
	        success: function(data) {
	            if (data.status == 1) {
	                alert(data.msg)
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