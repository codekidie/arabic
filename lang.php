<?php 
session_start();
include("layouts/rb.php"); 
require_once("layouts/con.php");

 $lang = array("hello"=>"مرحبا",
 			  "Good Morning"=>"صباح الخير",
 			  "Good afternoon"=>"طابمسائكم",
 			  "Good evening"=>"مساء الخير",
 			  "Meeting"=>"لقاء",
 			  "Collection"=>"مجموعة",
 			  "Gathering"=>"جمع",
 			  "School"=>"مدرسة",
 			  "Church"=>"كنيسة",
 			  "Congratulation"=>"تهنئة",
 			  "Lucky"=>"سعيد الحظ",
 			  "Good night"=>"تصبح على خير",
 			  "Solution"=>"حل",
 			  "Everything"=>"كل شىء",
 			  "Something"=>"شيئا ما",
 			  "Glory be to Allah"=>"سبحان الله",
 			  "Praise be to Allah"=>"الحمد لله",
 			  "1"=>"ا",
 			  "2"=>"ب",
 			  "3"=>"تا",
 			  "4"=>"ث",
 			  "5"=>"ج",
 			  "6"=>"ح",
 			  "7"=>" ",
 			  "8"=>"د",
 			  "9"=>"ذ",
 			  "10"=>"ر",
 			  "11"=>"ز",
 			  "12"=>"س",
 			  "13"=>"ش",
 			  "14"=>"ص",
 			  "15"=>"",
 			  "16"=>"",
 			  "17"=>"",
 			  "18"=>"",
 			  "19"=>"",
 			  "20"=>"ف",
 			  "21"=>"ك",
 			  "22"=>"ك",
 			  "23"=>"ل",
 			  "24"=>"م",
 			  "25"=>"ن",
 			  "26"=>" ",
 			  "27"=>"o",
 			  "28"=>"ي",
 			 );

 if (isset($_GET['eng'])) {
 	foreach ($lang as $key => $value) {
 		if (ucwords($key) == ucwords($_GET['eng'])) {
 			echo $value;
 		}
 	}
 }




