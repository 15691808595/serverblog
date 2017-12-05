/**
 * Created by Administrator on 2017/11/7.
 */

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