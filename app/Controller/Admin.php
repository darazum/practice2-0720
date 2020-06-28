<?php
namespace App\Controller;

use App\Model\Eloquent\User;
use App\Model\Message;
use Base\AbstractController;

class Admin extends AbstractController
{
    public function preDispatch()
    {
        parent::preDispatch();
        if(!$this->getUser() || !$this->getUser()->isAdmin()) {
            $this->redirect('/');
        }
    }

    public function deleteMessage()
    {
        $messageId = (int) $_GET['id'];
        Message::deleteMessage($messageId);
        $this->redirect('/blog');
    }

    public function users()
    {
        return $this->view->render('admin/users.phtml', [
            'users' => User::all()
        ]);
    }
}