<?php

namespace App\Widgets;

use App\Feasibility as AppFeasibility;
use TCG\Voyager\Widgets\BaseDimmer;

class Feasibility extends BaseDimmer
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

        $count = AppFeasibility ::where('status', 'new')->get()->count();
        $count2 = AppFeasibility::all()->count();

        $string = "طلب دراسة جدوي";
        $string2 = "دراسات جدوي";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-people',
            'title'  => "{$count} {$string}",
            'text'   => "لديك {$count2} في قاعدة البيانات الخاصة بك. انقر على الزر أدناه لعرضهم",
            'button' => [
                'text' => $string2,
                'link' => route('voyager.feasibilitys.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }

}
