<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Read File</title>
</head>
<body>
	<?php 
		include('class/file.class.php');
		//$file = file_get_contents('' );
			 
			$oFile = new File();
			$oFile->openFile( 'http://riotransparente.rio.rj.gov.br/respostas_desp/resposta_1.asp?ano=2012' );
			echo $oFile->getFile();

 
		
	?>

	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script>

		$(function(){

			sendItensLevel1( getItens() );

		});

		var getItens = function(){

			var itens = new Array();
			
			$('table:nth(3) tr').each(function(e){

				var tds, tds_length, line;
				line = new Array();
				tds = $(this).find('td');
				tds_length = tds.length;

				if(tds_length == 3) {

					tds.each(function(e){
						var content = $(this).text();
						if(content != '' ) line.push( content );
					});
					itens.push(line);

				}
				
			});
	
			return itens;			
		};

		var sendItensLevel1 = function( itens ){
			
			var o = '';

			for( i= 0; i< itens.length; i++ ){
				var i = 'iten' + i;
				o =  { 'a' : itens[i][0] }
			}
			
		 	console.warn( o );

			$.ajax({
				type : 'GET',
				url : 'ajax/insert-details-lv1.ajax.php',
				data : o
			})
		}

	</script>
</body>
</html>