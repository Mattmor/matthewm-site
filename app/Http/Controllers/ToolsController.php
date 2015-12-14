<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ToolsController extends Controller
{
    /**
     * Display the tools page.
     *
     * @return view(htmldoc/tools)
     */
    public function index()
    {
        $pagetitle = 'Web Tools';
        return view('tools.tools')->with('pagetitle', $pagetitle);
    }

    /**
     * Display the tools construction page.
     *
     * @return view(htmldoc/ts)
     */
    public function construction()
    {
        $pagetitle = 'Under construction';
        return view('htmldoc.construction')->with('pagetitle', $pagetitle);
    }
}
