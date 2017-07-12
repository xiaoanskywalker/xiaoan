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
setTimeout(down,10000)