/**
 * Created by Qing on 2017/6/7.
 */
//ajax注册
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