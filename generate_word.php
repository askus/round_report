<?php
	$date = $_POST['date'];
	$list_items = $_POST['list_items'];

	if( !isset( $date ) || !isset( $list_items) ){
		echo "{ }";
		return 0;
	}
	
	require( 'lib/PHPWord/PHPWord.php');
	
	

?>