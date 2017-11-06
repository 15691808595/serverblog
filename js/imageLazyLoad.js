/**
 * Created by Administrator on 2017/11/6.
 */
$(function () {
    let loading_gif='https://15691808595.github.io/blogimg/loader.gif';
    $(".detail-p img").each(function (i,ele) {
        $(ele).attr('data-lazyImg',$(ele).attr('src'));
    }).attr('src',loading_gif);
    let aImg = document.querySelectorAll('.detail-p img');
    let len = aImg.length;
    let n = 0;//存储图片加载到的位置，避免每次都从第一张图片开始遍历

    let seeHeight = document.documentElement.clientHeight;
    imgLazyLoading(0);

    $(window).scroll(function() {
        let scrollTop = document.body.scrollTop || document.documentElement.scrollTop;
        imgLazyLoading(scrollTop)
    });
    function imgLazyLoading(scrollTop) {
        for (let i = n; i < len; i++) {
            if (aImg[i].offsetTop < seeHeight + scrollTop) {
                if ($(aImg).eq(i).attr('src') === loading_gif) {
                    $(aImg).eq(i).attr('src',$(aImg).eq(i).attr('data-lazyImg'))
                }
                n = i + 1;
            }
        }
    }
});