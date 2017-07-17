/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /static/js/main.js
 */
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
setTimeout(down,10000);