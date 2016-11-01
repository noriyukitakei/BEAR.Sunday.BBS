<?php
namespace Ntakei\BearSundayDemo\Form;

use Ray\WebFormModule\AbstractForm;
use Aura\Filter\Failure\Failure;

class LoginForm extends AbstractForm
{

    private $errors = array();

    public function init()
    {
        $this->setField('id')
            ->setAttribs([
                'id' => 'id',
                'name' => 'id',
                'size' => 20
            ]);

        $this->setField('password','password')
            ->setAttribs([
                'id' => 'password',
                'name' => 'password',
                'size' => 20
            ]);

        $this->setField('submit', 'submit')
             ->setAttribs([
                 'name' => 'submit',
                 'value' => 'ログイン'
             ]);

        $this->filter->validate('id')->is('strlenMin', 1);
        $this->filter->useFieldMessage('id', 'IDを入力して下さい。');
        $this->filter->validate('id')->is('alnum');
        $this->filter->useFieldMessage('id', 'IDは英数字で入力して下さい。');
        $this->filter->validate('password')->is('strlenMin', 1);
        $this->filter->useFieldMessage('password', 'パスワードを入力して下さい。');
    }

    public function __toString()
    {
        $this->input('id');
        $this->error('id');
        $this->input('password');
        $this->error('password');

        return $form;

    }

    public function setId($id)
    {
        $this->fill(array(
            "id" => $id
        ));
    }

    public function setPassword($password)
    {
        $this->fill(array(
            "password" => $password
        ));
    }

    public function addErrors($error)
    {
        array_push($this->errors,$error);
    }

    public function getErrors()
    {
        return $this->errors;
    }

}
?>
