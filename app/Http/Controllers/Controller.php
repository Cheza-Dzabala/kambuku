<?php

namespace App\Http\Controllers;

use App\Config;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $image_path;

    /**
     * Controller constructor.
     * @param Config $config
     */
    public function __construct()
    {
        $this->image_path = Config::whereName('image_dir')->first();

    }
}
