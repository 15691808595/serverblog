/**
 * Created by Qing on 2017/6/7.
 */

//在线编辑器初始化
var editor = new wangEditor("editor");  //创建实例

// 自定义图片上传的接口
editor.config.uploadImgUrl = './api/upload.php';

//隐藏网络图片功能
//editor.config.hideLinkImg = true;

//图片上传的回调事件
var fns = editor.config.uploadImgFns;

//图片上传成功后的回调函数
fns.onload = function (resutText,xhr) {
    //@param resultText  String 后台返回的数据
    //@param xhr Object  ajax请求实体

    var result = JSON.parse(resutText);

    console.log(result);

    //将图片插入到编辑器
    var html = "<img src='"+result.url+"' />";

    editor.command(null, 'insertHtml', html);

    $(".my-modal-body").html(result.msg);
    $("#myModal").modal("show");

};

//图片上传超时
fns.ontimeout = function () {

};

//图片上传错误

fns.onerror = function () {

};
editor.create();   //调用create()发方法初始化
