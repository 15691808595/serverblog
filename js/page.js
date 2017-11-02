/**
 * Created by Qing on 2017/6/7.
 */
var num = 1;  //保存当前的页码，默认是1
var total = 0; //保存总的页数
var pageNum=0; //获取每一页的分页数

//默认加载第一页数据
getPage(num);
//获取分页数据
//@param num Number 页码
function getPage(num) {
    var type = $("#type").data("type");
    var wd = $("[name='wd']").val();
    $.ajax({
        type:"get",
        url:"./api/getArticle.php",
        data:{num:num,type:type,wd:wd},
        async:false,
        success:function (data, status, xhr) {
            var result = JSON.parse(data);
            //将结果集中的总页数赋值给total全局变量
            total = result.total;
            pageNum = result.pageNum;
            //添加之前现将文章列表容器里的内容清空
            $(".list-container").html("");
            //将文章列表数据遍历并添加到文章列表容器里
            $("#tpl").tmpl(result.list).prependTo(".list-container");
            $.each($(".post-item-container>h4>a"),function (index,ele) {
                if(wd==ele.innerHTML){
                    console.log(111);
                }
            })
        },
        error:function (xhr, status) {
            alert("fail");
        }
    });
}
//分页
$("#page").paging({
    pageNo:num,
    totalPage: total,
    totalSize: total*pageNum,
    callback: function(_num) {
        // alert(num)
        num=_num;
        getPage(num);
        moveTop();
    }
});
//绑定下一页点击事件
$(document).on("click","#nextPage",function () {
    //判断当前页是否为最后一页
    if(num == total){
        $(".my-modal-body").html("当前已是最后一页");
        $("#myModal").modal("show");
        setTimeout(function () {
            $("#myModal").modal("hide");
        },1200);
        return false;
    }
    //获取下一页数据
    getPage(++num);
    //更新页码
    $(".current-page").html(num);
    moveTop();
});
//绑定上一页点击事件
$(document).on("click","#prePage",function () {
    if(num == 1){
        //修改模态框的提示内容
        $(".my-modal-body").html("当前已是第一页");
        //打开模态框
        $("#myModal").modal("show");
        setTimeout(function () {
            $("#myModal").modal("hide");
        },1200);
        return false;
    }
    //获取上一页数据
    getPage(--num);
    //更新页码
    $('.current-page').html(num);
    moveTop();
});


//首页点击事件
$(document).on("click","#firstPage",function () {
    getPage(1);
    $('.current-page').html(1);
    moveTop();
});

//尾页点击事件
$(document).on("click","#lastPage",function () {
    getPage(total);
    $('.current-page').html(total);
    moveTop();
});

//将body滚动条移缓慢移动顶端
function moveTop() {
    $("html,body").animate({
        scrollTop:0
    },500)
}

