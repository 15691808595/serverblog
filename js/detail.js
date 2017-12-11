/**
 * Created by Administrator on 2017/12/11.
 */
//绑定点赞图标的点击事件
$(".zan").click(function () {
    var id = $(this).data("id");
    //发送点赞ajax请求
    query("./api/addZan.php",{id},'post',true,function (data) {
        if(data == 0 ){
            $(".my-modal-body").html("点赞成功");
            $('#myModal').modal('show');
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
            $(".zan").addClass("bounceIn");
            var num = parseInt($(".num-zan").html())+1;
            $(".num-zan").html(num);
        }else if(data == 1){
            $(".my-modal-body").html("点赞失败");
            $('#myModal').modal('show');
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
        }else{
            $(".my-modal-body").html("您已赞过该文章");
            $('#myModal').modal('show');
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
        }
    })
});
// 图片懒加载
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
// 评论
$(function () {
    var a_ad_search=location.search;
    var a_id=a_ad_search.substring(a_ad_search.indexOf('=')+1);
    showComments();
    function getData(obj) {
        var d = {};
        var t = obj;
        $.each(t, function () {
            d[this.name] = this.value;
        });
        return d;
    }

    $("[name=user]").on("keyup",function () {
        var d = getData($('#comment-form').serializeArray());
        if(d.user.length>14){
            $(this).val($(this).val().substring(0,14))
        }
    });
    $("[name=website]").on("keyup",function () {
        var d = getData($('#comment-form').serializeArray());
        if(d.website.length>49){
            $(this).val($(this).val().substring(0,49))
        }
    });
    $("[name=email]").on("keyup",function () {
        var d = getData($('#comment-form').serializeArray());
        if(d.email.length>49){
            $(this).val($(this).val().substring(0,49))
        }
    });
    $("[name=txt]").on("keyup",function () {
        var d = getData($('#comment-form').serializeArray());
        if(d.txt.length>399){
            $(this).val($(this).val().substring(0,399))
        }
    });
    $("#comment-btn").click(function () {
        var d = getData($('#comment-form').serializeArray());

        if(d.user == '' || d.email == '' ||d.txt == ''){
            $("#comment-tips").addClass("error").text("必填内容不能为空");
            return false;
        }
        query("./api/saveComment.php",{
            user: d.user,
            email: d.email,
            website: d.website,
            msg:d.txt,
            a_id,
        },'post',false,function (data) {
            if(data==='1'){
                $("#comment-form")[0].reset();
            }
            if(data==='3'){
                $("#comment-tips").addClass("error").text("名称重复！");
            }
        })
        showComments();

        return false;
    });

    function showComments() {
        query("./api/showComment.php",{a_id},'post',false,function (data) {
            $("#showComment").html();
            var obj=JSON.parse(data);
            var html='';
            $.each(obj.list,function (i,ele) {
                html+=`
                     <li >
                            <div class="comment-body">
                                <div class="comment-author ">
                                    <span class="comment-author">${ele.user}</span><span class="says">说道：</span>
                                </div>

                                <div class="comment-meta ">
                                    <span>${ele.createTime}</span>
                                </div>

                                <p>${ele.msg}</p>

                            </div>
                        </li>
                    `;
            });

            $("#showComment").html(html);
        })
    }
});
// 复制代码
$(function () {
    var dom = $(".article-content").find('pre');
    var html = '<div  class="copyCode glyphicon glyphicon-edit">点击复制代码</div>';
    dom.each(function (i, ele) {
        $(ele).before(html);
    });
    $(".copyCode").on('click', function () {
        $(this).next().addClass('active').attr('contentEditable', 'true').focus()
    })
})