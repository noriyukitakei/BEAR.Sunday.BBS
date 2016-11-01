<?php
namespace Ntakei\BearSundayDemo\Resource\App;

use BEAR\Resource\ResourceObject;
use Ntakei\BearSundayDemo\Inject\MessageServiceInject;

class Messages extends ResourceObject
{
    use MessageServiceInject;

    public function onGet($q1=null,$q2=null)
    {
        if (!isset($q1) && !isset($q2)) {
            $messages = $this->messageService->getAllMessages();
            $messageArray = array();

            for ($i=0;$i < count($messages);$i++) {

                array_push($messageArray,$this->toArray($messages[$i]));

            }

            $this->body = $messageArray;

            return $this;

        } else if (preg_match("/^[0-9]+$/",$q1) && !isset($q2)) {

            $message = $this->messageService->getMessageById($q1);

            $this->body = $this->toArray($message);

            return $this;

        } else {

            $this->code = 404;

            return $this;

        }

    }

    public function onPost($title,$author,$comment)
    {

        $message = new \Ntakei\BearSundayDemo\Dto\Message;
        $message->setAuthor($author);
        $message->setTitle($title);
        $message->setComment($comment);

        $isSuccess = $this->messageService->addMessage($message);

        if ($isSuccess) {
            $this->code = 201;
        } else {
            $this->code = 500;
        }

        return $this;

    }

    public function onPut($id,$title,$author,$comment)
    {

        $message = new \Ntakei\BearSundayDemo\Dto\Message;
        $message->setId($id);
        $message->setAuthor($author);
        $message->setTitle($title);
        $message->setComment($comment);

        $isSuccess = $this->messageService->modifyMessage($message);

        if ($isSuccess) {
            $this->code = 200;
        } else {
            $this->code = 500;
        }

        return $this;

    }

    public function onDelete($id)
    {

        $isSuccess = $this->messageService->deleteMessageById($id);

        if ($isSuccess) {
            $this->code = 200;
        } else {
            $this->code = 500;
        }

        return $this;

    }

    private function toArray($message)
    {
        return array(
            'id'=>$message->getId(),
            'author'=>$message->getAuthor(),
            'title'=>$message->getTitle(),
            'comment'=>$message->getComment()
            );
    }
}
?>

