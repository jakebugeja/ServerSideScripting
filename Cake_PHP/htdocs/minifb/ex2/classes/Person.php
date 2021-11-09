<?php
class Person {
    public $fist_name;
    public $last_name;
    protected $yob;

    //contructor
    public function __construct($_first_name,$_last_name="",$_yob=""){
        $this->first_name = $_first_name;
        $this->last_name = $_last_name;
        $this->yob = $this->setYOB($_yob); 
    }
    //setter
    public function setYOB($_yob){
        if($_yob > 1990 && $_yob <= date("Y")){
            $this->yob = $_yob;
            return true;
        }
        return false;
    }
    //getter
    public function getYOB(){
        return $this->yob;
    }

    public function getAge(){
        if(isset($this->yob)){
            $age = date("Y") - $this->yob;

            return $age;
        }
        return false;
    }
}
?>