<?php
   require_once('header-common.php');
   
   	$pageNo = 1;
        require __DIR__ . '/header-terms.php';
	for($i=5; $i<7; $i++){
		
		require __DIR__ . "/page$i.php";
		
		$pageNo++;	
	}
        require __DIR__ . '/footer-terms.php';
	
?>