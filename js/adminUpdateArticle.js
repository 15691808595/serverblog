/**
 * Created by Qing on 2017/6/7.
 */
//阻止表单提交跳转页面
$("#submit").click(function () {
    //获取需要发布的文章信息（标题，url,内容）
    var d = {};
    var t = $('form').serializeArray();
    $.each(t, function () {
        d[this.name] = this.value;
    });
    //获取在线编辑器的html内容
    var content = editor.$txt.html();
    //获取在线编辑器的纯文本
    var text = editor.$txt.text();
    $.ajax({
        type: "post",
        url: "./api/adminUpdatePostArticle.php",
        data: {
            id: d.id,
            createTime: d.createTime,
            title: d.title,
            url: d.url,
            img: d.img,
            user: d.user,
            visitor: d.visitor,
            like: d.like,
            content:content,
            type:d.articleType
        },
        success: function (data, status, xhr) {
            $(".my-modal-body").html(data);
            $("#myModal").modal("show");
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
        },
        error: function (xhr, stauts) {
            $(".my-modal-body").html("网络繁忙！");
            $("#myModal").modal("show");
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
        }
    });

    return false;
});