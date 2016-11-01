<?php
namespace Ntakei\BearSundayDemo\Dto;

class User implements Dto
{

    private $id;
    private $password;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function __toString()
    {
        $str = "ID = ".$this->id.",";
        $str .= "PASSWORD = ******";

        return $str;
    }

}
?>
