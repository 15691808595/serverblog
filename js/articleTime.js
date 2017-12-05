/**
 * Created by Administrator on 2017/11/8.
 */
$(function () {

    query("./api/articleTime.php",{},'get',true,function (data) {
        var obj = JSON.parse(data);
        var timeArr=[];
        $.each(obj.list,function (i,ele) {
            // timeArr[i]=ele.createTime;
            timeArr[i]=getYearAndMounth(ele.createTime);
        });

        // console.log(cancelRepeat(timeArr));
        var html='';
        $.each(cancelRepeat(timeArr),function (i,ele) {
            html+=`
                <li><a href="javascript:;"><span class="time-e">${i}</span> <span>(${PrefixInteger(ele,2)})</span></a></li>
                `;
        });
        $("#timeArticle").html(html);
    })

    $(document).on('click','#timeArticle li',function () {
        $("#life-list").html("");

        var _y=$(this).find('.time-e').text();
        var y=_y.replace(/年|月/g,'');
        var yyyy=y.substring(0,4);
        var mm=Number(y.substring(4));

        var t1=new Date(yyyy+'-'+mm+'-01 00:00:00').getTime()/1000;

        mm===12 && (yyyy+=1,mm=0);
        var t2=new Date(yyyy+'-'+(mm+1)+'-01 00:00:00').getTime()/1000;
        

        query("./api/getTimeArticle.php",{t1,t2},'get',true,function (data) {

            var html=`<h3 class="text-center page-header">${_y} 存档</h3>`;
            $.each(JSON.parse(data).list,function (i,ele) {
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
        })
    });
    // 补0
    function PrefixInteger(num, n) {
        return (Array(n).join(0) + num).slice(-n);
    }


    //数组去重并且记住每个重复的个数
    function cancelRepeat(arr) {
        let newArr=[];
        let obj={};
        for(let i in arr){
            if(!obj[arr[i]]){
                obj[arr[i]]=1;
                newArr.push(arr[i]);
            }else {
                obj[arr[i]]++;
            }
        }
        return obj;
    }

    function getYearAndMounth(time) {
        var tt=new Date(Number(time)*1000);
        return tt.getFullYear()+'年'+PrefixInteger(Number(tt.getMonth())+1,2)+'月';
    }
});