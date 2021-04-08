<?php namespace App\Http\ViewComposers;

use App\Option;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class OptionComposer {

    public function includeData(View $view )
    {
        if (Cache::has('optionCache')){
            $option = Cache::get('optionCache');
        }else{
            $option = Option::first();
            Cache::forever('optionCache', $option);
        }

        $view->with('option', $option);
    }
}
