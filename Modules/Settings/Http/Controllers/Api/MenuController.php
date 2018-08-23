<?php

namespace Modules\Settings\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Settings\Entities\Menu;

class MenuController extends Controller
{
    public function index()
    {
        return Menu::all();
    }
}
