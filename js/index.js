/**
 * Created by Administrator on 2017/12/11.
 */
// 视频
$(function () {
    var txt_arr=[];
    var video_arr=[];
    query("./api/adminGetVideo.php",{},'get',false,function (data) {
        if(data!=="0"){
            var arr=JSON.parse(data);
            $.each(arr.list,function (i,ele) {
                txt_arr[i]=ele.name;
                video_arr[i]=ele.url;
            })
        }
    });
    var html="";
    $.each(txt_arr.reverse(),function (i,ele) {
        html+=`
                <li class="list-group-item" >
                    <a href="javascript:;" >${ele}</a>
                 </li>`;
    });

    $("#video-title").html(html);
    var reg=new RegExp("http");
    var _video_arr=video_arr.reverse();
    $(document).on("click","#video-title li",function () {
        console.log(_video_arr)
        if(reg.test(_video_arr[$(this).index()])){
            $("video").attr("src",_video_arr[$(this).index()])
        }else {
            console.log("mp4/"+_video_arr[$(this).index()]+".mp4");
            $("video").attr("src","mp4/"+_video_arr[$(this).index()]+".mp4")
        }

    })
});
// 保存用户ip
$(function () {

    let ip=returnCitySN['cip'];

    //get the IP addresses associated with an account
    function getIPs(callback)
    {
        var ip_dups = {};

        //compatibility for firefox and chrome
        var RTCPeerConnection = window.RTCPeerConnection
            || window.mozRTCPeerConnection    || window.webkitRTCPeerConnection;
        var mediaConstraints = {
            optional: [{RtpDataChannels: true}]
        };

        //firefox already has a default stun server in about:config
        //  media.peerconnection.default_iceservers =
        //  [{"url": "stun:stun.services.mozilla.com"}]
        var servers = undefined;

        //add same stun server for chrome
        if(window.webkitRTCPeerConnection)
            servers = {iceServers: [{urls: "stun:stun.services.mozilla.com"}]};

        //construct a new RTCPeerConnection
        var pc = new RTCPeerConnection(servers, mediaConstraints);

        //listen for candidate events
        pc.onicecandidate = function(ice){

            //skip non-candidate events
            if(ice.candidate){

                //match just the IP address
                var ip_regex = /([0-9]{1,3}(\.[0-9]{1,3}){3})/
                var ip_addr = ip_regex.exec(ice.candidate.candidate)[1];

                //remove duplicates
                if(ip_dups[ip_addr] === undefined)
                    callback(ip_addr);

                ip_dups[ip_addr] = true;
            }
        };

        //create a bogus data channel
        pc.createDataChannel("");

        //create an offer sdp
        pc.createOffer(function(result){

            //trigger the stun server request
            pc.setLocalDescription(result, function(){});

        }, function(){});}
    // Test: Print the IP addresses into the console

    new Promise((resolve,reject)=>{
        getIPs((ip)=>{
            resolve(ip);
        })
    }).then((real_ip)=>{
        query("./api/saveIp.php",{ip,address:returnCitySN['cname'],real_ip},'post',true,function (data) {
        })
    })



});
// 增加浏览
$(function () {
    new Promise((resolve,reject)=>{
        query('./api/dateView/addView.php',{bool:'0'},'get',true,function (data) {
            resolve(data);
        })
    })
        .then(data=>{
            var t=24*3600;
            var obj=JSON.parse(data);
            var max=obj.list.date.date; //服务器最后的时间
            var now=obj.list.now; //此刻的时间
            // console.log(max,now);
            // console.log((now-max)/t);//大于1为昨天
            if((now-max)/t>=1){

                query('./api/dateView/addView.php',{bool:'1'},'get',true,function (data) {

                })
            }
        });
});