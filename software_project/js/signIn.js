/**
 * Created by 123 on 2016/11/29.
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
function reset(obj){
    alert("asdfa");
    if(obj.value=="请输入账号")
        obj.value = "";
}
function checkSub(){//点击登录按钮检查字段非空
    if(document.getElementById("username").value==null || document.getElementById("username").value==""){
        alert("未填写用户名");
        return false;
    }
    else if(document.getElementById("password").value==null || document.getElementById("password").value==""){
        alert("未填写密码");
        return false;
    }
    else if(document.getElementById("code").value==null || document.getElementById("code").value==""){
        alert("未填写验证码");
        return false;
    }
    else{
        document.getElementById("ensure").value = "登录中";
        document.forms[0].submit();
    }
}
//去空格
function trimStr(str){return str.replace(/(^\s*)|(\s*$)/g,"");}

//这个函数就是你要进行账号判断时所要实现的功能
function checkUserid(i)
{
    var useridObj;
    var span;
    if (i == 0) {
        useridObj = document.getElementById("username");
        span = document.getElementById("useridSpan");
    }
    else if (i == 1) {
    useridObj = document.getElementById("password");
        span = document.getElementById("passwdSpan");
}
    var useridValue = trimStr(useridObj.value);
    //var useridRegex =  /^\w{1,18}$/;
    var msg ="";
    if(useridValue == null || useridValue == "")
    {
        if(i==0)
        msg ="<font color='red'>账号不能为空！</font>";
        else
            msg = "<font color='red'>密码不能为空！</font>"
    }
    if(useridValue == "请输入账号")
    {
        msg = "<font color='red'>账号不能为空！</font>";
    }
    if(useridValue == "密码")
    {
        msg = "<font color='red'>请输入密码！</font>";
    }
    /*else if(!useridRegex.test(useridValue))
    {
        msg ="<font color='red'>账号长度不正确！</font>";
    }
    */
    //检查账号时候存在
    /*else
    {
        S_xmlhttprequest();
        //这里是异步运行了，当js执行到这一句话后不会等待他的返回值，而是直接往下进行，我测试出来的效果是当你js代码执行完了这里的值才返回来。
        xmlHttp.open("POST","regist_ajax_form.php?id="+useridValue,true);//这个页面便是你要进行选择查询的PHP页面
        xmlHttp.onreadystatechange = byphp;//接受返回值
        //document.write(xmlHttp.status);
        xmlHttp.send(null);
    }
     */
    span.innerHTML = msg;
}
/*
//接受返回值，xmlHttp.readyState一共有五种状态，想了解具体情况可以去百度查询
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
 */