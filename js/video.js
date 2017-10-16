/**
 * Created by Administrator on 2017/10/13 0013.
 */
$(function () {
   var txt_arr=["我的大一420宿舍生活实录","小米视频测试","马云吹过的牛，如今都变成了现实"];
   var video_arr=["420style","mi","http://v1-tt.ixigua.com/4f26d11814baa663a817caf040168feb/59e08cd2/video/m/2206395cc5a30ba4e9db909ca7fde57517b115126f00000448cba01bc71/"];
   var html="";
   $.each(txt_arr,function (i,ele) {
       html+=`
                <li class="list-group-item" >
                    <a href="javascript:;" >${ele}</a>
                 </li>`;
   });

   $("#video-title").html(html);
   var reg=new RegExp("http://","g");
   console.log(reg.test(video_arr[2]));
   $(document).on("click","#video-title li",function () {
       if(reg.test(video_arr[$(this).index()])){
           $("video").attr("src",video_arr[$(this).index()])
       }else {
           $("video").attr("src","mp4/"+video_arr[$(this).index()]+".mp4")
       }

       setInterval(function () {
           // console.log($("video")[0].duration);
       },1000)

   })
});