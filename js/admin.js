/**
 * Created by Administrator on 2017/7/30.
 */

$(function () {
    getAlltitle();
});
function getAlltitle() {
    $.ajax({
        url:"./api/adminGetArticle.php",
        type:"get",
        async:false,
        success:function (data, xhr) {
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
            $("thead tr").append(thead);
            $.each(json,function (i,ele) {
                let tbody="";
                tbody+=`
                <tr >
                    <td>${ele.id}</td>
                    <td><a href="adminDetails.php?id=${ele.id}">${ele.title}</a></td>
                    <td>${ele.user}</td>
                    <td style="width: 180px">${ele.createTime}</td>
                    <td>${ele.like}</td>
                    <td>${ele.visitor}</td>
                    <td>${ele.img}</td>
                    <td id="del_${ele.id}" style="width: 60px;color: #337ab7;cursor: pointer;">删除</td>
                </tr>
                `;
                //添加内容
                $("tbody").append(tbody);
            })
        }
    });
}
$(function () {
    $("tbody tr td").on("click",function () {
        var id=$(this).attr("id").substring(4);
        $.ajax({
            url:"./api/delArticle.php",
            type:"get",
            data:{id:id},
            success:function (data) {

                $(".my-modal-body").html(data);
                $("#myModal").modal("show");
                setTimeout(function () {
                    $("#myModal").modal("hide");
                },1200);
                $("thead tr").html("");
                $("tbody").html("");
                getAlltitle();
            }
        })
    })
})