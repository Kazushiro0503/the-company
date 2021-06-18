<?php
    class Database
    {
        private $server_name = "localhost"; 
        private $username = "root"; 
        private $password = "root"; //For MAMP users, password is "root"
        private $db_name = "the_company_pm"; 
        protected $conn; 
        //connection($conn) is an access between PHP and mySQL
  
        public function __construct()
        {
            $this->conn = new mysqli($this->server_name, $this->username, $this->password, $this->db_name);

            /*"connect_error" is a property of "mysqli" */ 
            if($this->conn->connect_error)
            {
                die("Unable to connect to database" . $this->db_name .": ". $this->conn->connect_error);
                // 'Die' is for terminating the current script                  
            }
        }
    }
        
?>