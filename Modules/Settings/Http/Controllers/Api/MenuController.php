<?php

namespace Modules\Settings\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Settings\Entities\Menu;

class MenuController extends Controller
{
    public function index()
    {
        return Menu::all();
    }
}
