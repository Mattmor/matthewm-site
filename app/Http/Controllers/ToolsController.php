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
            return view('tools.youtube')->with('pagetitle', $pagetitle);
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
            return redirect('/tools/youtube');
        }
        $dl->setDownloadPath(storage_path().'/app/youtube/');
        // Download the video to server
        try {
            $downloadYT = $dl->download($request["yturl"]);
        } catch (NotFoundException $e) {
            dd($e);
            return redirect('/tools/youtube');
        } catch (PrivateVideoException $e) {
            dd($e);
            return redirect('/tools/youtube');
        } catch (CopyrightException $e) {
            dd($e);
            return redirect('/tools/youtube');
        } catch (\Exception $e) {
            dd($e);
            return redirect('/tools/youtube');
        }

        // Download the video to client
        if ($request["type"] == "Audio") {
            $headers = array(
                'Content-Type: audio/mpeg',
            );
            $fileLocation = $dl->getDownloadPath().$downloadYT->getTitle().'.mp3';
            return response()->download($fileLocation , $downloadYT->getTitle().'.mp3', $headers);
        } elseif ($request["type"] == "Video") {
            $headers = array(
                'Content-Type: video/mp4',
            );
            $fileLocation = $dl->getDownloadPath().$downloadYT->getTitle().'.mp4';
            return response()->download($fileLocation , $downloadYT->getTitle().'.mp4', $headers);
        }
    }
}
