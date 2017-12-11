/**
 * Created by Qing on 2017/6/7.
 */
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
})