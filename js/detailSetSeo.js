/**
 * Created by Administrator on 2017/8/23.
 */
$(function () {
    var title=$(".page-header").html();
    var des="&raquo; 刘伟波-天天向上";
    $("title").html(title+des);
    $("[name=Keywords]").attr("content",title);
    $("[name=Description]").attr("content",title);
    $("[http-equiv=description]").attr("content",title);
});