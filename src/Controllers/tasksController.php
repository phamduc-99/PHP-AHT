<?php
namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\TaskRepository;
use MVC\Models\taskModel;

class tasksController extends Controller
{
    function index()
    {
        // require(ROOT . 'Models/Task.php');

        $taskRepository = new TaskRepository();

        $d['tasks'] = $taskRepository->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["sbm"]))
        {
            // require(ROOT . 'Models/Task.php');
            $taskRepository = new TaskRepository();
            $model = new taskModel();
            $model->setTitle($_POST["title"]);
            $model->setDescription($_POST["description"]);

            if ($taskRepository->add($model))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        // require(ROOT . 'Models/Task.php');
        $taskRepository = new TaskRepository();
        $oldModel = $taskRepository->get($id);
        $d["task"] = $oldModel->getProperties();

        if (isset($_POST["title"]))
        {
            $model = new taskModel();
            $model->setId($id);
            $model->setTitle($_POST["title"]);
            $model->setDescription($_POST["description"]);
            if ($taskRepository->add($model))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        // require(ROOT . 'Models/Task.php');

        $taskRepository = new TaskRepository();
        if ($taskRepository->delete($id))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>