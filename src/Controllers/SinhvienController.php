<?php
namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\SinhvienRepository;
use MVC\Models\SinhvienModel;

class SinhvienController extends Controller
{
    function index()
    {
        // require(ROOT . 'Models/Task.php');

        $sinhvienRepository = new SinhvienRepository;

        $d['sinhvien'] = $sinhvienRepository->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["sbm"]))
        {
            // require(ROOT . 'Models/Task.php');
            $sinhvienRepository = new SinhvienRepository();
            $model = new SinhvienModel();
            $model->setName($_POST["name"]);
            $model->setAge($_POST["age"]);
            
            if ($sinhvienRepository->add($model))
            { 
                header("Location: " . WEBROOT . "sinhvien/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        // require(ROOT . 'Models/Task.php');
        $sinhvienRepository = new SinhvienRepository();
        $oldModel = $sinhvienRepository->get($id);
        $d["sinhvien"] = $oldModel->getProperties();

        if (isset($_POST["name"]))
        {
            $model = new SinhvienModel();
            $model->setName($_POST["name"]);
            $model->setAge($_POST["age"]);
            $model->setId($id);
            if ($sinhvienRepository->add($model))
            {
                header("Location: " . WEBROOT . "sinhvien/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        // require(ROOT . 'Models/Task.php');

        $sinhvienRepository = new SinhvienRepository();
        if ($sinhvienRepository->delete($id))
        {
            header("Location: " . WEBROOT . "sinhvien/index");
        }
    }
}
?>