<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinksController extends Controller
{
    /**
     * Display the links page.
     *
     * @return view(htmldoc/links)
     */
    public function index()
    {
        $pagetitle = 'Links';
        return view('htmldoc.links')->with('pagetitle', $pagetitle);
    }

    /**
     * Display the teamspeak page.
     *
     * @return view(htmldoc/ts)
     */
    public function ts()
    {
        $pagetitle = 'Teamspeak';
        return view('htmldoc.ts')->with('pagetitle', $pagetitle);
    }

}
