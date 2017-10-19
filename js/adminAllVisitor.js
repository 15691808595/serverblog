/**
 * Created by Administrator on 2017/7/30.
 */

$(function () {
    $.ajax({
        url:"./api/adminGetAllVisitor.php",
        type:"get",
        success:function (data, xhr) {
            if(data!=="0"){
                var arr=JSON.parse(data);
                var json=arr.list;
                var html='';
                html+=`
                 <h4>总记录：<span>${json[0].all}</span></h4>
                    <h4>月记录：<span>${json[0].mounth}</span></h4>
                    <h4>昨日记录：<span>${json[0].yestoday}</span></h4>
                    <h4>今日记录：<span>${json[0].today}</span></h4>
                `;
                $(".visitor").html(html)
                console.log(json);
            }

        }
    });
});

