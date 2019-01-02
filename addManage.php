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
include_once XOOPS_ROOT_PATH . "/modules/tadtools/tad_function.php";



//-----函數區-----

//自訂選單
function my_menu(){
	global $xoopsUser;
	$menu="";
	if($xoopsUser){
		$menu="<div align='center'>[<a href='index.php'>首頁</a> | <a href='itemManage.php'>消耗品管理</a> | <a href='teacherManage.php'>教師清單</a> | <a href='output.php'>匯出月報表</a>]</div>";
	}
	return $menu;
}



//這邊是用來讓老師領用的表單
function get_form(){
	//表單
	$form="<form method='post' action='index.php?op=save'>";
	$form.="<table border='1' width='80%'>";
	$form.="<tr><td>領取消耗品</td><td>領取教師</td><td>領取數量</td></tr>";
	$form.="<tr><td><input type='text' name='place' size='1'></td><td><input type='text' name='place' size='1'></td><td><input type='text' name='place' size='1'></td></tr>";
	$form.="<tr><td colspan='3'><div align='center'><Input Type='Submit' Value='送出'></div></td></tr>";
	$form.="</table>";
	$form.="</form>";
	return $form;
}




//-----判斷區-----
switch ($op) {
	case 'value':
		# code...
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
