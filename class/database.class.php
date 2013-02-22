<?php 

class Database{  

	private $db_host = '';  
	private $db_user = '';  
	private $db_pass = '';  
	private $db_name = '';  

	public function connect(){  

        if(!$this->con){  
            $myconn = mysql_connect($this->db_host,$this->db_user,$this->db_pass);  

                var_dump($myconn);exit;

            if($myconn) {  
                $seldb = @mysql_select_db($this->db_name,$myconn);  
                if($seldb){  
                    $this->con = true;  
                    return true;  
                }else{  
                    return false;  
                }  
            } else{  
                return false;  
            }  
        } else {  
            return true;  
        }  
        
    }  


	public function disconnect() {  

	    if($this->con) {  
	        if(@mysql_close()) {  
	        	$this->con = false;  
	            return true;  
	        } else{  
	            return false;  
	        }  
	    }  

	}  


	public function insert($table,$values,$rows = null) {  
       
        if($this->tableExists($table)) {  
           
            $insert = 'INSERT INTO '.$table;  
            
            if($rows != null) {  
                $insert .= ' ('.$rows.')';  
            } 

            for($i = 0; $i < count($values); $i++) {  
                
                if(is_string($values[$i]))  
                    $values[$i] = '"'.$values[$i].'"';  
            }

            $values = implode(',',$values);  
            $insert .= ' VALUES ('.$values.')';  
            $ins = @mysql_query($insert);  

            if($ins) {  
                return true;  
            } else {  
                return false;  
            }  
        }  
    }  	

}  



?>