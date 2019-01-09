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
//教師下拉選單
function teacherSelect(){
	global $xoopsDB;
	$sql="select `teacher_name` from " . $xoopsDB->prefix('consumables_teacher');
	$result=$xoopsDB->query($sql) or die($xoopsDB->error());
	$teacher_select="<select name='teacherSelect'>";
	while (list($teacher_name)=$xoopsDB->fetchRow($result)){
		$teacher_select.="<option value='$teacher_name'>$teacher_name</option>";
	}
	$teacher_select.="</select>";
	return $teacher_select;
}


//消耗品下拉選單
function itemSelect(){
	global $xoopsDB;
	$sql="select `item_name` from " . $xoopsDB->prefix('consumables_item');
	$result=$xoopsDB->query($sql) or die($xoopsDB->error());
	$item_select="<select name='itemSelect'>";
	while (list($item_name)=$xoopsDB->fetchRow($result)){
		$item_select.="<option value='$item_name'>$item_name</option>";
	}
	$teacher_select.="</select>";
	return $item_select;
}




//自訂選單
function my_menu(){
	//global $xoopsUser;
	//$menu="";
	//if($xoopsUser){
	$menu="<div align='center'>[<a href='index.php'>首頁</a> | <a href='itemManage.php'>消耗品管理</a> | <a href='addManage.php'>增購消耗品</a> | <a href='teacherManage.php'>教師清單</a> | <a href='output.php'>匯出月報表</a>]</div><br>";
//	}
	return $menu;
}


//新增教師名單
function save(){
  global $xoopsDB;
  $sql = "insert into " . $xoopsDB->prefix('consumables_get') . " (`get_item`, `get_teacher`, `get_number`, `get_postTime`) values ('{$_POST['itemSelect']}', '{$_POST['teacherSelect']}', '{$_POST['get_number']}',now())";
  $xoopsDB->query($sql) or die($xoopsDB->error());
  $sql="select item_number from " . $xoopsDB->prefix('consumables_item') . " where item_name='{$_POST['itemSelect']}'";
  $result=$xoopsDB->query($sql) or die($xoopsDB->error());
  list($item_number)=$xoopsDB->fetchRow($result);
  if($item_number<"{$_POST['get_number']}"){
  	redirect_header("index.php",10,"數量不足，請通知承辦人");
  }
  $sql="update `" . $xoopsDB->prefix('consumables_item') . "` set item_number=item_number-{$_POST['get_number']} where item_name='{$_POST['itemSelect']}'";
  $xoopsDB->queryF($sql) or die($xoopsDB->error());
}



//這邊是用來讓老師領用的表單
function get_form(){
	//表單
	$form="<form method='post' action='index.php?op=save'>";
	$form.="<table border='1' width='80%'>";
	$form.="<tr><td>領取消耗品</td><td>領取教師</td><td>領取數量</td></tr>";
	$form.="<tr><td>";
	$form.=itemSelect();
	$form.="</td><td>";
	$form.=teacherSelect();
	$form.="</td><td><input type='text' name='get_number' size='1'></td></tr>";
	$form.="</table>";
	$form.="<div align='center'><Input Type='Submit' Value='送出'></div>";
	$form.="</form>";
	return $form;
}




//-----判斷區-----
$op=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
$sn=(empty($_REQUEST['sn']))?"":$_REQUEST['sn'];





switch ($op) {
	case 'save':
		save();
		redirect_header("index.php",3,"領取成功");
		break;
	
	default:
		$main=my_menu();
		$main.=get_form();
		break;
}


//-----顯示區-----

echo $main;
include "../../footer.php";
?>
