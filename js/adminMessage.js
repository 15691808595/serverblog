/**
 * Created by Administrator on 2017/7/30.
 */

$(function () {
    getAllMsg();
});

function getAllMsg() {
    query("./api/adminGetMsg.php",{},'get',true,function (data) {
        if(data!=="0"){
            var arr=JSON.parse(data);
            var json=arr.list;
            var thead='';
            for(var key in json[0]){
                thead+=`
                <td class="text-center">${key}</td>
                `;
            }
            thead+=`<td class="text-center">操作</td>`;
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
                    <td style="width: 180px">${ele.createTime}</td>
                    <td class="del_color" id=msg_del_${ele.id}>删除</td>`;

                //添加内容
                $("#msg tbody").append(tbody);
            })
        }
    })
}

// 点击删除文章
$(function () {
    $(document).on("click","[id*=msg_del_]",function () {
        var id=$(this).attr("id").substring($(this).attr("id").lastIndexOf("_")+1);
        query("./api/delArticle.php",{id:id,type:'msg'},'get',true,function (data) {
            $(".my-modal-body").html(data);
            $("#myModal").modal("show");
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
            $("thead tr").html("");
            $("tbody").html("");
            getAllMsg();
        })
    })
});
