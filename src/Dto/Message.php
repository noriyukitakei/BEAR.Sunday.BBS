<?php
namespace Ntakei\BearSundayDemo\Dto;

class Message implements Dto
{

    private $id;
    private $author;
    private $title;
    private $comment;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getComment() {
        return $this->comment;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }

    public function toArray()
    {
        return array(
            'id'=>$this->id,
            'author'=>$this->author,
            'title'=>$this->title,
            'comment'=>$this->comment
        );

    }

    public function __toString()
    {
        $str = "ID = ".$this->id.",";
        $str .= "TITLE = ".$this->title.",";
        $str .= "AUTHOR = ".$this->author.",";
        $str .= "COMMENT = ".$this->comment;

        return $str;
    }

}
?>
