<?php
    /**
    * 
    */
    class DbConfig extends PDO 
    {    
        private $_engine; 
        private $_host; 
        private $_name; 
        private $_user; 
        private $_password; 
        
        public function __construct(){
            require_once('./core/config.php');

            $this->_engine =    DB_NGIN; 
            $this->_host =      DB_HOST; 
            $this->_name =      DB_NAME; 
            $this->_user =      DB_USER; 
            $this->_password =  DB_PASS; 
           
            $dsn = $this->_engine.':dbname='.$this->_name.";host=".$this->_host; 
            parent::__construct($dsn, $this->_user, $this->_password); 
        } 
    } 

?>