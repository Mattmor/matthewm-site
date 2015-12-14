<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagetitle = 'Links';
        return view('htmldoc.links')->with('pagetitle', $pagetitle);
    }

    public function ts()
    {
        $pagetitle = 'Teamspeak';
        return view('htmldoc.ts')->with('pagetitle', $pagetitle);
    }

}
