<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HtmlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagetitle = 'Matt Morgan';
        return view('htmldoc.home')->with('pagetitle', $pagetitle);
    }

    public function offlineProjects()
    {
        $pagetitle = 'Offline Projects';
        return view('htmldoc.offline_projects')->with('pagetitle', $pagetitle);
    }
    public function ai()
    {
        $pagetitle = 'AI';
        return view('htmldoc.ai')->with('pagetitle', $pagetitle);
    }
    public function construction()
    {
        $pagetitle = 'Under construction';
        return view('htmldoc.construction')->with('pagetitle', $pagetitle);
    }

}
