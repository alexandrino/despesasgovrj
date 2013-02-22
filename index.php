<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>File Import</title>
</head>
<body>
	<?php 

		include('class/file.class.php');

		$oFile = new File();
		$oFile->openFile( 'http://riotransparente.rio.rj.gov.br/respostas_desp/resposta_5.asp?ano=2012&ua=2951&uo=2951&pt=29512645203864526&fonte=100' );
		echo $oFile->getFile();

	?>

	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script>

		$(function(){
			console.log($('table:nth(3) tr').html());
			sendItens( getItens(), 'unidade_orcamentaria' );

		});
		
		// Function that clean the DOM and returns table's lines Object
		var getItens = function(){

			var items, index;
			items = {};
			index = 1;

			$('table:nth(3) tr').each(function(e){

				var tds, tds_length, line, col_n;
				line = {};
				tds = $(this).find('td');
				tds_length = tds.length;
				col_n = 1;

				if(tds_length == 3) {
					
					tds.each(function(e){
						
						var content = $(this).text();
						if(col_n == 1) line['codigo'] = content ;
						else if( col_n == 2) line['orgao'] = content ;
						else line['valor'] = content ;
						col_n++;

					});

					items['iten' + index] = line;
					index++;
				}
				
				
			});
	
			return items;			
		};

		// Funtion that send each item via AJAX
		var sendItens = function( items, type ){
			
			switch( type ){

				case 'unidade_orcamentaria' : 
					for( k in items ){
						// Set type on the object 
						items[k]['type'] = 'unidade_orcamentaria';
						if( k != 'iten1' ){
							$.ajax({
								type : 'GET',
								url : 'ajax/insert-itens.ajax.php',
								data : items[k] 
							}).done(function(msg){
								console.log( msg );
							});					 
						}
					}
				break;

				default: 
				break;
			}

		}

	</script>
</body>
</html>