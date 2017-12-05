/**
 * Created by Qing on 2017/6/7.
 */
$("#submit").click(function () {
    var username = $("[name='username']").val();
    var password = $("[name='password']").val();
    var isRemember = $("[name='isRemember']").is(":checked");
    if(username.length == 0 || password.length == 0){
        $(".my-modal-body").html("用户名或密码不能为空！");
        $("#myModal").modal("show");
        setTimeout(function () {
            $("#myModal").modal("hide");
        },1200);
        return false;
    }
    var referrer=document.referrer;
    query("./api/checkLogin.php",{username:username,password:password,isRemember:isRemember,submit:'submit'},'post',true,function (data) {
        if(data == 1 || data == 0){
            //登录成功跳转之前浏览的页面
            if(referrer.substring(referrer.lastIndexOf('/')+1)==='register.php'){
                location.href = 'index.php';
            }else {
                location.href = referrer;
            }
        }else{
            $(".my-modal-body").html("用户名或密码错误");
            $("#myModal").modal("show");
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
        }
    })
    return false;
});