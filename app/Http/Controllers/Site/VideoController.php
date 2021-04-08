<?php namespace App\Http\Controllers\Site;

use App\Video;
use App\VideoHasRating;
use App\Http\Requests\Site\FeedRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function __construct(Video $video, VideoHasRating $rating)
    {
        $this->module = "video";
        $this->data = $video;
        $this->rating = $rating;
        $this->middleware('auth');
        $this->option = Cache::get('optionCache');
    }

    public function get_feeds()
    {
        $module = $this->module;

        $feeds = $this->data->orderBy('id', 'DESC')->paginate(12);
        return view('site.'.$module.'.index', compact('module', 'feeds'));
    }

    public function get_add_video(){
        $module = $this->module;
        return view('site.'.$module.'.add', compact('module'));
    }

    public function post_video(FeedRequest $request)
    {
        $this->data->fill($request->all());

        //CREATING NAME FOR FILES
        $currentDate = date('Ymd');
        $currentTime = time();

        //VIDEO UPLOAD FUNCTION
        if($request->video) {
            $videoExtension = $request->video->getClientOriginalExtension();
            if($videoExtension !== 'mp4'){
                return redirect()->back()->with('error', 'You can only upload mp4 files');
            }
            $file_video = $request->video;
            $video_name = $currentDate.$currentTime.'.'.$videoExtension;

            $path = $file_video->storeAs('videos', $video_name, 's3');

        }

        if($request->thumbnail){
            $thumbnailExtension = $request->thumbnail->getClientOriginalExtension();
            $file_thumbnail = $request->thumbnail;

            $thumbnail_name = $currentDate.$currentTime.'.'.$thumbnailExtension;

            $path = $file_thumbnail->storeAs('thumbnails', $thumbnail_name, 's3');
        }

        $this->data->video = $video_name;
        $this->data->thumbnail = $thumbnail_name;
        $this->data->user_id = Auth::id();
        $this->data->save();
        $feedId = $this->data->id;
        $eId = Crypt::encrypt($feedId);

        return redirect('feed/video/'.$eId)->With('success', 'Your video upload is successful');
    }

    public function get_single_feed($id)
    {
        $module = $this->module;
        $eId = Crypt::decrypt($id);
        $singleData = $this->data->find($eId);
        $checkRating = $this->rating->where('user_id', Auth::id())->Where('video_id', $eId)->first();

        $ratings = $this->rating->Where('video_id', $eId)->paginate(40);

        return view('site.'.$module.'.single', compact('module', 'singleData', 'checkRating', 'ratings'));
    }

    public function post_rating($id, Request $request)
    {
        $eId = Crypt::decrypt($id);

        $this->rating->user_id = Auth::id();
        $this->rating->video_id = $eId;
        $this->rating->rating = $request->star;
        $this->rating->Save();

        return redirect()->back()->with('success', 'Your rating is successfully submitted');
    }

}
