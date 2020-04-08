<?php
class Customer {
    public      $name = "Ti";
    public      $age = "18";

    public function getInfo(){
        echo "name = " . $this->name . '<br>';
        echo "age =" . $this->age . '<br>';
    }

}

class Account extends Customer  {
    protected   $account = "2566645413215";
    private     $password = "123456";

    public function getInfo(){
        parent::getInfo();
        echo $this->name;
    }

    public function getAccount(){
        echo "account = " . $this->account . '<br>';
        echo "password =" . $this->password;
    }
}


$AccountA = new Account();
$AccountA-> getInfo();
$AccountA-> getAccount();