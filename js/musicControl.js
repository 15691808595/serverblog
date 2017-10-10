/**
 * Created by Administrator on 2017/7/30.
 */
$(function () {
    var audio=$("#musicbox")[0];
    var maxWidth=$(window).width();
    if(maxWidth<768){
        audio.autoplay=false;
        return;
    }
    var musicControl=$("#musicControl")[0];
    $("#musicControl").on("click",function () {
        if(!audio.paused){
            audio.pause();
            musicControl.setAttribute("title","点击开启音乐")
        }else {
            audio.play();
            musicControl.setAttribute("title","点击关闭音乐")
        }
    });
});