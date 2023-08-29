<?php

namespace App\Repositories\Info;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Info;

class InfoRepositoryImplement extends Eloquent implements InfoRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Info $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}
