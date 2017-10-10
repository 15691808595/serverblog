<?php
//处理图片上传逻辑
//预定义一个返回信息数组
$res = array(
    "error"=>0,  //错误代码，0代表没有错误
    "msg"=>"",   //提示信息
    "url"=>""    //图片保存在服务器端的地址
);

foreach ($_FILES as $key=>$value){
    //首先，判断格式是否符合要求(jpg,gif,png)
    if($value["type"] == "image/jpeg" || $value["type"] == "image/png" || $value["type"] == "image/gif"){
        //接下来，判断文件的大小
        if($value['size']<=3*1024*1024){  //图片最大上传3M
            $path = "../uploads";
            if(!file_exists($path)){  //判断保存图片的文件夹是否存在
                mkdir($path);  //不存在则创建
            }
            $fileName = time().rand(0,100000).$value['name'];
            //接下里转移文件,将文件从临时路径转移到指定的路径下
            $result = move_uploaded_file($value['tmp_name'],$path.'/'.$fileName);
            if($result){
                $res['msg'] = "图片上传成功";
                $res['url'] = "http://47.94.132.72:8082/blog/uploads/".$fileName;
                echo json_encode($res);
            }
        }else{
            $res['error'] = 1;  //1 代表上传出错
            $res['msg'] = "上传图片过大,最大3M";
            echo json_encode($res);
        }
    }else{
        $res['error'] = 1;  //1 代表上传出错
        $res['msg'] = "上传图片类型不符合要求";
        echo json_encode($res);
    }
}


