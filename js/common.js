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
});//鼠标移入抖动
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

function query(url,data,type,async,callback) {
    $.ajax({
        type:type,
        url:url,
        data:data,
        async:async,
        beforeSend: function(){
            var loading=`
            <div class="beforeLoading" >
    <img src="img/loader.gif" alt="">
</div>
           `;

            if(!$(".beforeLoading").length){

                $("body").append(loading)
            }
        },
        success:function (data, status, xhr) {
            callback(data)
        },
        error:function (xhr, status) {
            $(".my-modal-body").html("网络繁忙！");
            $("#myModal").modal("show");
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
        },
        complete: function(){
            $(".beforeLoading").hide()
        }
    });
}
