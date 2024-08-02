<?php
class Database{
     private $con;
     function __construct(){
        $this->con=$this->connect();
     
     }
     //connection to the database
    private function  connect(){
        $string="mysql:host=localhost;dbname=mychat_db";
        try{
            $connection= new PDO($string,DBUSER,DBPASS);
            return $connection;
        }catch(PDOException $e)
        {
            echo $e->getMessage();
            die;
        }
        return false;
        
    } 
    //writing to the database
    public function write($query,$data_array=[]){
        $con=$this->connect();
        $statement=$con->prepare($query);

        
        $check=$statement->execute($data_array);
        if($check){
            return true;
        }
        else{
            return false;
        }
        
      
    }
    //read from DB
    public function read($query,$data_array=[]){
        $con=$this->connect();
        $statement=$con->prepare($query);

        
        $result=$statement->execute($data_array);
        if($result){
            $result=$statement->fetchAll((PDO::FETCH_OBJ));
            if(is_array($result) && count($result)>0){
                return $result;
            }
            return false;
        }
        else{
            return false;
        }
        
      

    }
    //
    public function get_user($userid){
        $con=$this->connect();
        $arr[':userid']=$userid;
        $query="select * from users where userid = :userid limit 1";
        $statement=$con->prepare($query);

        
        $check=$statement->execute($arr);
        if($check){
            $result=$statement->fetchAll((PDO::FETCH_OBJ));
            if(is_array($result) && count($result)>0){
                return $result[0];
            }
            return false;
        }
        else{
            return false;
        }
        
      
    }
    public function generate_id($max){
        $rand="";
        $rand_count=rand(4,$max);
        for($i=0;$i<$rand_count;$i++){
            $r=rand(0,9);
            $rand.=$r;
        }
        return $rand;
    }
}

?>