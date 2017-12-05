$(function () {
    getFIghtAndInterseting();
    $(".fight-and-interesting").on("click",function () {
        getFIghtAndInterseting();
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

function getFIghtAndInterseting() {
    query("./api/showFightAndInteresting.php",{},'get',true,function (data) {
        var obj=JSON.parse(data);
        var fight='';
        var interesting='';
        var ranArrFight=getRanArr(obj.fight);
        var ranArrInteresting=getRanArr(obj.interesting);
        console.log(obj);
        $.each(obj.fight,function (i,ele) {
            if(ranArrFight.indexOf(i)>=0){
                fight+=`<li class="list-group-item"><a href="detail.php?id=${ele.id}"  title="${ele.title}">${ele.title}</a> <span>(${ele.visitor}Views)</span></li>`;
            }
        });
        $.each(obj.interesting,function (i,ele) {
            if(ranArrInteresting.indexOf(i)>=0){
                interesting+=`<li class="list-group-item"><a href="detail.php?id=${ele.id}"  title="${ele.title}">${ele.title}</a> <span>(${ele.visitor}Views)</span></li>`;
            }
        });
        $("#fight").html("").append(fight);
        $("#interesting").html("").append(interesting);
    })
}