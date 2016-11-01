<?php
namespace Ntakei\BearSundayDemo\Service;

interface MessageService
{

    public function getAllMessages();

    public function getMessageById($id);
    
    public function addMessage($message);

    public function modifyMessage($message);

    public function deleteMessageById($id);

}
?>

