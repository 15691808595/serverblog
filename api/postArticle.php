<?php
session_start();
include_once "dbConnect.php";

//判断用户是否登录
if(isset($_SESSION['username'])){
    //已登录
    //接收用户发送的文章内容（标题，原文url，文章内容）
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];
    $text = $_REQUEST['text'];
    $type=$_REQUEST['type'];
    $short=$_REQUEST['short'];
    if(strlen($text) == 0 || strlen($title) == 0){
        echo "文章标题或内容不能为空,{$text}";
        exit;
    }else
    if($type == "0" ){
        echo "文章类型没有选择";
        exit;
    }
	if($type=="others"){
$img = "node.png";
}else{
$img = $type.".png";
}
    
    $content = urlencode($_REQUEST['content']);  //content包含中文的时候

    $url = $_REQUEST['url'];



    $createTime = time();
    $weekarray=array("日","一","二","三","四","五","六");
    $week= "星期".$weekarray[date("w",strtotime(date("Y-m-d",time())))];

    $user = $_SESSION['username'];


    $sqlAllTitle="select `title` from article2";
    $resultAllTitle=mysql_query($sqlAllTitle);
    $arrAllTitle=[];
    while ($rowTitle=mysql_fetch_assoc($resultAllTitle)){
        $arrAllTitle[]=$rowTitle;
    }
    foreach ($arrAllTitle as $val){
        if($val['title']===$title){
            echo "文章标题重复了,请重新发表！";
            exit;
        }
    }


    //将文章内容添加到数据库里
    $sql = "insert into article2(title,url,content,createTime,user,`type`,img,short,week) values('$title','$url','$content',$createTime,'$user','$type','$img','$short','$week')";

    $result = mysql_query($sql);
    //如果文章发布成功,则相应用户的文章数量加1
    if($result){
        //判断原文url的长度，如果有，则是转载文章，如果没有，就是原创
        if(strlen($url) == 0){
            $sql = "update `user` set origin=origin+1 where username='$user'";
            mysql_query($sql);
        }else{
            $sql = "update `user` set zhuan=zhuan+1 where username='$user'";
            mysql_query($sql);
        }

        echo "文章发布成功";
    }else{
        echo "文章发布失败";
    }

   // echo $result ? '文章发布成功' : '';

}else{
    echo "您还未登录，登录后才可以发表文章";
}




//administrator
//2151099