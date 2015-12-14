<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HtmlController extends Controller
{
    /**
     * Display the home page.
     *
     * @return view(htmldoc/home)
     */
    public function index()
    {
        $pagetitle = 'Matt Morgan';
        return view('htmldoc.home')->with('pagetitle', $pagetitle);
    }

    /**
     * Display the offline projects page.
     *
     * @return view(htmldoc/offline_projects)
     */
    public function offlineProjects()
    {
        $pagetitle = 'Offline Projects';
        return view('htmldoc.offline_projects')->with('pagetitle', $pagetitle);
    }

    /**
     * Display the ai page.
     *
     * @return view(htmldoc/ai)
     */
    public function ai()
    {
        $pagetitle = 'AI';
        return view('htmldoc.ai')->with('pagetitle', $pagetitle);
    }

    /**
     * Display the under construction page.
     *
     * @return view(htmldoc/construction)
     */
    public function construction()
    {
        $pagetitle = 'Under construction';
        return view('htmldoc.construction')->with('pagetitle', $pagetitle);
    }

}
