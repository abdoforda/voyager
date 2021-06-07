<?php

namespace App\Widgets;

use App\Partner as AppPartner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class Partner extends BaseDimmer
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


        $count = AppPartner::where('status', 'new')->get()->count();
        $count2 = AppPartner::all()->count();

        $string = "شريك جديد";
        $string2 = "شركاء جديد";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-people',
            'title'  => "{$count} {$string}",
            'text'   => "لديك {$count2} في قاعدة البيانات الخاصة بك. انقر على الزر أدناه لعرضهم",
            'button' => [
                'text' => $string2,
                'link' => route('voyager.partners.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/01.jpg'),
        ]));
    }

}
