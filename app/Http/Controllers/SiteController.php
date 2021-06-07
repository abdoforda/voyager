<?php

namespace App\Http\Controllers;

use App\Letter;
use App\News;
use App\Notification as AppNotification;
use App\Number;
use App\Opinion;
use App\Page;
use App\Product;
use App\Slidshow;
use App\Teacher;
use App\User;
use App\VideoStream;
use App\Zoom;
use Armancodes\DownloadLink\Models\DownloadLink;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Iman\Streamer\VideoStreamer;
use MagicLink\Actions\DownloadFileAction;
use MagicLink\Actions\LoginAction;
use MagicLink\MagicLink;

class SiteController extends Controller
{
    public function test(){

        $video_path = asset('storage/products/May2021/uFi0uzqz4jq5bBHT5B9S.mp4');
        $s = VideoStreamer::streamFile($video_path);
        $s->start();
        
    }

    public function index(){
        
        $number = Number::find(1);
        $slidshows = Slidshow::all();
        $products  = Product::all();
        $news  = News::all();
        $opinions  = Opinion::all();
        return view('front.welcome', compact('slidshows','products','number','news','opinions'));
    }

    public function notifications(){
        return view('front.notifications');
    }

    public function notification_read($notifi){
        $notification = AppNotification::find($notifi);
         if($notification->notifiable_id != auth()->user()->id){
             return redirect('/');
         }
         
        return view('front.notification_read', compact('notifi'));
    }

    public function pageShow($title){
        $page = Page::where('title',$title)->firstOrFail();
        return view('front.page', compact('page'));
    }

    public function privacy(){
        $page = Page::find(2);
        return view('front.privace', compact('page'));
    }

    public function contact(){
        return view('front.contact');
    }

    public function product($name){
        $product  = Product::where('name',$name)->firstOrFail();
        $products = Product::where('type',$product->type)->get();
        return view('front.product', compact('product','products'));
    }

    public function exam($name){
        $product  = Product::where('name',$name)->firstOrFail();
        $exam = $product->exam;
        $questions = explode("\n", $exam->questions);
        return view('front.exam', compact('product','questions','exam'));
    }

    public function cart(){
        $carts = Auth()->user()->carts;
        return view('front.cart', compact('carts'));
    }

    public function programs(){
        $title = "البرامج التدريبية";
        $products = Product::where('type', 'programs')->get();
        return view('front.programs', compact('products','title'));
    }

    public function bags(){
        $title = "الحقائب التدريبية";
        $products = Product::where('type', 'bags')->get();
        return view('front.programs', compact('products','title'));
    }

    public function studies(){
        $title = "دراسات جدوى";
        $products = Product::where('type', 'studies')->get();
        $letters = Letter::all();
        return view('front.programs', compact('products','title','letters'));
    }

    public function products(){
        $title = "المنتجات";
        $products = Product::where('type', 'products')->get();
        return view('front.programs', compact('products','title'));
    }

    public function teacher(Request $request){
        $title = "المدرس";
        $teacher = Teacher::findOrFail($request->id);
        return view('front.teacher', compact('teacher'));
    }

    public function blog(Request $request){
        
        $blog = Letter::where('name',$request->name)->firstOrFail();
        $title = $blog->name;

        return view('front.blog', compact('blog'));
    }

    public function checkout(){
        $carts = Auth()->user()->carts;
        return view('front.checkout', compact('carts'));
    }

    public function order_study(){
        return view('front.order_study');
    }

    public function thanks(){
        return view('front.thanks');
    }

    
    

    
  
    
}
