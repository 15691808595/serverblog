/**
 * Created by Administrator on 2017/7/30.
 */

$(function () {
    getAllComment();
});

function getAllComment() {
    query("./api/showComment.php",{a_id:'all'},'get',true,function (data) {
        // if(data!=="0"){
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
        $("#showComment thead tr").append(thead);
        $.each(json,function (i,ele) {
            let tbody="";

            tbody+=`
                <tr >
                    <td>${ele.id}</td>
                    <td><a href="detail.php?id=${ele.a_id}">${ele.a_id}</a></td>
                    <td>${ele.user}</td>
                    <td >${ele.email}</td>
                    <td>${ele.website}</td>
                    <td>${ele.msg}</td>
                    <td >${ele.createTime}</td>
                    <td class="del_color" id=comment_del_${ele.id}>删除</td>`;

            //添加内容
            $("#showComment tbody").append(tbody);
        })
        // }
    })
}
//
// // 点击删除评论
$(function () {
    $(document).on("click","[id*=comment_del_]",function () {
        var id=$(this).attr("id").substring($(this).attr("id").lastIndexOf("_")+1);
        query("./api/showComment.php",{id:id,a_id:'del_comment'},'get',true,function (data) {

            $(".my-modal-body").html(data);
            $("#myModal").modal("show");
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
            $("thead tr").html("");
            $("tbody").html("");
            getAllComment();
        })
    })
});
