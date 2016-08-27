<?php

namespace Modules\BaseTheme\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BaseThemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('basetheme::front.home.index');
    }
}
