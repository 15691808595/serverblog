/**
 * Created by Qing on 2017/6/7.
 */

// 验证码
$(function () {
    //HTML5里只要是在表单里的按钮，点击都会触发表达提交事件
    $("#captcha").click(function () {
        //点击实现验证码刷新（本质上是改变验证码图片的src属性）
        $("#captcha").attr('src','./api/captcha.php?random='+new Date().getTime());
        //通过更改随机传参的方式，改变验证码的src属性，从而达到属性验证码图片的目的

        //阻止表单提交
        return false;
    });
//方法：用ajax验证
    $("#inputCaptcha").on("input",function () {
        var value = $(this).val();
        //发送ajax验证请求
        $.ajax({
            type:"post",
            url:"./api/checkCaptch.php",
            data:{captcha:value},
            success:function (data, status, xhr) {
                //根据后台返回的数据判断用户输入的验证码是否正确
                if(data == 0){  //正确
                    //将正确的提示信息显示，隐藏错误的提示信息
                    $("#submit").removeAttr("disabled");
                    $(".right").show();
                    $(".error").hide();
                }else{ //错误
                    $("#submit").attr("disabled","disabled");
                    $(".right").hide();
                    $(".error").show();
                }
            },
            error:function (xhr,status) {
                alert("请求失败");
            }
        });
    });
});

//ajax注册
$(function () {
    $("#submit").click(function () {
        var username = $("[name='username']").val();
        var pass = $("[name='pass']").val();
        var repass = $("[name='repass']").val();
        var Captcha = $("#inputCaptcha").val();
        if(pass !== repass ){
            $(".my-modal-body").html("输入密码不一致");
            $("#myModal").modal("show");
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
            return false;
        }
        var email = $("[name='email']").val();

        //验证邮箱是合法
        var emailReg = /^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/;
        if(username==='' || pass === '' || repass ==='' || Captcha===''){
            $(".my-modal-body").html("必填项不能为空！");
            $("#myModal").modal("show");
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
            return false;
            if(!emailReg.test(email)){
                $(".my-modal-body").html("输入邮箱不合法");
                $("#myModal").modal("show");
                setTimeout(function () {
                    $("#myModal").modal("hide");
                },1200);
                return false;
            }
        }

        var data = {username:username,pass:pass,email:email};
        query("./api/register.php",data,'post',true,function (data) {
            if(data === "1"){
                $(".my-modal-body").html("注册失败");
                $("#myModal").modal("show");
                setTimeout(function () {
                    $("#myModal").modal("hide");
                },1200);
            }else if(data==="0"){
                $(".my-modal-body").html("注册成功");
                $("#myModal").modal("show");
                // location.href= "login.php";
                setTimeout(function () {
                    $("#myModal").modal("hide");
                },1200);
            }else {
                $(".my-modal-body").html(data);
                $("#myModal").modal("show");
                setTimeout(function () {
                    $("#myModal").modal("hide");
                },1200);
            }
        })

        return false;
    });
});