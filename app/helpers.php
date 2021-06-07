<?PHP

use App\Notifications\LinkZoom;
use App\Zoom;
use Stevebauman\Location\Facades\Location;


function state(){

    if(auth()->user()){
        return auth()->user()->state;
    }
    if(session()->has('state')){
        return session()->get('state');
    }

    if ($position = Location::get()) {
        if($position->countryName == "Saudi Arabia"){
            session()->put('state', 'price_sar');
            return "price_sar";
        }
        if($position->countryName == "Egypt"){
            session()->put('state', 'price_eg');
            return "price_eg";
        }
        return "price";
    } 

    return "price";
}

function checknotification(){

    if(auth()->user()){
    $array = [];
foreach (auth()->user()->notifications as $notification) {
    array_push($array, $notification->data['product']);
}

$zooms = Zoom::all();
foreach($zooms as $zoom){
    if($zoom->product->purchased() && !in_array($zoom->product->id,$array)){
        $data = [
            'zoom'=> $zoom->id,
            'product'=> $zoom->product->id
        ];
        auth()->user()->notify(new LinkZoom($data));
    }
}
}
}

function notification(){
    if(auth()->user()){
        return count(auth()->user()->unreadNotifications );
    }
    return 0;
}