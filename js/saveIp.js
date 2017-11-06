/**
 * Created by 73929 on 2017/11/6.
 */
$(function () {

    let ip=returnCitySN['cip'];

    $.ajax({
        type:'post',
        url:"./api/saveIp.php",
        data:{ip,address:returnCitySN['cname']},
        success:function (data,status,xhr) {
            console.log(data)
        }
    });
});