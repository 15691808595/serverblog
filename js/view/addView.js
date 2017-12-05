/**
 * Created by Administrator on 2017/11/17.
 */
$(function () {
    new Promise((resolve,reject)=>{
        query('./api/dateView/addView.php',{bool:'0'},'get',true,function (data) {
            resolve(data);
        })
    })
        .then(data=>{
            var t=24*3600;
            var obj=JSON.parse(data);
            var max=obj.list.date.date; //服务器最后的时间
            var now=obj.list.now; //此刻的时间
            // console.log(max,now);
            // console.log((now-max)/t);//大于1为昨天
            if((now-max)/t>=1){

                query('./api/dateView/addView.php',{bool:'1'},'get',true,function (data) {

                })
            }
    });
});