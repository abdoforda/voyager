<?php

namespace App\Widgets;

use App\Order as AppOrder;
use App\Partner as AppPartner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class Order extends BaseDimmer
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

        $count = AppOrder::where('status', 'new')->get()->count();
        $count2 = AppOrder::all()->count();

        $string = "أوردر جديد";
        $string2 = "أوردرات";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-people',
            'title'  => "{$count} {$string}",
            'text'   => "لديك {$count2} في قاعدة البيانات الخاصة بك. انقر على الزر أدناه لعرضهم",
            'button' => [
                'text' => $string2,
                'link' => route('voyager.orders.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/01.jpg'),
        ]));
    }

}
