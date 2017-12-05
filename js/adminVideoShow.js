/**
 * Created by Administrator on 2017/7/30.
 */

$(function () {
    getVideoShow();
    // 点击删除视频
    $(document).on("click","[id*=delVideo_]",function () {
        var id=$(this).attr("id").substring($(this).attr("id").indexOf("_")+1);
        query("./api/delVideo.php",{id:id,type:"del"},'get',true,function (data) {
            $(".my-modal-body").html(data);
            $("#myModal").modal("show");
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
            getVideoShow();
        })
    });
    // 点击修改视频
    $(document).on("click","[id*=delVideoTrue_]",function () {
        var id=$(this).attr("id").substring($(this).attr("id").indexOf("_")+1);
        var name=$("#updateName_"+id).val();
        var url=$("#updateUrl_"+id).val();
        query("./api/delVideo.php",{id:id,type:"update",name:name,url:url},'get',true,function (data) {
            $(".my-modal-body").html(data);
            $("#myModal").modal("show");
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
            getVideoShow();
        })
    })
});
function getVideoShow() {
    query("./api/adminGetVideo.php",{},'get',true,function (data) {
        if(data!=="0"){
            var arr=JSON.parse(data);
            var json=arr.list;
            var thead='';
            var tbody='';
            for(var key in json[0]){
                thead+=`
                <td class="text-center">${key}</td>
                `;
            }
            thead+=`
                    <td class="text-center">操作</td>
                    <td class="text-center">修改</td>
                    `;
            //添加标题
            $("#videoShow thead tr").html(thead);

            $.each(json,function (i,ele) {

                tbody+=`
                <tr >
                <td>${ele.id}</td>
                <td style="width: 500px"><input id="updateName_${ele.id}" class="form-control" type="text" value="${ele.name}" title="可修改视频链接和标题"></a></td>
                <td><input id="updateUrl_${ele.id}" class="form-control" type="text" value="${ele.url}" title="可修改视频链接和标题"></td>
                <td style="width: 180px">${ele.createTime}</td>
                <td id=delVideo_${ele.id} >删除</td>
                <td id=delVideoTrue_${ele.id} >确定</td>
                </tr>`;
            });

            //添加内容
            $("#videoShow tbody").html(tbody);
        }
    })
}
