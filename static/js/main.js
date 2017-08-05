/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.1
 * Author: Xiaoan
 * File: /static/js/main.js
 */
setTimeout(down,10000);
function show(){
    $("div.message").slideDown();
}
function down(){
    $("div.message").slideUp();
}
function changing(){
    document.getElementById('checkpic').src="../common/checkcode.php?"+Math.random();
}
function mytopic(){
    $('#newid2').css('display','none');
    $('#newid').css('display','none');
    $('#adminid').css('display','');
}
function myreply(){
    $('#newid').css('display','');
    $('#adminid').css('display','none');
    $('#newid2').css('display','none');
}
function topicsetting(){
    $('#newid').css('display','none');
    $('#adminid').css('display','none');
    $('#newid2').css('display','');
}

var Obj=''
document.onmouseup=MUp
document.onmousemove=MMove

function MDown(Object){
    Obj=Object.id
    document.all(Obj).setCapture()
    pX=event.x-document.all(Obj).style.pixelLeft;
    pY=event.y-document.all(Obj).style.pixelTop;
}

function MMove(){
    if(Obj!=''){
        document.all(Obj).style.left=event.x-pX;
        document.all(Obj).style.top=event.y-pY;
    }
}

function MUp(){
    if(Obj!=''){
        document.all(Obj).releaseCapture();
        Obj='';
    }
}

function d_x(){
    mask.style.visibility='visible';
    massage_box.style.visibility='visible'
}
function d_y(){
    massage_box.style.visibility='hidden';
    mask.style.visibility='hidden'
}
function addpic(){
    var topic = document.getElementById("topic").value;
    var picurl = document.getElementById("picurl").value;
    parent.document.getElementById("topic").value = topic + "<img src = '" + picurl + "' />";
    parent.document.getElementById("picurl").value = "http://";
    d_x();
    d_y();
}