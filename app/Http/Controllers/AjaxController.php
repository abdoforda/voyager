<?php

namespace App\Http\Controllers;

use App\Advisor;
use App\Cart;
use App\Certificate;
use App\Coach;
use App\Email;
use App\Employee;
use App\Evaluation;
use App\Exam;
use App\Feasibility;
use App\File;
use App\Partner;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use MagicLink\Actions\DownloadFileAction;
use MagicLink\MagicLink;

class AjaxController extends Controller
{
    

    

    public function userUpdate(Request $request){

        $request->validate([
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $check = Hash::check($request->old_password, Auth::user()->password);
        if (!$check) {
            return response()->json(['errors' => array([0 => "كلمة المرور القديمة غير صحيحة"])], 422);
        }

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['success' => 'تم حفظ التعديلات'], 200);

        
        return "asdsadsad";
    }

    public function coache(Request $request){

        $request->validate([
            'name'              => ['required', 'min:4', 'string'],
            'field_of_training' => ['required', 'min:4', 'string'],
            'email'             => ['required', 'email'],
            'curriculum_vitae'  => ['required', 'file','max:5120'],
        ]);

        $filesPath = new File();
        $f = $filesPath->storage($request->file('curriculum_vitae'), 'coaches');
        

        $coach = new Coach();
        $coach->name = $request->name;
        $coach->field_of_training = $request->field_of_training;
        $coach->email = $request->email;
        $coach->curriculum_vitae = $f;
        $coach->save();
        
        return response()->json(['message'=>"تم ارسال بيانات كـ مدرب سيتم التواصل معك قريبا"], 200);

    }

    public function advisor(Request $request){

        $request->validate([
            'name'              => ['required', 'min:4', 'string'],
            'The_consulting_field' => ['required', 'min:4', 'string'],
            'email'             => ['required', 'email'],
            'curriculum_vitae'  => ['required', 'file','max:5120'],
        ]);

        $filesPath = new File();
        $f = $filesPath->storage($request->file('curriculum_vitae'), 'advisor');
        

        $coach = new Advisor();
        $coach->name = $request->name;
        $coach->The_consulting_field = $request->The_consulting_field;
        $coach->email = $request->email;
        $coach->curriculum_vitae = $f;
        $coach->save();
        
        return response()->json(['message'=>"تم ارسال بيانات كـ مستشاري سيتم التواصل معك قريبا"], 200);

        
    }

    public function partner(Request $request){

        $request->validate([
            'name'              => ['required', 'min:4', 'string'],
            'email'             => ['required', 'email'],
            'company_name'      => ['required', 'min:4', 'string'],
            'job_title'         => ['required', 'min:4', 'string'],
            'company_profile'   => ['required', 'file','max:5120'],
        ]);

        $filesPath = new File();
        $f = $filesPath->storage($request->file('company_profile'), 'partner');
        

        $coach = new Partner();
        $coach->name = $request->name;
        $coach->email = $request->email;
        $coach->company_name = $request->company_name;
        $coach->job_title = $request->job_title;
        $coach->company_profile = $f;
        $coach->save();
        
        return response()->json(['message'=>"تم ارسال بيانات كـ شريك نجاح سيتم التواصل معك قريبا"], 200);

        

    }

    public function employee(Request $request){

        
        $request->validate([
            'name'              => ['required', 'min:4', 'string'],
            'email'             => ['required', 'email'],
            'job_title'         => ['required', 'min:4', 'string'],
            'curriculum_vitae'   => ['required', 'file','max:5120'],
        ]);

        $filesPath = new File();
        $f = $filesPath->storage($request->file('curriculum_vitae'), 'employee');
        

        $coach = new Employee();
        $coach->name = $request->name;
        $coach->email = $request->email;
        $coach->job_title = $request->job_title;
        $coach->curriculum_vitae = $f;
        $coach->save();
        
        return response()->json(['message'=>"تم ارسال بيانات كـ موظف سيتم التواصل معك قريبا"], 200);

        
    }

    public function email(Request $request){

        
        $request->validate([
            'name'              => ['required', 'min:4', 'string'],
            'email'             => ['required', 'email'],
            'subject'           => ['required', 'min:4', 'string'],
            'message'           => ['required', 'min:4', 'string'],
        ]);

        $coach = new Email();
        $coach->name = $request->name;
        $coach->email = $request->email;
        $coach->subject = $request->subject;
        $coach->message = $request->message;
        $coach->save();
        
        return response()->json(['message'=>"تم إرسال رسالتك وسيتم الرد عليك قريبا"], 200);

        
    }

    public function download(Request $request){

        $product = Product::find($request->id);
        if($product->pricee() > 0 and !$product->purchased()){
            return response()->json(['errors'=>['يجب شراء المنتج لتتمكن من التحميل']], 400);  
        }

        $x=0;
        foreach(json_decode($product->files) as $index=> $file){
            $d = explode('.',$file->original_name);
            $file->original_name = $d[0];
            if($x == $request->down){
                $download_link = $file->download_link;
            }
            $x++;
        }

        //$urlToDashBoard = MagicLink::create(new LoginAction(User::first(), redirect('/admin')), null, 1)->url;
        $num = rand(5000000000000, 15000000000000);
        $ex = explode('.', $download_link);
        foreach($ex as $ext){
            $ext = $ext;
        }

        $lifetime = null; // not expired in the time
        $numMaxVisits = 2;

        $urlToDashBoard = MagicLink::create(new DownloadFileAction($download_link, $num.'.'.$ext), $lifetime, $numMaxVisits)->url;
        return $urlToDashBoard;
    }


    public function videoWatch(Request $request){

        $product = Product::find($request->id);
        if($product->pricee() > 0 and !$product->purchased()){
            return response()->json(['errors'=>['يجب شراء المنتج لتتمكن من المشاهدة']], 400);  
        }

        $file = json_decode($product->video);
        $download_link = $file[0]->download_link;
        $num = rand(5000000000000, 15000000000000);
        $ex = explode('.', $download_link);
        foreach($ex as $ext){
            $ext = $ext;
        }

        $urlToDashBoard = MagicLink::create(new DownloadFileAction($download_link, $num.'.'.$ext), null , 3)->url;
        return $urlToDashBoard;
    }


    public function delete_cart(Request $request){
        
        $cart = Cart::where([
            ['id',$request->id],
            ['user_id',auth()->user()->id]
        ])->get()->count();
        
        if($cart != 0){
            Cart::find($request->id)->delete();
            return "deleted ok";
        }

        return response()->json(['errors'=>["ليس لك صلاحية الحذف هذه"]], 400);
    }

    public function delete_all_cart(){
        
        foreach(auth()->user()->carts as $cart){
            $cart->delete();
        }
        return "deleted ok";

    }

    
    public function add_to_cart(Request $request){
        
        $product = Product::find($request->id);

        if($product->pricee() == 0){
            return response()->json(['errors'=>["المنتج مجاني لا داعي للإضافة"]], 400);
        }

        $cart = Cart::where([
            ['product_id',$request->id],
            ['user_id',auth()->user()->id]
        ])->get()->count();
        
        if($cart == 0){
            $cart = new Cart();
            $cart->product_id = $request->id;
            $cart->user_id = auth()->user()->id;
            $cart->count = 1;
            $cart->save();
            return $cart;
        }

        return response()->json(['errors'=>["تم إضافة المنتج من قبل في السلة"]], 400);

    }

    
    public function update_cart(Request $request){
        
        $cart = Cart::where([
            ['id',$request->id],
            ['user_id',auth()->user()->id]
        ])->get()->count();
        
        if($cart != 0 and $request->count >= 1){
            $cart = Cart::find($request->id);
            $cart->count = $request->count;
            $cart->save();

            return $cart->priceTotal();
        }
        return response()->json(['errors'=>["لا تملك تصريح للتعديل"]], 400);
    }

    public function buy_now(Request $request){

    
        $request->validate([
            'name'              => ['required', 'min:4', 'string'],
            'email'             => ['required', 'email'],
            'payment_methods'   => ['required'],
            'state'             => ['required'],
            'zone'              => ['required'],
            'zip'               => ['required'],
            'address'           => ['required'],
            'card_number'       => ['required','size:16'],
            'exp_month'         => ['required','size:2'],
            'exp_year'          => ['required','size:4'],
            'security'          => ['required','size:3'],
        ]);

        //check card success
        if($request->card_number != "6666666666666666"){
            return response()->json(['errors'=>['لا يوجد رصيد كافي في بطاقة الدفع']], 400); 
        }

        $order = auth()->user()->createOrder();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->payment_methods = $request->payment_methods;
        $order->state = $request->state;
        $order->zone = $request->zone;
        $order->zip = $request->zip;
        $order->card_number = $request->card_number;
        $order->exp_month = $request->exp_month;
        $order->exp_year = $request->exp_year;
        $order->security = $request->security;
        $order->address = $request->address;
        $order->save();
        
        return response()->json(['message'=>['confirmed order']], 200);

    }
    
    public function subExam(Request $request){
        $exam = Exam::findOrFail($request->id_exam);
        $questions = explode("\n", $exam->questions);

        if($exam->checkExam()){
            return response()->json(['errors'=>['لقد أختبرت هذا الإختبار من قبل']], 400); 
        }

        if((count($request->toArray()) - 2) != count($questions)){
            return response()->json(['errors'=>['من فضلك أجب عن جميع الأسئلة']], 400); 
        }

        $success = 0;
        foreach ($questions as $index => $items){

            
            $ex = explode('[', $items);
            $qo = explode(']', $ex[1]);
            $question = $qo[0];

            $ans = explode(']', $ex[3]);
            $answer = $ans[0];
            $name = "question".$index;
            if($request->$name == $answer){
                $success++;
            }
            
        }

        $certificate = new Certificate();
        $certificate->user_id = auth()->user()->id;
        $certificate->exam_id = $request->id_exam;
        $certificate->result = $success;
        $certificate->result_all = count($questions);
        $certificate->save();


        return response()->json(['message'=>["لقد حصلت علي ".$success." علامه من أصل ".count($questions).""]], 200);
        
    }

    public function evaluation(Request $request){

        
        $evals = Evaluation::where([
            ['product_id', $request->product],
            ['user_id', auth()->user()->id]
        ])->get()->first();
        if($evals){
            $evals->value = $request->value;
            $evals->save();
            return $evals;
        }
        $eva = new Evaluation();
        $eva->product_id = $request->product;
        $eva->value = $request->value;
        $eva->user_id = auth()->user()->id;
        $eva->save();
        return $eva;

    }

    public function order_study(Request $request){
        
        $request->validate([
            'name' => ['required', 'min:4', 'string'],
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'country' => ['required'],
            'type' => ['required'],
            'entity' => ['required'],
            'project' => ['required']
        ]);

        $feasibility = new Feasibility();
        $feasibility->name = $request->name;
        $feasibility->phone = $request->phone;
        $feasibility->email = $request->email;
        $feasibility->country = $request->country;
        $feasibility->type = $request->type;
        $feasibility->entity = $request->entity;
        $feasibility->project = $request->project;
        $feasibility->save();

        return response()->json(['message'=>["تم إرسال طلبك وسيتم التواصل معك قريبا"]], 200);
           
    }

    
}
