/**
 * Created by Administrator on 2017/7/30.
 */

$(function () {
    query("./api/adminGetVisitor.php",{},'get',true,function (data) {
        if(data!=="0"){
            var arr=JSON.parse(data);
            var json=arr.list;
            var thead='';
            for(var key in json[0]){
                thead+=`
                <td class="text-center">${key}</td>
                `;
            }
            //添加标题
            $("#visit thead tr").append(thead);
            $.each(json,function (i,ele) {
                let tbody="";

                tbody+=`
                <tr >
                    <td>${ele.id}</td>
                    <td style="width: 100px">${ele.address}</a></td>
                    <td>${ele.ip}</td>
                    <td>${ele.real_ip}</td>
                    <td style="width: 180px">${ele.createTime}</td>`;


                //添加内容
                $("#visit tbody").append(tbody);
            })
        }
    })
});

