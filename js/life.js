$.ajax({
    type:"get",
    url:"./api/getLife.php",
    data:{},
    success:function (data, status, xhr) {
        var result = JSON.parse(data);
        var html='';
        $.each(result.list,function (i,ele) {
            html+=`
                    <div class="life-box">
                        <h2 class="title"><a href="detail.php?id=${ele.id}">${ele.title}</a></h2>
                        <div class="time">${ele.createTime} by ${ele.user} 阅读 ${ele.visitor} 次, 点赞 ${ele.like} 次</div>
                        <div class="short">${ele.short}</div>
                        <div class="read-all"><a href="detail.php?id=${ele.id}">阅读全文...</a></div>
                        <div class="release">发布在: <span>${ele.type}</span></div>
                    </div>
            `;
        });
        $("#life-list").html(html);
    },
    error:function (xhr, status) {
        alert("fail");
    }
});