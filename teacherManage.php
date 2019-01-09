<?php
/*
聲明：
1.本程式為新民智障生設計製作
2.本系統主要是用來協助管理消耗品
3.由教師上網填寫所需的消耗品
4.列印申請單給承辦人留存
5.找承辦人拿消耗品
開始撰寫時間：2019/01/02
完成撰寫時間：
程式設計者：葉大炮
系統架設：xoops
*/

//-----引入區-----
include "../../mainfile.php";
include "../../header.php";
//include_once XOOPS_ROOT_PATH . "/modules/tadtools/tad_function.php";



//-----函數區-----


//確認是否是有註冊過的帳號
function checkUser(){
	global $xoopsUser;
	if(empty($xoopsUser)){redirect_header(XOOPS_URL . "/index.php", 3, "請先登入");}
}

//修改表單
function updateForm($sn){
	global $xoopsDB;
	$sql="select * from " . $xoopsDB->prefix('consumables_teacher') . " where teacher_sn=$sn";
	$result=$xoopsDB->query($sql) or die($xoopsDB->error());
	list($teacher_sn, $teacher_name, $teacher_postTime)=$xoopsDB->fetchRow($result);
	$main="<h1 align='center'>修改名字</h1>";
	$main.="<form action='teacherManage.php?op=update&sn=$sn' method='POST'>";
	$main.="<table border='1'>";
	$main.="<tr><td>教師名稱</td><td><input type='text' name='teacher_name' size='12' value='$teacher_name'></td><td><Input Type='Submit' Value='修改'></td></tr>";
	$main.="</table>";
	$main.="</form>";
	return $main;
}




//修改資料
function update($sn){
  global $xoopsDB;
  $sql="update `" . $xoopsDB->prefix('consumables_teacher') . "` set
  `teacher_name`      =   '{$_POST['teacher_name']}',
  `teacher_postTime`  =   now()
  where teacher_sn=$sn";
  $xoopsDB->queryF($sql) or die($sql);
}


//自訂選單
function my_menu(){
	global $xoopsUser;
	$menu="";
	if($xoopsUser){
		$menu="<div align='center'>[<a href='index.php'>首頁</a> | <a href='itemManage.php'>消耗品管理</a> | <a href='addManage.php'>增購消耗品</a> | <a href='teacherManage.php'>教師清單</a> | <a href='output.php'>匯出月報表</a>]</div><br>";
	}
	return $menu;
}



//這邊是新增教師的表單
function add_form(){
	//表單
	$form="<form method='post' action='teacherManage.php?op=save'>";
	$form.="<table border='1'>";
	$form.="<tr><td>教師名稱</td><td><input type='text' name='teacher_name' size='12'></td><td><Input Type='Submit' Value='新增'></td></tr>";
	$form.="</table>";
	$form.="</form>";
	return $form;
}

//新增教師名單
function save(){
  global $xoopsDB;
   $sql = "insert into " . $xoopsDB->prefix('consumables_teacher') . " (`teacher_name`, `teacher_postTime`) values ('{$_POST['teacher_name']}',now())";
  $xoopsDB->query($sql) or die($xoopsDB->error());//redirect_header("itemManage.php",3,"新增失敗"); 
}

//所有教師清單
function teacher_list(){
	global $xoopsDB;
	$sql="select * from " . $xoopsDB->prefix('consumables_teacher') ;
	$result=$xoopsDB->query($sql) or die($xoopsDB->error());
	$teacherList="<table border='1'>";
	$teacherList.="<tr><th>教師名稱</th><th>管理</th></tr>";
	while (list($teacher_sn, $teacher_name, $teacher_postTime)=$xoopsDB->fetchRow($result)){
		//這邊開始產生表格
		//修改連結
    	$modifyLink="<a href='teacherManage.php?op=updateForm&sn=$teacher_sn'>修</a>";
    	//刪除連結
    	$delLink="<a href='teacherManage.php?op=del&sn=$teacher_sn'>刪</a>";
		$teacherList.="<tr><td>$teacher_name</td><td>$modifyLink | $delLink</td></tr>";	
	}
	$teacherList.="</table>";
	return $teacherList;
}


//刪除
function del($sn){
  global $xoopsDB;
  $sql="delete from `" . $xoopsDB->prefix('consumables_teacher') . "` where `teacher_sn`=$sn";
  $xoopsDB->queryF($sql) or die($xoopsDB->error());
}




//-----判斷區-----
$op=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
$sn=(empty($_REQUEST['sn']))?"":$_REQUEST['sn'];

switch ($op) {
	case 'save':
		save();
		redirect_header("teacherManage.php",3,"新增成功");
		break;
	case 'del':
		del($sn);
		redirect_header("teacherManage.php",3,"刪除成功");
		break;
	case 'updateForm':
		$main=updateForm($sn);
		break;
	case 'update':
		update($sn);
		redirect_header("teacherManage.php",3,"修改成功");
		break;

	default:
		checkUser();
		$main=my_menu();
		$main.="<br>";
		$main.=add_form();
		$main.="<br><h1 align='center'>教師清單</h1><br>";
		$main.=teacher_list();;
		break;
}


//-----顯示區-----


echo $main;
include "../../footer.php";
?>
