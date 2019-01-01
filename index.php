<?php
/*
新民國小消耗品計算用的小系統
*/
//-----引入區-----
include "../../mainfile.php";
include "../../header.php";


//-----函數區-----

//檢查是否為管理帳號
function checkUser{
	global $xoopsUser;
	if(empty($xoopsUser)){
		redirect_header(XOOPS_URL . "/index.php",3,"請先登入");
	}
}
//menu,包含消耗品管理、教師清單管理、各月份報表匯出
function menu{


}

/*
這邊是管理消耗品的頁面(部份選項設計為)
*/

//item_add_form
//item_update_form
//item_add(增購)
//item_update
//item_showList

/*
這邊是教師清單的管理頁面
*/


//teacher_showList
//teacher_add_form
//teacher_update_form
//teacher_add
//teacher_update

/*
這邊是增購的頁面
*/

//
?>
