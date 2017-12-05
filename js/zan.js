/**
 * Created by Administrator on 2017/6/7.
 */
//绑定点赞图标的点击事件
$(".zan").click(function () {
    var id = $(this).data("id");
    //发送点赞ajax请求
    query("./api/addZan.php",{id},'post',true,function (data) {
        if(data == 0 ){
            $(".my-modal-body").html("点赞成功");
            $('#myModal').modal('show');
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
            $(".zan").addClass("bounceIn");
            var num = parseInt($(".num-zan").html())+1;
            $(".num-zan").html(num);
        }else if(data == 1){
            $(".my-modal-body").html("点赞失败");
            $('#myModal').modal('show');
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
        }else{
            $(".my-modal-body").html("您已赞过该文章");
            $('#myModal').modal('show');
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
        }
    })
});