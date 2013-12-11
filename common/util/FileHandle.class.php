<?php
class FileHandle{
	private $read;//读取文件内容
	
	public function readfile($filename){
		$fp = fopen($filename, 'r');
		while( ! feof( $fp)){
  			$read=$read.fgets( $fp);
		}
		fclose( $fp);
		return $read;
	}
	
	
}

?>