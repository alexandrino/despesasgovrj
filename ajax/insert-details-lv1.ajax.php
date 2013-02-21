<?php 
	
	include( '../class/database.class.php' );

	

	$cod = ( $_REQUEST['codigo'] ? trim($_REQUEST['codigo']) : null  );
	$org = ( $_REQUEST['orgao'] ? trim($_REQUEST['orgao']) : null  );
	$val = ( $_REQUEST['valor'] ? trim($_REQUEST['valor']) : null  );
	
	

	
?>