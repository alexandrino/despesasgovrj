<?php 

/*
 *
 */
 
class File{
	
	private $url = '';
	private $file = '';

	/*
	 * Open file through $path parameter
	 */
	public function openFile( $path , $encoding = 'utf8' ){

		$open_file = file_get_contents( $path );
 		
 		if ($open_file != false) {
			if ( $encoding == 'utf8' ) {
				$this->file = utf8_encode( $open_file );
			}
		}else {
			echo 'Não foi possível abrir o arquivo.';
			die();
		}

	}

	/*
	 * Get attribute $file
	 */
	public function getFile(){
		return $this->file;
	}

}

?>