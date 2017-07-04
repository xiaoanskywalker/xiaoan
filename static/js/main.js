function show(){
    $("div.message").slideDown();
}
function down(){
    $("div.message").slideUp();
}
function changing(){
    document.getElementById('checkpic').src="../common/checkcode.php?"+Math.random();
}
setTimeout(down,10000)