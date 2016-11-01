<?php
namespace Ntakei\BearSundayDemo\Form;

use Aura\Html\Helper\Tag;
use Ray\WebFormModule\AbstractForm;

class MessageForm extends AbstractForm
{

    private $errors = array();

    public function init()
    {
        $this->setField('id','hidden');

        $this->setField('author')
            ->setAttribs([
                'id' => 'author',
                'name' => 'author',
                'size' => 20
            ]);

        $this->setField('title')
            ->setAttribs([
                'id' => 'title',
                'name' => 'title',
                'size' => 20
            ]);

        $this->setField('comment','textarea')
            ->setAttribs([
                'id' => 'comment',
                'name' => 'comment',
                'rows' => 4,
                'cols' => 40
            ]);

        $this->setField('submit', 'submit')
             ->setAttribs([
                 'name' => 'submit',
                 'value' => '投稿'
             ]);

        $this->filter->validate('title')->is('strlenBetween', 1, 128);
        $this->filter->useFieldMessage('title', 'タイトルは128文字以内で入力して下さい。');
        $this->filter->validate('author')->is('strlenBetween', 1, 128);
        $this->filter->useFieldMessage('author', '投稿者は128文字以内で入力して下さい。');
        $this->filter->validate('comment')->is('strlenBetween', 1, 128);
        $this->filter->useFieldMessage('comment', 'コメントは128文字以内で入力して下さい。');
    }

    public function __toString()
    {
        $this->input('author');
        $this->error('author');
        $this->input('title');
        $this->error('title');
        $this->input('comment');
        $this->error('comment');
        $this->input('id');

        return $form;

    }

    public function setId($id)
    {
        $this->fill(array(
            "id" => $id
        ));
    }

    public function setTitle($title)
    {
        $this->fill(array(
            "title" => $title
        ));
    }

    public function setAuthor($author)
    {
        $this->fill(array(
            "author" => $author
        ));
    }

    public function setComment($comment)
    {
        $this->fill(array(
            "comment" => $comment
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
