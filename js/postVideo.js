/**
 * Created by Qing on 2017/6/7.
 */
//阻止表单提交跳转页面
$("#submit").click(function () {
    //获取需要发布的文章信息（标题，url,内容）
    var title = $("[name='videoTitle']").val();
    var url = $("[name='videoUrl']").val();

    if(title!=="" && url!==""){
        $.ajax({
            type:"post",
            url:"./api/postVideo.php",
            data:{title:title,url:url},
            success:function (data, status, xhr) {
                $(".my-modal-body").html(data);
                $("#myModal").modal("show");
                setTimeout(function () {
                    $("#myModal").modal("hide");
                },1200);
                getVideoShow();
            }
        });
    }


    return false;
});