<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Traits\CRUD\PhantomCreate;
use App\Traits\PhantomResponse;
use App\Traits\CRUD\PhantomAll;
use App\Traits\Query\PhantomQuery;
use Illuminate\Http\Request;

class PhantomController extends Controller
{
    protected $model;

    use PhantomResponse,
        PhantomAll,
        PhantomCreate,
        PhantomQuery;

}
