//发帖标题输入长度处理
function keypress1() {
    var text1=document.getElementById("mytext1").value;
    var len=50-text1.length;
    var show="你还可以输入"+len+"个字";
    document.getElementById("name").innerText=show;
}
//发帖内容输入长度处理
function keypress2() {
    var text1=document.getElementById("myarea").value;
    var len;//记录剩余字符串的长度
    //textarea控件不能用maxlength属性，就通过这样显示输入字符数了
    if(text1.length>=10000) {
        document.getElementById("myarea").value=text1.substr(0,300);
        len=0;
    } else {
        len=10000-text1.length;
    }
    var show="你还可以输入"+len+"个字";
    document.getElementById("pinglun").innerText=show;
}