<?php

namespace MVC\Models;

use MVC\Models\SinhvienResourceModel;

class SinhvienRepository
{
    
    public function add($model)
    {
        $sinhvienResourceModel = new SinhvienResourceModel;
        return $sinhvienResourceModel->save($model);
    }
    public function get($id)
    {
        $sinhvienResourceModel = new SinhvienResourceModel;
        return $sinhvienResourceModel->get($id);
    }
    public function delete($id)
    {
        $sinhvienResourceModel = new SinhvienResourceModel;
        return $sinhvienResourceModel->delete($id);
    }
    public function getAll()
    {
        $sinhvienResourceModel = new SinhvienResourceModel;
        return $sinhvienResourceModel->getAll();
    }
}

?>