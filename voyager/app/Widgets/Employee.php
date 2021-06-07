<?php

namespace App\Widgets;

use App\Employee as AppEmployee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class Employee extends BaseDimmer
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


        $count = AppEmployee::where('status', 'new')->get()->count();
        $count2 = AppEmployee::all()->count();
        $string = "موظف جديد";
        $string2 = "موظفين جديد";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-person',
            'title'  => "{$count} {$string}",
            'text'   => "لديك {$count2} في قاعدة البيانات الخاصة بك. انقر على الزر أدناه لعرضهم",
            'button' => [
                'text' => $string2,
                'link' => route('voyager.employees.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

}
