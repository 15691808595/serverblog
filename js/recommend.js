$(function () {
    getRecommend();
    $("#recommend").on("click",function () {
        getRecommend();
    })
});
// 获取随机五个数的数组
function getRanArr(obj) {
    var ranArr=[];
    for(var i=0;i<obj.length;i++){
        ranArr.push(i)
    }
    return ranArr.sort(function () {
        return 0.5-Math.random()
    }).slice(0,5)
}

function getRecommend() {
    query("./api/showRecommend.php",{},'get',true,function (data) {
        var obj=JSON.parse(data);
        var html='';
        var ranArr=getRanArr(obj);
        $.each(obj,function (i,ele) {
            if(ranArr.indexOf(i)>=0){
                html+=`<li class="list-group-item"><a href="detail.php?id=${ele.id}"  title="${ele.title}">${ele.title}</a> <span>${ele.visitor} Views</span></li>`;
            }
        });

        $("#recommend").append(html);
    })
}