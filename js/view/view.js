/**
 * Created by Administrator on 2017/11/17.
 */
$(function () {
    $.ajax({
        type:'get',
        url:'./api/dateView/view.php',
        success:function (data) {
            var obj=JSON.parse(data);
            console.log(obj);
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
        }
    });
});