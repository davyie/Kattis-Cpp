<?php
/*
/*
Grupp 5 - Invictus Watches 
Management med IT
Webbprogrammeringens grunder
Södetörns Högskola 
2016-01-10 
Se till att länka rätt. Både i navigationen och här(include_once och sånt). 
Skriv rätt filväg/sökväg sådan att den här filen hittar rätt.
*/
include_once "db_connect.php";
include_once "header_footer_mall.php";
include_once "summering.php";

error_reporting(0);

session_start();

$logged_in = (isset($_SESSION['login']) && $_SESSION['login'] != '');

	if($logged_in) {
		if(isset($_SESSION['access']) && $_SESSION['access'] == 'admin') {
            
            echo header_login_admin();//titta här/ändra här
            //Funktioner skriv här. 
        echo get_report_pris();//Titta här 
        echo rapport_pris();//Denna skriver ut funktionen. 
        echo "<aside><a href='rapporter/tmp/db_info.tsv'>Download</a></aside>"; 
        echo mall_footer_login();
            
		} else {
			header ("Location: login.php");
		}
	} else {
			header ("Location: index.php");
	}
//Funktionen försöker skriva ut stapeldiagrammet. 
function get_report_pris() {
	return '<h1>Summary</h1>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="rapporter/script_pris.js"></script>';
	
}

?>