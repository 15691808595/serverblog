/**
 * Created by Administrator on 2017/11/6.
 */
$(function () {
    let scroll_bool = true;
    getLazyArticleNum(12,2);
   $(window).scroll(function () {
       let trHeight = $("#article tbody tr").outerHeight();
       let scrollTop = $(window).scrollTop();
       let viewHeight = $(window).height();
       let everyNum = Math.ceil(viewHeight/trHeight); // 通过可视高度获得最大的加载条数

       let addNum=2 + Math.floor(scrollTop/viewHeight);
       if($("#article tfoot").offset().top-scrollTop<=viewHeight){
           if(scroll_bool){
               getLazyArticleNum(everyNum,addNum);
           }
           scroll_bool=false;
       }else {
           scroll_bool=true;
       }

   });
});
function getLazyArticleNum(everyNum,addNum) {
    $("#article thead tr").html("");
    $("#article tbody").html("");
    query("./api/adminGetArticle.php",{num:addNum,everyNum:everyNum},'get',false,function (data) {
        if(data!=0){
            var arr=JSON.parse(data);
            var json=arr.list;
            var thead='';
            for(var key in json[0]){
                thead+=`
                <td class="text-center">${key}</td>
                `;
            }
            thead+=`<td class="text-center">操作</td>
                    `;
            //添加标题
            $("#article thead tr").append(thead);
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
                    <td>${ele.img}</td>`;

                if(ele.recommend==1){
                    tbody+=`<td id="recommend_${ele.id}" class="recommend_yes">已推荐</td>`;
                }else{
                    tbody+=`<td class="del_color" id="recommend_${ele.id}" class="recommend_no">未推荐</td>`;
                }

                tbody+=`<td class="del_color" id="article_del_${ele.id}" >删除</td>
                </tr>
                `;


                //添加内容
                $("#article tbody").append(tbody);
            })
        }
    })
}
// 点击删除文章
$(function () {
    $(document).on("click","[id*=article_del_]",function () {
        var id=$(this).attr("id").substring($(this).attr("id").lastIndexOf("_")+1);
        query("./api/delArticle.php",{id:id,type:'delArticle'},'get',true,function (data) {
            $(".my-modal-body").html(data);
            $("#myModal").modal("show");
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
            $("thead tr").html("");
            $("tbody").html("");
            getLazyArticleNum(12,2);
        })
    })
});

// 点击是否推荐
$(function () {
    $(document).on("click","[id*=recommend_]",function () {
        var id=$(this).attr("id").substring($(this).attr("id").lastIndexOf("_")+1);
        var bool=0,_html=$(this).html();

        if(_html=="未推荐"){
            $(this).html("已推荐").removeClass("recommend_no").addClass("recommend_yes");
            bool=1;
        }else {
            $(this).html("未推荐").removeClass("recommend_yes").addClass("recommend_no");
            bool=0;
        }
        query("./api/recommend.php",{id,bool},'get',true,function (data) {
            if(data==="0"){
                $(".my-modal-body").html("只有博客的主人刘伟波才可以推荐哦,您点击是没有用的哦！");
                $("#myModal").modal("show");
                setTimeout(function () {
                    $("#myModal").modal("hide");
                },1200);
            }
        })
    })
});