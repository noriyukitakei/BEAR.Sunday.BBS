<?php
namespace Ntakei\BearSundayDemo\Service;

use Ntakei\BearSundayDemo\Dto\Message;
use Ntakei\BearSundayDemo\Annotation\Log;
use Ray\AuraSqlModule\AuraSqlInject;

class MessageServiceImpl implements MessageService
{

    use AuraSqlInject;

    public function getAllMessages()
    {

        $messages = $this->pdo->fetchAll("SELECT * FROM messages");
        $result = array();

        foreach($messages as $value) {
            $message = new Message();
            $message->setId($value["id"]);
            $message->setAuthor($value["author"]);
            $message->setTitle($value["title"]);
            $message->setComment($value["comment"]);
            array_push($result,$message);
        }

        return $result;
    }

    public function getMessageById($id)
    {

        $record = $this->pdo->fetchOne("SELECT * FROM messages WHERE id = :id",
            ['id' => $id]
        );

        $message = new Message();
        $message->setId($record["id"]);
        $message->setAuthor($record["author"]);
        $message->setTitle($record["title"]);
        $message->setComment($record["comment"]);

        return $message;

    }
    
    /**
     * @Log
     */
    public function addMessage($message)
    {
        $sql = 'INSERT INTO messages(author,title,comment) VALUES(:author,:title,:comment)';
        $bind = [
            'author' => $message->getAuthor(),
            'title' => $message->getTitle(),
            'comment' => $message->getComment(),
        ];

        $statement = $this->pdo->prepare($sql);

        $statement->execute($bind);

    }

    /**
     * @Log
     */
    public function modifyMessage($message)
    {
        $sql = 'UPDATE messages set ';
        $sql .= 'author = :author,';
        $sql .= 'title = :title,';
        $sql .= 'comment = :comment ';
        $sql .= 'where id = :id';
         
        $bind = [
            'id' => $message->getId(),
            'author' => $message->getAuthor(),
            'title' => $message->getTitle(),
            'comment' => $message->getComment(),
        ];

        $statement = $this->pdo->prepare($sql);

        $statement->execute($bind);
    }

    /**
     * @Log
     */
    public function deleteMessageById($id)
    {
        $sql = 'delete from messages ';
        $sql .= 'where id = :id';
         
        $bind = [
            'id' => $id
        ];

        $statement = $this->pdo->prepare($sql);

        $statement->execute($bind);
    }
}
?>
