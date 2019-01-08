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

//自訂選單
function my_menu(){
	global $xoopsUser;
	$menu="";
	if($xoopsUser){
		$menu="<div align='center'>[<a href='index.php'>首頁</a> | <a href='itemManage.php'>消耗品管理</a> | <a href='addManage.php'>增購消耗品</a> | <a href='teacherManage.php'>教師清單</a> | <a href='output.php'>匯出月報表</a>]</div><br>";
	}
	return $menu;
}



//這邊是新增消耗品的表單
function add_form(){
	//表單
	$form="<form method='post' action='itemManage.php?op=save'>";
	$form.="<table border='1' width='80%'>";
	$form.="<tr><td>消耗品名稱</td><td><input type='text' name='item_name' size='36'></td><td><Input Type='Submit' Value='新增'></td></tr>";
	$form.="</table>";
	$form.="</form>";
	return $form;
}

//新增消耗品
function save(){
  global $xoopsDB;
   $sql = "insert into " . $xoopsDB->prefix('consumables_item') . " (`item_name`, `item_number`, `item_postTime`) values ('{$_POST['item_name']}',0,now())";
  $xoopsDB->query($sql) or die($xoopsDB->error());//redirect_header("itemManage.php",3,"新增失敗"); 
}

//所有消耗品清單
function item_list(){
	global $xoopsDB;
	$sql="select * from " . $xoopsDB->prefix('consumables_item') ;
	$result=$xoopsDB->query($sql) or die($sql);
	$itemList="<table border='1'>";
	$itemList.="<tr><th>消耗品</th><th>數量</th><th>管理</th></tr>";
	while (list($item_sn, $item_name, $item_number, $item_postTime)=$xoopsDB->fetchRow($result)){
		//這邊開始產生表格
		//修改連結
    	$modifyLink="<a href='itemManage.php?op=updateForm&sn=$item_sn'>修</a>";
    	//刪除連結
    	$delLink="<a href='itemManage.php?op=del&sn=$item_sn'>刪</a>";
		$itemList.="<tr><td>$item_name</td><td>$item_number</td><td>$modifyLink | $delLink</td></tr>";	
	}
	$itemList.="</table>";
	return $itemList;
}


//刪除
function del($sn){
  global $xoopsDB;
  $sql="delete from `" . $xoopsDB->prefix('consumables_item') . "` where `item_sn`=$sn";
  $xoopsDB->queryF($sql) or die($xoopsDB->error());
}




//-----判斷區-----
$op=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
$sn=(empty($_REQUEST['sn']))?"":$_REQUEST['sn'];

switch ($op) {
	case 'save':
		save();
		redirect_header("itemManage.php",3,"新增成功");
		break;
	case 'del':
		del($sn);
		redirect_header("itemManage.php",3,"刪除成功");
		break;
	case 'value':
		# code...
		break;
	case 'value':
		# code...
		break;

	default:
		$main=my_menu();
		$main.="<br>";
		$main.=add_form();
		$main.="<br><h1 align='center'>消耗品清單</h1><br>";
		$main.=item_list();;
		break;
}


//-----顯示區-----


echo $main;
include "../../footer.php";
?>
