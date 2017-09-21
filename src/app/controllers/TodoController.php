<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


/**
 * @RoutePrefix('/todo')
 */
class TodoController extends ControllerBase
{
    /**
     * @Get('/', name='todo_index')
     */
    public function indexAction()
    {
        $todos = Todo::find();
        $form = new TodoForm();

        $this->view->setVar('todos', $todos);
        $this->view->setVar('form', $form);
        $this->persistent->parameters = null;
    }

    /**
     * Searches for todo
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Todo', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "id";

        $todo = Todo::find($parameters);
        if (count($todo) == 0) {
            $this->flash->notice("The search did not find any todo");

            return $this->redirectToRoute('todo_index');
        }

        $paginator = new Paginator([
            'data' => $todo,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * @Post('/create', name='todo_create')
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            return $this->redirectToRoute('todo_index');
        }

        $todo = new Todo();
        $form = new TodoForm($todo);

        if ($form->isValid($_POST)) {
            if (!$todo->save()) {
                foreach ($todo->getMessages() as $message) {
                    $this->flash->error($message);
                }
            } else {
                $this->flash->success("todo was created successfully");
            }
        }

        return $this->redirectToRoute('todo_index');
    }

    /**
     * @Get('/delete/{id:\d+}', name='todo_delete')
     */
    public function deleteAction($id)
    {
        $todo = Todo::findFirstByid($id);

        if (!$todo) {
            $this->flash->error("todo was not found");

            return $this->redirectToRoute('todo_index');
        }

        if (!$todo->delete()) {
            foreach ($todo->getMessages() as $message) {
                $this->flash->error($message);
            }
        }

        $this->flash->success("todo was deleted successfully");

        return $this->redirectToRoute('todo_index');
    }

    /**
     * @Get('/is-done/{id:\d+}', name='todo_is_done')
     */
    public function isDoneAction($id)
    {
        $todo = Todo::findFirst($id);

        if ($todo === null) {
            throw new \UnexpectedValueException();
        }

        $todo->markHasDone();
        $todo->save();

        return $this->redirectToRoute('todo_index');
    }

}
