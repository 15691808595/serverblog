/**
 * Created by Administrator on 2017/6/7.
 */
$(function () {
    var timer = null;
    $(".search").click(function () {
        var wd = $("[name='wd']").val();
        if(wd.length == 0){
            $(".my-modal-body").html("请输入搜索内容");
            $("#myModal").modal("show");
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
            return false;
        }
        $("#type").data("type","content");
        getPage(1)
    });

    $("[name='wd']").on('input',function () {
        $("#type").data("type","title");
        if(timer){
            clearTimeout(timer);
        }
        timer = setTimeout(function () {
            getPage(1);
        },500)
    }).on('click',function () {
        if (document.form1.wd.focus){
            document.form1.wd.select();
        }
    });

});