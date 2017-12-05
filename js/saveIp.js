/**
 * Created by 73929 on 2017/11/6.
 */
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