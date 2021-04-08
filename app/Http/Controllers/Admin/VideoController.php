<?php namespace App\Http\Controllers\Admin;

use App\Video;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class VideoController extends Controller
{
    public function __construct(Video $video)
    {
        $this->module = "video";
        $this->video = $video;
        $this->option = Cache::get('optionCache');
        $this->middleware('auth');
    }

    public function index()
    {
        $module = $this->module;
        $videos = $this->video->paginate(10);

        return view('admin.'. $module .'.index', compact('module', 'videos'));
    }

}
