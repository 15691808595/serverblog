/**
 * Created by Administrator on 2017/10/13 0013.
 */
$(function () {
    var txt_arr=[];
    var video_arr=[];
    $.ajax({
        url:"./api/adminGetVideo.php",
        type:"get",
        async:false,
        success:function (data, xhr) {
            if(data!=="0"){
                var arr=JSON.parse(data);
                $.each(arr.list,function (i,ele) {
                    txt_arr[i]=ele.name;
                    video_arr[i]=ele.url;
                })
            }
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
   $(document).on("click","#video-title li",function () {
       video_arr=video_arr.reverse();
       if(reg.test(video_arr[$(this).index()])){
           $("video").attr("src",video_arr[$(this).index()])
       }else {
           console.log("mp4/"+video_arr[$(this).index()]+".mp4");
           $("video").attr("src","mp4/"+video_arr[$(this).index()]+".mp4")
       }

   })
});