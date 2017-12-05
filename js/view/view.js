/**
 * Created by Administrator on 2017/11/17.
 */
$(function () {
    query('./api/dateView/view.php',{},'get',true,function (data) {
        var obj=JSON.parse(data);
        var html=`
                <div class="list-group-item">
                    <a href="javascript:;">&nbsp;访问总数：${obj.listAllView[0].all}</a>
                </div>
                <div class="list-group-item">
                    <a href="javascript:;">&nbsp;今日浏览：${obj.listToday[0].t_view}</a>
                </div>
                <div class="list-group-item">
                    <a href="javascript:;">&nbsp;昨日浏览：${obj.listToday[1].t_view}</a>
                </div>
                <div class="list-group-item">
                    <a href="javascript:;">&nbsp;文章总数：${obj.total}</a>
                </div>
                <div class="list-group-item">
                    <a href="javascript:;">&nbsp;评论总数：${obj.comment}</a>
                </div>
                <div class="list-group-item">
                    <a href="javascript:;">&nbsp;留言总数：${obj.userMsg}</a>
                </div>
                <div class="list-group-item">
                    <a href="javascript:;">&nbsp;会员总数：${obj.user}</a>
                </div>
            `;
        $("#allVisitorShow").html(html);
    })
});