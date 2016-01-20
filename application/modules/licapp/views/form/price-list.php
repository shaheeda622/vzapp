<?php
   require_once('header-common.php');
   
   	$pageNo = 1;
	for($i=7; $i<9; $i++){
		require __DIR__ . '/header-terms.php';
		require __DIR__ . "/page$i.php";
		require __DIR__ . '/footer-terms.php';
		$pageNo++;	
	}

	
?>