<?php
namespace Ntakei\BearSundayDemo\Resource\Page;

use BEAR\Resource\ResourceObject;
use BEAR\Sunday\Inject\ResourceInject;
use Madapaja\TwigModule\TwigRenderer;
use Ntakei\BearSundayDemo\Form\MessageForm;
use Ray\WebFormModule\Annotation\FormValidation;
use Ray\Di\Di\Inject;
use Ray\Di\Di\Named;
use Ray\WebFormModule\FormInterface;

//class Messages extends ResourceObject 
class Messages extends Auth
{

    use ResourceInject;

    protected $messageForm;

    private $isError = false;

    /**
     * @Inject
     * @Named("message_form")
     */
    public function __construct(FormInterface $messageForm)
    {
        $this->messageForm = $messageForm;
    }

    public function onGet($q1 = null,$q2 = null)
    {
        switch(true) {
        case preg_match('/^\/messages$/',$_SERVER["REQUEST_URI"]):
            $this['messages'] = $this->resource
                ->get
                ->uri('app://self/messages')
                ->eager
                ->request();

            $this['action'] = "list";

            $this->code = "200";

            return $this;

        case preg_match('/^\/messages\/[0-9]+\/edit$/',$_SERVER["REQUEST_URI"]):
            $this['message'] = $this->resource
                ->get
                ->uri('app://self/messages')
                ->withQuery(['q1' => $q1])
                ->eager
                ->request();

            if (!$this->isError) {
                $this->messageForm->setId($this['message']['id']);
                $this->messageForm->setTitle($this['message']['title']);
                $this->messageForm->setAuthor($this['message']['author']);
                $this->messageForm->setComment($this['message']['comment']);
            }

            $this['message_form'] = $this->messageForm;

            $this['action'] = "edit";

            return $this;

        case preg_match('/^\/messages\/new$/',$_SERVER["REQUEST_URI"]):
            if (!$this->isError) {
                $this->messageForm->setId($this['message']['id']);
                $this->messageForm->setTitle($this['message']['title']);
                $this->messageForm->setAuthor($this['message']['author']);
                $this->messageForm->setComment($this['message']['comment']);
            }
            $this['message_form'] = $this->messageForm;

            $this['action'] = "new";

            return $this;

        case preg_match('/^\/messages\/[0-9]+\/delete$/',$_SERVER["REQUEST_URI"]):
            $this['message'] = $this->resource
                ->delete
                ->uri('app://self/messages')
                ->withQuery(['id' => $q1])
                ->eager
                ->request();

            $this->headers['Location'] = "/messages";

            return $this;

        }

    }

    /**
     * @FormValidation(form="messageForm", onFailure="onPostValidationFailed")
     */
    public function onPost($id,$title,$author,$comment)
    {
        switch(true) {
        case preg_match('/^\/messages\/new$/',$_SERVER["REQUEST_URI"]):
            $this['message'] = $this->resource
                ->post
                ->uri('app://self/messages')
                ->withQuery([
                    'title' => $title,
                    'author' => $author,
                    'comment' => $comment,
                ])
                ->eager
                ->request();
    
            $this->headers['Location'] = "/messages";
    
            return $this;

        case preg_match('/^\/messages\/[0-9]+\/edit$/',$_SERVER["REQUEST_URI"]):
            $this['message'] = $this->resource
                ->put
                ->uri('app://self/messages')
                ->withQuery([
                    'id' => $id,
                    'title' => $title,
                    'author' => $author,
                    'comment' => $comment,
                ])
                ->eager
                ->request();
    
            $this->headers['Location'] = "/messages";
    
            return $this;
        }

    }

    public function onPostValidationFailed($id,$title,$author,$comment)
    {
        $this->messageForm->setTitle($title);
        $this->messageForm->setAuthor($author);
        $this->messageForm->setComment($comment);
        $this->isError = true;
        $this->code = 400;

        foreach($this->messageForm->getInputNames() as $value)
        {
            $this->messageForm->addErrors($this->messageForm->error($value));
        }

        switch(true) {
        case preg_match('/^\/messages\/new$/',$_SERVER["REQUEST_URI"]):
            return $this->onGet($id,"new");

        case preg_match('/^\/messages\/[0-9]+\/edit$/',$_SERVER["REQUEST_URI"]):
            return $this->onGet($id,"edit");
        }
    }
}
