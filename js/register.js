/**
 * Created by Qing on 2017/6/7.
 */
//ajax注册
$("#submit").click(function () {
    var username = $("[name='username']").val();
    var nickName = $("[name='nickName']").val();
    var pass = $("[name='pass']").val();
    var repass = $("[name='repass']").val();
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
    if(!emailReg.test(email)){
        $(".my-modal-body").html("输入邮箱不合法");
        $("#myModal").modal("show");
        setTimeout(function () {
            $("#myModal").modal("hide");
        },1200);
        return false;
    }

    var data = {username:username,nickName:nickName,pass:pass,email:email}
    $.ajax({
        type:'post',
        url:"./api/register.php",
        data:data,
        success:function (data,status,xhr) {
            if(data != 0){
                $(".my-modal-body").html("注册失败");
                $("#myModal").modal("show");
                setTimeout(function () {
                    $("#myModal").modal("hide");
                },1200);
            }else{
                $(".my-modal-body").html("注册成功");
                $("#myModal").modal("show");
                location.href= "login.php";
                setTimeout(function () {
                    $("#myModal").modal("hide");
                },1200);
            }
        },
        error:function (xhr,status) {
            $(".my-modal-body").html("网络繁忙！");
            $("#myModal").modal("show");
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
        },
        beforeSend:function () {
            console.log(data);
        }
    });

    return false;
});