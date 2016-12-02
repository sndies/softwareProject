/**
 * Created by 123 on 2016/11/30.
 */
var xmlHttp;


//这个函数可以直接拷过去用
function S_xmlhttprequest()
{
    if(window.ActiveXObject)
    {
        xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    else if(window.XMLHttpRequest)
    {
        xmlHttp = new XMLHttpRequest();
    }
}
//去空格
function trimStr(str){return str.replace(/(^\s*)|(\s*$)/g,"");}

//检查两次密码
function checkSame(){
    var msg = "";
    if(document.getElementById("password").value != document.getElementById("ensure").value)
        msg = "<font color='red'>两次密码不一致！</font>";
    document.getElementById("ensureSpan").innerHTML = msg;
}
function checkPasswd(){
    var userPasswdObj = document.getElementById("password");
    var span = document.getElementById("passwdSpan");
    var userPasswdValue = trimStr(userPasswdObj.value);
    var msg = "";
    if(userPasswdValue == null || userPasswdValue == "")
        msg = "<font color='red'>密码不能为空！</font>";
    span.innerHTML = msg;
}
function checkUserid(){
    var useridObj;
    var span;
    useridObj = document.getElementById("username");
    span = document.getElementById("useridSpan");
    var useridValue = trimStr(useridObj.value);
    var msg ="";
    if(useridValue == null || useridValue == "")
            msg ="<font color='red'>账号不能为空！</font>";
    else
    {
        S_xmlhttprequest();
        //这里是异步运行了，当js执行到这一句话后不会等待他的返回值，而是直接往下进行，我测试出来的效果是当你js代码执行完了这里的值才返回来。
        xmlHttp.open("POST","regist_ajax_form.php?id="+useridValue,true);//这个页面便是你要进行选择查询的PHP页面
        xmlHttp.onreadystatechange = byphp;//接受返回值
        //document.write(xmlHttp.status);
        xmlHttp.send(null);
    }
    span.innerHTML = msg;
}

function byphp()
{
    var msg;
    if(xmlHttp.readyState==1)//等于1是指还未获取返回值的意思
    {
        document.getElementById('useridSpan').innerHTML = "   <img src='images/loading.gif'  style='width:12px'>";
    }
    else
    {
        var byphp100 = xmlHttp.responseText;//接受PHP的返回值
        document.getElementById('useridSpan').innerHTML = byphp100; //设置span里的内容
    }
}