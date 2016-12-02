<?php
/**
 * Created by PhpStorm.
 * User: 镇杰
 * Date: 2016/11/28
 * Time: 9:09
 */
class ConnDB{
    var $dbtype;
    var $host;
    var $user;
    var $pwd;
    var $dbname;
    function ConnDB($dbtype,$host,$user,$pwd,$dbname){
        $this->dbtype=$dbtype;
        $this->host=$host;
        $this->user=$user;
        $this->pwd=$pwd;
        $this->dbname=$dbname;
    }
    function GetConnId(){
        if($this->dbtype=="mysql"||$this->dbtype=="mssql"){
            $dsn="$this->dbtype:host=$this->host;dbname=$this->dbname";
        }else{
            $dsn="$this->dbtype:dbname=$this->dbname";
        }
        try{
            $conn=new PDO($dsn,$this->user,$this->pwd);
            $conn->query("set names utf8");
            return $conn;
        }catch(PDOException $e){
            die("Error!:".$e->getMessage()."<br/>");
        }
    }
}

class AdminDB
{
    function ExecSQL($sqlstr, $conn)
    {
        $sqltype = strtolower(substr(trim($sqlstr), 0, 6));
        $rs = $conn->prepare($sqlstr);//prepare()方法准备查询语句
        $rs->execute();//execute()方法执行查询语句，并返回结果集
        if ($sqltype == "select") {
            $array = $rs->fetchAll(PDO::FETCH_ASSOC);//fetchAll()方法的返回值是一个包含结果集中所有数据的二维数组
            if (count($array) == 0 || $rs == false)
                return false;
            else
                return $array;
        } elseif ($sqltype == "update" || $sqltype == "insert" || $sqltype == "delete") {
            if ($rs)
                return true;
            else
                return false;
        }
    }
}

class SepPage{
    var $rs;
    var $pagesize;//页面大小
    var $nowpage;//当前所在页面
    var $array;
    var $conn;
    var $sqlstr;
    function ShowData($sqlstr,$conn,$pagezie,$nowpage){
        if(!isset($nowpage)||$nowpage=="")
            $this->nowpage=1;
        else
            $this->nowpage=$nowpage;
        $this->pagesize=$pagezie;
        $this->conn=$conn;
        $this->sqlstr=$sqlstr;
        $this->rs=$this->conn->PageExecute($this->sqlstr,$this->pagesize,$this->nowpage);
        @$this->array=$this->rs-GetRows();
        if(count($this->array)==0||$this->rs==false)
            return false;
        else
            return $this->array;
    }
    function ShowPage($contentname,$utits,$anothersearchstr,$anothersearchstrs,$class){
        $allrs=$this->conn->Execute($this->sqlstr);
        $record=count($allrs->GetRows());
        $pagecount=ceil($record/$this->pagesize);
        $str.=$contentname."&nbsp;".$record."&nbsp;".$utits."&nbsp;每页&nbsp;".$this->pagesize."&nbsp;".$utits."&nbsp;第&nbsp;".$this->rs->AbsolutePage()."&nbsp;页/共&nbsp;".$pagecount."&nbsp;页";
        $str.="&nbsp;&nbsp;&nbsp;&nbsp;";
        if(!$this->rs->AtFirstPage())
            $str.="<a href=".$_SERVER['PHP_SELF']."?page=1&paramater1=".$anothersearchstr."&paramater2=".$anothersearchstrs."class=".$class.">首页</a>";
        else
            $str.="<font color='#555555'>首页</font>";
        $str.="&nbsp;";
        if(!$this->rs->AtFirstPage())
            $str.="<a href=".$_SERVER['PHP_SELF']."?page=".($this->rs->AbsolutePage()-1)."&paramater1=".$anothersearchstr."&paramater2=".$anothersearchstrs."class=".$class.">上一页</a>";
        else
            $str.="<font color='#555555'>上一页</font>";
        $str.="&nbsp;";
        if(!$this->rs->AtLastPage())
            $str.="<a href=".$_SERVER['PHP_SELF']."?page=".($this->rs->AbsolutePage()+1)."&paramater1=".$anothersearchstr."&paramater2=".$anothersearchstrs."class=".$class.">下一页</a>";
        else
            $str.="<font color='#555555'>下一页</font>";
        $str.="&nbsp;";
        if(!$this->rs->AtLastPage())
            $str.="<a href=".$_SERVER['PHP_SELF']."?page=".$pagecount."&paramater1=".$anothersearchstr."&paramater2=".$anothersearchstrs."class=".$class.">尾页</a>";
        else
            $str.="<font color='#555555'>尾页</font>";
        if(count($this->array)==0||$this->rs==false)
            return "";
        else
            return $str;
    }
}