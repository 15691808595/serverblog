/**
 * Created by Administrator on 2017/6/7.
 */

// $(".meta-ctrl-pc").attr("content","")

$('.tab-pc button').click(function () {
    var index=$(this).index();
    if(index==0){
        $(".meta-ctrl-pc").attr("content","")
    }else {
        $(".meta-ctrl-pc").attr("content","width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no")
    }
});
//鼠标移入抖动
$(".article-type").mouseover(function () {
    //alert(111);
    $(this).addClass("slideInRight").siblings().removeClass("slideInRight");
});

//导航logo转动
$(".logoname").mouseover(function () {
    $(this).addClass("rotateIn")
}).mouseout(function () {
    $(this).removeClass("rotateIn");
});
