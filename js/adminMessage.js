/**
 * Created by Administrator on 2017/7/30.
 */

$(function () {
    $.ajax({
        url:"./api/adminGetMsg.php",
        type:"get",
        success:function (data, xhr) {
            console.log(data)
            var arr=JSON.parse(data);
            var json=arr.list;
            var thead='';
            for(var key in json[0]){
                thead+=`
                <td class="text-center">${key}</td>
                `;
            }
            //添加标题
            $("#msg thead tr").append(thead);
            $.each(json,function (i,ele) {
                let tbody="";

                tbody+=`
                <tr >
                    <td>${ele.id}</td>
                    <td style="width: 100px">${ele.name}</a></td>
                    <td>${ele.email}</td>
                    <td >${ele.qq}</td>
                    <td>${ele.tel}</td>
                    <td>${ele.msg}</td>
                    <td style="width: 180px">${ele.createTime}</td>`;






                //添加内容
                $("#msg tbody").append(tbody);
            })
        }
    });
});

