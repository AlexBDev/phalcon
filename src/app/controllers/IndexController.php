<?php

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $todos = Todo::find();

        $this->view->setVars(
            [
                "todos" => $todos,
            ]
        );
    }

    public function createAction()
    {
        $todo = new Todo();

        // Store and check for errors
        $success = $todo->save(
            $this->request->getPost(),
            [
                "content",
            ]
        );

        if ($success) {
            echo "Thanks for registering!";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $todo->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->response->redirect($this->request->getHTTPReferer());
    }

    public function deleteAction()
    {
        $id = $this->request->getQuery('id');
        $todo = Todo::findFirst("id = $id");;

        $success = $todo->delete();

        if ($success) {
            echo "Updated";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $todo->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->response->redirect($this->request->getHTTPReferer());
    }

    public function doneAction()
    {
        $id = $this->request->getQuery('id');
        $todo = Todo::findFirst("id = $id");;

        $success = $todo->save([
            'is_done' => 1,
        ]);

        if ($success) {
            echo "Updated";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $todo->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->response->redirect($this->request->getHTTPReferer());;
    }
}