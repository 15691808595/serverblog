/**
 * Created by Administrator on 2017/12/11.
 */
// 获取分页

$(function () {

    function getPage(num) {
        var type = $("#type").data("type");
        var wd = $("[name='wd']").val();
        query("./api/getArticle.php",{num:num,type:type,wd:wd},'get',false,function (data) {
            var result = JSON.parse(data);
            //将结果集中的总页数赋值给total全局变量
            total = result.allArticle;
            pageNum = result.pageNum;
            //添加之前现将文章列表容器里的内容清空
            $(".list-container").html("");
            //将文章列表数据遍历并添加到文章列表容器里
            $("#tpl").tmpl(result.list).prependTo(".list-container");
            $.each($(".post-item-container>h4>a"),function (index,ele) {
                if(wd==ele.innerHTML){

                }
            })
        })
    }
    var num = 1;  //保存当前的页码，默认是1
    var total = 0; //保存总的文章
    var pageNum=0; //获取每一页的分页数

//默认加载第一页数据
    getPage(num);
//获取分页数据
//@param num Number 页码
//分页
    $("#page").paging({
        pageNo:num,
        totalPage: pageNum,
        totalSize: total,
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


    // 搜索

    var timer = null;
    $(".search").click(function () {
        var wd = $("[name='wd']").val();
        if(wd.length == 0){
            $(".my-modal-body").html("请输入搜索内容");
            $("#myModal").modal("show");
            setTimeout(function () {
                $("#myModal").modal("hide");
            },1200);
            return false;
        }
        $("#type").data("type","content");
        getPage(1)
    });

    $("[name='wd']").on('input',function () {
        $("#type").data("type","title");
        if(timer){
            clearTimeout(timer);
        }
        timer = setTimeout(function () {
            getPage(1);
        },500)
    }).on('click',function () {
        if (document.form1.wd.focus){
            document.form1.wd.select();
        }
    });
});