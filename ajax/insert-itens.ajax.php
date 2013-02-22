<?php 
	
	include( '../class/database.class.php' );

	$db = new Database();
	
	

	$type = ( $_REQUEST['type'] ? trim($_REQUEST['type']) : null  );
	$cod = ( $_REQUEST['codigo'] ? trim($_REQUEST['codigo']) : null  );
	$org = ( $_REQUEST['orgao'] ? trim($_REQUEST['orgao']) : null  );
	$val = ( $_REQUEST['valor'] ? trim($_REQUEST['valor']) : null  );
	
	

	if ( $type && $type === 'unidade_orcamentaria' ) {
		echo $type;
	}

	
?>