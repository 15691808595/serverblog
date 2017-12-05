/**
 * Created by Administrator on 2017/10/13 0013.
 */
$(function () {
    var txt_arr=[];
    var video_arr=[];
    query("./api/adminGetVideo.php",{},'get',false,function (data) {
        if(data!=="0"){
            var arr=JSON.parse(data);
            $.each(arr.list,function (i,ele) {
                txt_arr[i]=ele.name;
                video_arr[i]=ele.url;
            })
        }
    });
   var html="";
   $.each(txt_arr.reverse(),function (i,ele) {
       html+=`
                <li class="list-group-item" >
                    <a href="javascript:;" >${ele}</a>
                 </li>`;
   });

   $("#video-title").html(html);
   var reg=new RegExp("http");
    var _video_arr=video_arr.reverse();
   $(document).on("click","#video-title li",function () {
       console.log(_video_arr)
       if(reg.test(_video_arr[$(this).index()])){
           $("video").attr("src",_video_arr[$(this).index()])
       }else {
           console.log("mp4/"+_video_arr[$(this).index()]+".mp4");
           $("video").attr("src","mp4/"+_video_arr[$(this).index()]+".mp4")
       }

   })
});