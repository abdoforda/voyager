<?php

namespace App\Widgets;

use App\Advisor as AppAdvisor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class Advisor extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {


        $count = AppAdvisor::where('status', 'new')->get()->count();
        $count2 = AppAdvisor::all()->count();
        $string = "مستشار جديد";
        $string2 = "مستشاريين جديد";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-study',
            'title'  => "{$count} {$string}",
            'text'   => "لديك {$count2} في قاعدة البيانات الخاصة بك. انقر على الزر أدناه لعرضهم",
            'button' => [
                'text' => $string2,
                'link' => route('voyager.advisors.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }

}
