/**
 * Created by Qing on 2017/6/7.
 */
$("#submit").click(function () {
    var username = $("[name='username']").val();
    var password = $("[name='password']").val();
    var isRemember = $("[name='isRemember']").is(":checked");
    var reg=/^[\u2E80-\u9FFF]+[\w]*$/;
    if(username.length == 0 || password.length == 0 || !reg.test(username)){
        $(".my-modal-body").html("用户名或密码不能为空,或者用户名非法！");
        $("#myModal").modal("show");
        setTimeout(function () {
            $("#myModal").modal("hide");
        },1200);
        return false;
    }
    $.ajax({
        type:"post",
        url:"./api/checkLogin.php",
        data:{username:username,password:password,isRemember:isRemember,submit:'submit'},
        success:function (data, status, xhr) {
            if(data == 1 || data == 0){
                //登录成功跳转到主页
                location.href = "index.php";
            }else{
                $(".my-modal-body").html("用户名或密码错误");
                $("#myModal").modal("show");
                setTimeout(function () {
                    $("#myModal").modal("hide");
                },1200);
            }
        },
        error:function (xhr, status) {
            $(".my-modal-body").html("网络繁忙！");
            $("#myModal").modal("show");
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
        }
    });
    return false;
});