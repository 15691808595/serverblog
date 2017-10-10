/**
 * Created by Administrator on 2017/6/7.
 */

//鼠标移入抖动
$(".article-type").mouseover(function () {
    //alert(111);
    $(this).addClass("slideInRight").siblings().removeClass("slideInRight");
});

//导航logo转动
$(".my-brand").mouseover(function () {
    $(this).addClass("rotateIn")
}).mouseout(function () {
    $(this).removeClass("rotateIn");
});
//个人广告
setTimeout(function () {
    $(".advertisement").slideUp();
},3500);