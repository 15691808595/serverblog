<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!--确保IE浏览器始终以最新的引擎渲染页面-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <!--确保页面在移动端下保持页面窗口大小设备视口大小，初始页面缩放比例1-->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <!--双核浏览器用谷歌木偶师打开-->
    <meta name="renderer" content="webkit" />
    <title>刘伟波发表文章可视化分析</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="shortcut icon" href="./img/favicon.ico">
    <!--引入html5shiv.js 和 respond.js 是IE8支持HTML5新标签和媒体查询-->
    <!--[if lt IE 9]>
    <script src="./js/html5shiv.js"></script>
    <script src="./js/respond.js"></script>
    <![endif]-->
    <!-- 引入 echarts.js -->
    <script src="js/echarts.min.js"></script>
    <script src="js/china.js"></script>
    <style>
        .my-h2{
            margin-top: 100px;
        }
        @media (max-width: 768px) {
            .my-h2{
                margin-top: 50px;
                padding-bottom: 10px;
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
<?php
//导航条-
include_once "./tpl/header.php";
?>
<h2 class="page-header text-center my-h2" >各类型文章发布数量分析图</h2>
<!-- 为ECharts准备一个具备大小（宽高）的Dom -->
<div class="container">
    <div class="row">
        <div id="main" class="col-sm-6" style="height:400px;"></div>
        <div id="main2" class="col-sm-6" style="height:400px;"></div>
    </div>
    <div class="row">
        <div id="main3" class="col-sm-6" style="height:400px;"></div>
        <div id="main4"  class="col-sm-6" style="height:400px; "></div>
    </div>
</div>
<?php
include_once  "./tpl/footer.php";
?>
<script src="js/jquery.js"></script>
<!--引入bootstrap.js类库文件-->
<script src="./bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
    var arrTypeNum=[];//["2", "4", "23", "2", "5", "4", "11"]
    var arrType=[];//(7) ["h5", "css", "js", "php", "mysql", "server", "others"]

    $.ajax({
        type:"get",
        async:false,
        url:"./api/echartsGetArticle.php",
        success:function (data,xhr) {
            var json=JSON.parse(data);
//            console.log(json)
            //遍历所有的key  和 value
            $.each(json,function (i,ele) {
                arrTypeNum.push(ele);
                arrType.push(i);
            });
        }
    });
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('main'));
    // 指定图表的配置项和数据
    var option = {
        title: {
            text: '各类型柱状图文章示例'
        },
        tooltip: {},
        legend: {
            data:['文章数']
        },
        xAxis: {
            data: arrType
        },
        yAxis: {},
        series: [{
            name: '文章数',
            type: 'bar',
            data: arrTypeNum
        }]
    };
    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);


    // 基于准备好的dom，初始化echarts实例
    var myChart2 = echarts.init(document.getElementById('main2'));
    // 指定图表的配置项和数据
    var option2 = {
        title : {
            text: '各类型饼图文章示例',
            subtext: '各类型文章数量',
            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient: 'vertical',
            left: 'left',
            data: arrType //["h5", "css", "js", "php", "mysql", "server", "others"]
        },
        series : [
            {
                name: '文章数量',
                type: 'pie',
                radius : '55%',
                center: ['50%', '60%'],
                data:[
                    {value:arrTypeNum[0], name:'h5'},
                    {value:arrTypeNum[1], name:'css'},
                    {value:arrTypeNum[2], name:'js'},
                    {value:arrTypeNum[3], name:'php'},
                    {value:arrTypeNum[4], name:'mysql'},
                    {value:arrTypeNum[5], name:'server'},
                    {value:arrTypeNum[6], name:'others'}
                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };
    // 使用刚指定的配置项和数据显示图表。
    myChart2.setOption(option2);



    var myChart3 = echarts.init(document.getElementById('main3'));//获取绘图位置对象
    function randomData() {
        return Math.round(Math.random()*1000);
    }
    //配置
    var option3 = {
        title: {
            x:"left",
            text: '省份浏览模拟数据分布图',
            textStyle:{
                fontSize:18
                ,fontWeight:'bold'
                ,color:'#000'
            }
            ,left:20
            ,top:10
        },
        tooltip: {
            trigger: 'item'
            ,formatter:'{b}<br>浏览量：{c}'
        },
        visualMap: {
            min: 0,
            max: 2500,
            left:20,
            bottom:10,
            text: ['高','低'],// 文本，默认为数值文本
            color:['#20a0ff','#D2EDFF'],
            calculable: false
        },
        series: [
            {
                type: 'map',
                mapType: 'china',
                roam: false,
                data:[
                    {name: '北京',value: randomData() },
                    {name: '天津',value: randomData() },
                    {name: '上海',value: randomData() },
                    {name: '重庆',value: randomData() },
                    {name: '河北',value: randomData() },
                    {name: '安徽',value: randomData() },
                    {name: '新疆',value: randomData() },
                    {name: '浙江',value: randomData() },
                    {name: '江西',value: randomData() },
                    {name: '山西',value: randomData() },
                    {name: '内蒙古',value: randomData() },
                    {name: '吉林',value: randomData() },
                    {name: '福建',value: randomData() },
                    {name: '广东',value: randomData() },
                    {name: '西藏',value: randomData() },
                    {name: '四川',value: randomData() },
                    {name: '宁夏',value: randomData() },
                    {name: '香港',value: randomData() },
                    {name: '澳门',value: randomData() }
                ]
            }
        ]
    };
    //为echarts对象加载数据
    myChart3.setOption(option3);





    // 基于准备好的dom，初始化echarts实例
    var myChart4 = echarts.init(document.getElementById('main4'));
    // 指定图表的配置项和数据
    var option4 = {
        title: {
            text: '漏斗图',
            subtext: '各类型文章数量漏斗图分析'
        },
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c}%"
        },
        toolbox: {
            feature: {
                dataView: {readOnly: false},
                restore: {},
                saveAsImage: {}
            }
        },
        legend: {
            data: arrType
        },
        series: [
            {
                name: '文章',
                type: 'funnel',
                left: '10%',
                width: '80%',
                label: {
                    normal: {
                        formatter: '{b}预期写文章数'
                    },
                    emphasis: {
                        position:'inside',
                        formatter: '{b}预期写文章数: {c}%'
                    }
                },
                labelLine: {
                    normal: {
                        show: false
                    }
                },
                itemStyle: {
                    normal: {
                        opacity: 0.7
                    }
                },
                data: [
                    {value: 2*arrTypeNum[0], name: arrType[0]},
                    {value: 2*arrTypeNum[1], name: arrType[1]},
                    {value: 2*arrTypeNum[2], name: arrType[2]},
                    {value: 2*arrTypeNum[3], name: arrType[3]},
                    {value: 2*arrTypeNum[4], name: arrType[4]},
                    {value: 2*arrTypeNum[5], name: arrType[5]},
                    {value: 2*arrTypeNum[6], name: arrType[6]}
                ]
            },
            {
                name: '实际',
                type: 'funnel',
                left: '10%',
                width: '80%',
                maxSize: '80%',
                label: {
                    normal: {
                        position: 'inside',
                        formatter: '{c}%',
                        textStyle: {
                            color: '#fff'
                        }
                    },
                    emphasis: {
                        position:'inside',
                        formatter: '{b}实际: {c}%'
                    }
                },
                itemStyle: {
                    normal: {
                        opacity: 0.5,
                        borderColor: '#fff',
                        borderWidth: 2
                    }
                },
                data: [
                    {value: arrTypeNum[0], name: '访问'},
                    {value: arrTypeNum[1], name: '咨询'},
                    {value: arrTypeNum[2], name: '订单'},
                    {value: arrTypeNum[3], name: '点击'},
                    {value: arrTypeNum[4], name: '展现'},
                    {value: arrTypeNum[5], name: '展现'},
                    {value: arrTypeNum[6], name: '展现'}
                ]
            }
        ]
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart4.setOption(option4);
</script>
</body>
</html>