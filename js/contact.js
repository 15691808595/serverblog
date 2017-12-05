/**
 * Created by Administrator on 2017/10/11 0011.
 */
//获取表单数据
function getData(obj) {
    var d = {};
    var t = obj;
    $.each(t, function () {
        d[this.name] = this.value;
    });
    return d;
}
var _bool=true;
//表单验证
function regValid(reg,name,txt) {
    var d = getData($('form').serializeArray());
    if(!reg.test(d[name])){
        $("#tips").addClass("error").text(txt);
        return false;
    }else {
        $("#tips").removeClass("error").text("*请填写剩余信息...");
        return true;
    }
}
var _a=false;
var _b=false;
function nextValid() {
    var maxNum=400;//发送消息不能超过400字符
    $("[name=username]").on("keyup",function () {
        _a=regValid(/^[\u4e00-\u9fa5\w-]{2,10}$/,"username","*姓名只能包含中文、数字、字母和\"_\"、\"-\"");

    });
    $("[name=qq]").on("keyup",function () {
        _b=regValid(/^[1-9][0-9]{4,10}$/,"qq","*qq规则不符合要求");
    });
    $("[name=email]").on("keyup",function () {
        regValid(/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/,"email","*邮箱规则不符合要求");
    });
    $("[name=phone]").on("keyup",function () {
        regValid(/^1[34578]\d{9}$/,"phone","*手机规则不符合要求");
    });
    $("[name=message]").on("keyup",function () {
        var d = getData($('form').serializeArray());
        if(d.message.length>maxNum-1){
            $(this).val($(this).val().substring(0,maxNum-1))
        }
    });
    return _a&&_b;
}
$(function () {
    nextValid();
    //阻止表单提交跳转页面
    $("#btn").click(function () {
        var d = getData($('form').serializeArray());
        //获取需要发布的文章信息（标题，url,内容）
        if(d.username == '' || d.qq == '' ||d.message == ''){
            $("#tips").addClass("error").text("*姓名，qq和消息不能为空");
            return false;
        }
        if(nextValid()){
            query("./api/contact.php",{
                username: d.username,
                email: d.email,
                qq: d.qq,
                phone:d.phone,
                message:d.message,
            },'post',true,function (data) {
                $(".my-modal-body").html(data);
                $("#myModal").modal("show");
                setTimeout(function () {
                    $("#myModal").modal("hide");
                },1200);
            })

        }

        return false;
    });
})