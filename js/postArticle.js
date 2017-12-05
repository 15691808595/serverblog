/**
 * Created by Qing on 2017/6/7.
 */
//阻止表单提交跳转页面
$("#submit").click(function () {
    //获取需要发布的文章信息（标题，url,内容）
    var title = $("[name='title']").val();
    var url = $("[name='url']").val();
    var type = $("[name='articleType']").val();
    var short= $("[name='short']").val();

    //获取在线编辑器的html内容
    var content = editor.$txt.html();
    //获取在线编辑器的纯文本
    var text = editor.$txt.text();
    query("./api/postArticle.php",{title:title,url:url,content:content,text:text,type:type,short:short},'post',true,function (data) {
        $(".my-modal-body").html(data);
        $("#myModal").modal("show");
        setTimeout(function () {
            $("#myModal").modal("hide");
        },1200);
    })

    return false;
});