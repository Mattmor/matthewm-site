<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Storage;

use YoutubeDl\YoutubeDl;
use YoutubeDl\Exception\CopyrightException;
use YoutubeDl\Exception\NotFoundException;
use YoutubeDl\Exception\PrivateVideoException;

class ToolsController extends Controller
{

    /**
     * Only admin's can access create/edit functions
     */
    public function __construct()
    {
        $this->middleware('deleteFiles', ['only' => 'showYoutube']);
    }

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

    /**
     * Display the youtube downloader page.
     *
     * @return view(htmldoc/ts)
     */
    public function showYoutube()
    {
        $pagetitle = 'Youtube Downloader';
        return view('tools.youtube')->with('pagetitle', $pagetitle);
    }

    /**
     * Display the youtube downloader page.
     *
     * @return view(htmldoc/ts)
     */
    public function downloadYoutube(Request $request)
    {
        if ($request["yturl"] == "") {
            $pagetitle = 'Youtube Downloader';
            \Session::flash('flash_message_danger', 'You need to put a URL into the URL box to use this.');
            return redirect('/tools/youtube')->with('pagetitle', $pagetitle);
        }
        if ($request["type"] == "Audio") {
            $dl = new YoutubeDl([
                'extract-audio' => true,
                'audio-format' => 'mp3',
                'audio-quality' => 0, // best
                'output' => '%(title)s.%(ext)s',
            ]);
        } elseif ($request["type"] == "Video") {
            $dl = new YoutubeDl([
                'continue' => true,
                'format' => 'best',
                'output' => '%(title)s.%(ext)s',
            ]);
        } else {
            $pagetitle = 'Youtube Downloader';
            \Session::flash('flash_message_danger', 'Pick a file type to make the downloader work.');
            return redirect('/tools/youtube')->with('pagetitle', $pagetitle);
        }
        $dl->setDownloadPath(storage_path().'/app/youtube/');
        // Download the video to server
        try {
            $downloadYT = $dl->download($request["yturl"]);
        } catch (NotFoundException $e) {
            $pagetitle = 'Youtube Downloader';
            \Session::flash('flash_message_danger', 'The video you requested was not found, please try again.');
            return redirect('/tools/youtube')->with('pagetitle', $pagetitle);
        } catch (PrivateVideoException $e) {
            $pagetitle = 'Youtube Downloader';
            \Session::flash('flash_message_danger', 'The video you requested is a private video and could not be downloaded.');
            return redirect('/tools/youtube')->with('pagetitle', $pagetitle);
        } catch (CopyrightException $e) {
            $pagetitle = 'Youtube Downloader';
            \Session::flash('flash_message_danger', 'The video you requested cannot be found due to Copyright.');
            return redirect('/tools/youtube')->with('pagetitle', $pagetitle);
        } catch (\Exception $e) {
            dd($e);
            $pagetitle = 'Youtube Downloader';
            \Session::flash('flash_message_danger', 'Something went wrong. Please try again.');
            return redirect('/tools/youtube')->with('pagetitle', $pagetitle);
        }

        // Download the video to client
        if ($request["type"] == "Audio") {
            $headers = array(
                'Content-Type: audio/mpeg',
            );
            $fileLocation = $dl->getDownloadPath().$downloadYT->getTitle().'.mp3';
            \Session::flash('flash_message', 'Your download is starting.');
            return response()->download($fileLocation , $downloadYT->getTitle().'.mp3', $headers);
        } elseif ($request["type"] == "Video") {
            $headers = array(
                'Content-Type: video/mp4',
            );
            $fileLocation = $dl->getDownloadPath().$downloadYT->getTitle().'.mp4';
            \Session::flash('flash_message', 'Your download is starting.');
            return response()->download($fileLocation , $downloadYT->getTitle().'.mp4', $headers);
        }
    }
}
