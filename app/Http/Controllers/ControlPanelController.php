<?php

namespace App\Http\Controllers;

use App\Enums\MajlesStatus;
use App\Models\Center;
use App\Models\Lost;
use App\Models\Majales;
use App\Models\Point;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ControlPanelController extends Controller
{
    //Management Majales
    public function managementMajales()
    {
        $majales = Majales::where("status", MajlesStatus::NO_ACTIVE)
            ->orderBy("id", "AES")
            ->get();

        return view("CP.majales")->with([
            "majales" => $majales
        ]);
    }

    public function acceptMajles()
    {
        $id = Input::get("id");
        $majles = Majales::find($id);
        if ($majles) {
            $majles->status = MajlesStatus::ACCEPT;
            $success = $majles->save();

            if ($success)
                return ["success" => true];
            else
                return ["success" => false];
        }

        return ["majles" => "notFound"];
    }

    public function rejectMajles()
    {
        $id = Input::get("id");
        $majles = Majales::find($id);

        if ($majles) {
            $majles->status = MajlesStatus::REJECT;
            $success = $majles->save();
            if ($success)
                return ["success" => true];
            else
                return ["success" => false];
        }

        return ["majles" => "notFound"];
    }

    public function deleteMajles()
    {
        $id = Input::get("id");
        $majles = Majales::find($id);

        if ($majles) {
            $success = $majles->delete();
            if ($success)
                return ["success" => true];
            else
                return ["success" => false];
        }

        return ["majles" => "notFound"];
    }

    //Management Centers
    public function centerLogin()
    {
        if (Cookie::has("CENTER_SESSION")) {
            $center = Center::where("session", "=", Cookie::get("CENTER_SESSION"))->first();

            if (!$center)
                return view("CP.centers.login");

            session()->put('CENTER_ID', $center->id);
            session()->put('CENTER_NAME', $center->name);
            session()->put('CENTER_T_NUMBER', $center->t_number);
            session()->put('CENTER_PHONE', $center->phone);
            session()->put('CENTER_SESSION', $center->session);
            session()->save();

            return redirect("/control-panel/center");
        }

        return view("CP.centers.login");
    }

    public function centerLoginValidation(Request $request)
    {
        $rules = [
            "username" => "required",
            "password" => "required"
        ];

        $rulesMessage = [
            "username.required" => "يرجى ادخال اسم المركز.",
            "password.required" => "يرجى ادخال كلمة المرور."
        ];

        $this->validate($request, $rules, $rulesMessage);


        $username = Input::get("username");
        $password = Input::get("password");

        $center = Center::where("username", "=", $username)->where("password", "=", $password)->first();

        if (!$center)
            return redirect("/control-panel/center/login")->with('ErrorRegisterMessage', "فشل تسجيل الدخول !!! أعد المحاولة مرة أخرى.");

        $center->session = md5(uniqid());
        $center->save();

        session()->put('CENTER_ID', $center->id);
        session()->put('CENTER_NAME', $center->name);
        session()->put('CENTER_T_NUMBER', $center->t_number);
        session()->put('CENTER_PHONE', $center->phone);
        session()->put('CENTER_SESSION', $center->session);
        session()->save();

        return redirect("/control-panel/center")->withCookie(cookie('CENTER_SESSION', $center->session, 1000000000));
    }

    public function centerLogout(Request $request)
    {
        $center = Center::where("session", "=", Cookie::get("CENTER_SESSION"))->first();

        if (!$center)
            return redirect("/control-panel/center/login");

        $center->session = null;
        $center->save();

        session()->remove("CENTER_ID");
        session()->remove("CENTER_NAME");
        session()->remove("CENTER_T_NUMBER");
        session()->remove("CENTER_PHONE");
        session()->remove("CENTER_SESSION");
        session()->save();

        $cookie = Cookie::forget("CENTER_SESSION");

        return redirect("/control-panel/center/login")->withCookie($cookie);
    }

    public function managementCenter()
    {
        return view("CP.centers.main");
    }

    public function addLost()
    {
        return view("CP.centers.add-lost");
    }

    public function addLostValidation(Request $request)
    {
        $rules = [
            "category" => "required|numeric|between:1,6",
            "des_ar" => "required",
            "file" => "file|image|min:50|max:2048",
        ];

        $rulesMessage = [
            "category.required" => "يجب اختيار الصنف.",
            "category.numeric" => "انت تقوم بأرسال بيانات بصورة غير صحيحة.",
            "category.between" => "لم تقم بأختيار الصنف بشكل صحيح.",
            "des_ar.required" => "يجب ذكر الوصف في اللغة العربية.",
            "file.file" => "انت تحاول رفع ملف ليس بصورة.",
            "file.image" => "انت تحاول رفع ليس بصورة.",
            "file.min" => "انت تقوم برفع صورة صغيرة جداً.",
            "file.max" => "حجم الصورة يجب ان لايتعدى 2048KB."
        ];

        $this->validate($request, $rules, $rulesMessage);

        $lost = new Lost();

        $lost->center_id = Session()->get("CENTER_ID");
        $lost->category = Input::get("category");
        $lost->description = Input::get("des_ar");
        $lost->datetime = date("Y-m-d H:i:s");

        if (!is_null(request()->file("file"))) {
            $Path = Storage::putFile('public/img/lost', request()->file("file"));
            $imagePath = explode('/', $Path);
            $lost->file_name = $imagePath[3];
        }

        $success = $lost->save();

        if (!$success)
            return redirect("/control-panel/center/add-lost")->with('AddLostMessage', "لم تتم عملية اضافة التائه او المفقود بنجاح!!! حاول مرة اخرى.");

        return redirect("/control-panel/center/add-lost")->with('AddLostMessage', "تمت عملية اضافة التائه او المفقود بنجاح.");
    }

    public function createAutoCenters()
    {

        for ($i = 1; $i <= 40; $i++) {
            //Generate Auto Password
            $password = $i . time() . "2018";
            $password = md5(uniqid($password));
            $password = "center_" . substr($password, 10, 10);

            $center = new Center();

            $center->name = "مركز ارشاد التائهين رقم-" . $i;
            $center->username = "center-" . $i;
            $center->password = $password;
            $center->t_number = 0;
            $center->session = null;
            $center->date = Date("Y-m-d");
            $center->phone = 0;

            $center->save();
        }
    }

    public function nearby(Request $request)
    {
        $city = 0;
        $updates = DB::table('point')
            ->where('date', '1990-07-17')
            ->delete();

        $input_latitude = $request->get("latitude");
        $input_longitude = $request->get("longitude");
        $point = new Point();
        $point->name = session()->get("USER_NAME");
        $point->city = 0;
        $mytime = Carbon::now();
        $point->description = $mytime->toDateTimeString() . "   \n " . "   ( المتطوع : " . session()->get("USER_USERNAME") . ")";
        $point->date = '1990-07-17';
        $point->t_number = session()->get("USER_USERNAME");
        $point->category = 4;
        $point->latitude = $input_latitude;
        $point->longitude = $input_longitude;

        $point->save();
        $use_name = "";
        try {
            $use_name = session()->get("USER_NAME");

        } catch (Exception $s) {

        }
        $mydatetime = Carbon::now();
        $mydate = $mydatetime->toDateString();
        $type3 = DB::table('point')->where("category", "<>", 4)->where('date', null)->count();
        $type2 = DB::table('point')->where("category", "<>", 4)->where('date', '=', $mydate)->count();
        $type1 = DB::table('point')->where("category", "<>", 4)->where('date', '<', $mydate)->count();

        $latAndLong = Point::orderBy('id')->get()->toArray();
        return view('roadGuide.maps', compact('latAndLong'), ["user_name" => $use_name, "type1" => $type1, "type2" => $type2, "type3" => $type3]);

//        return redirect("/map")->with('message', "تمت اضافة العائلة - شكرا لك ");

    }


    public function contact()
    {
        return view('user.contact');

    }

    public function my_activity()
    {
        return view('user.my_activity');

    }

    public function nearone(Request $request)
    {
        $city = 0;
        $updates = DB::table('point')
            ->where('date', '1990-07-17')
            ->update(['date' => null]);

        $input_latitude = $request->get("latitude");
        $input_longitude = $request->get("longitude");
        $input_latitude2 = $request->get("latitude2");
        $input_longitude2 = $request->get("longitude2");
        $point = new Point();
        $point->name = session()->get("USER_NAME");
        $point->city = 0;
        $mytime = Carbon::now();
        $point->description = $mytime->toDateTimeString() . "   \n " . "   ( المتطوع : " . session()->get("USER_USERNAME") . ")";
        $point->date = '1990-07-17';
        $point->t_number = session()->get("USER_USERNAME");
        $point->category = 4;
        $point->latitude = $input_latitude;
        $point->longitude = $input_longitude;

        $point->save();
        $use_name = "";
        try {
            $use_name = session()->get("USER_NAME");

        } catch (Exception $s) {

        }

        $latAndLong = Point::orderBy('id')->where('latitude', $input_latitude)->where('longitude', $input_longitude)->orWhere('latitude2', $input_latitude2)->where('longitude2', $input_longitude2)->get()->toArray();
        return view('roadGuide.maps', compact('latAndLong'), ["user_name" => $use_name]);

//        return redirect("/map")->with('message', "تمت اضافة العائلة - شكرا لك ");

    }

    //Management Points
    public function new_point()
    {
        return view("CP.point.new_point");
    }

    public function insert_point(Request $request)
    {

        $point = new Point();
        $point->name = Input::get("name");
        $point->description = Input::get("description");
        $point->city = Input::get("city");
        $point->t_number = Input::get("t_number");
        $point->category = Input::get("category");
        $point->f1 = Input::get("f1");
        $point->f2 = Input::get("f2");
        $point->f3 = Input::get("f3");
        $point->f4 = Input::get("f4");

        $point->treat = Input::get("treat");
        $point->childe = Input::get("childe");
        $point->desise = Input::get("desise");
        $point->single = Input::get("single");
        $point->childe_without = Input::get("childe_without");
        $point->father = Input::get("father");
        $point->admin_name = Input::get("admin_name");
        $point->type = Input::get("type");
        $point->latitude = Input::get("latitude");
        $point->longitude = Input::get("longitude");
        $user_name = session()->get("USER_NAME");

        $pointExisit = Point::where("f1", $point->f1)->first();
        if ($pointExisit) {
            $message = "تمت تسجيل هذه العائلة من قبل  بواسطة -  " . $pointExisit->username . "     رقم العائلة =    " . $pointExisit->id;
            return redirect("/new_family")->with('message', $message)->with('id', $pointExisit->id);

        }
        $pointExisit = Point::where("t_number", $point->t_number)->first();
        if ($pointExisit) {
            $message = "تمت تسجيل هذه العائلة من قبل  بواسطة -  " . $pointExisit->username . "     رقم العائلة =    " . $pointExisit->id;
            return redirect("/new_family")->with('message', $message)->with('id', $pointExisit->id);

        }

        if ($user_name) {
//            $mydatetime = Carbon::now()->addDay(-1);
            $mydatetime = Carbon::now();
            $mydate = $mydatetime->toDateString();
            $point->date = $mydate;
            $point->username = $user_name;
            $message = "تمت اضافة العائلة - شكرا لك " . $user_name;


        }else
        {
            $message = " شكرا لك " .   Input::get("name") . " تم استلام معلومات عائلتك - سوف تتواصل معكم فرق الخير عن قريب لتقديم المساعدة " ;

        }
        if ($point->save()) {
            return redirect("/")->with('message',$message);

        } else {
            return redirect("/")->with('message', "لم تتم العملية ");

        }


    }
    public function edit_basket(Request $request)
    {
        $basket = $request->get("basket");
        $basket_day = $request->get("basket_day");
        try {
            $USER_NAME = session()->get("USER_NAME");
            if ($USER_NAME) {


                    DB::table('user')
                        ->where('name', $USER_NAME)
                        ->update(['basket' => $basket  , 'basket_days' => $basket_day]);

                    return    redirect("/");



            } else {
                return   redirect("/login");

            }

        } catch (Exception $s) {
            return  redirect("/login");

        }

    }
    public function show_help($id)
    {
        try {
            $USER_NAME = session()->get("USER_NAME");
            $user_info = User::where("name" ,$USER_NAME )->first();
             if ($user_info) {
                 $point_id = $id;

                 $basket = $user_info->basket;
                $basket_day = $user_info->basket_days;

                return   view("/show_help",["basket"=>$basket,"point_id"=>$point_id,"basket_day"=>$basket_day]);



            } else {
                return   redirect("/login");

            }

        } catch (Exception $s) {
            return  redirect("/login");

        }

    }

    public function valid_point($id)
    {

        $name = "";
        $user_name = session()->get("USER_NAME");
        $user_phone = session()->get("USER_USERNAME");
        if ($user_name) {
            $point = Point::find($id);

            $mydatetime = Carbon::now()->addDay(-1);;
            $mydate = $mydatetime->toDateString();
            $point->date = $mydate;
            $point->username = $user_name;
            $name = $point->name;

            $point->userphone = $user_phone;
            $point->save();


        }

        return redirect("/single/$id")->with('message', "تمت توثيق عائلة ( " . $name . " ) - شكرا لك ");


    }

    public function arrived_now(Request $request)
    {

        $name = "";
        $user_name = session()->get("USER_NAME");
        $user_phone = session()->get("USER_USERNAME");

        $id = $request->get("id");
        $basket = $request->get("basket");
        $basket_days = $request->get("basket_day");
        if ($user_name) {
            $point = Point::find(trim($id));
            $mydatetime = Carbon::now();
            $mydate = $mydatetime->toDateString();
            $point->date = $mydate;
            $point->arrived_now = $user_name;
            $name = $point->name;
            $point->userphone = $user_phone;
            $point->save();


        }

        return redirect("/")->with('message', "تم الوصول الى عائلة ( " . $name . " ) - شكرا لك ");

    }

    public function family_search(Request $request)
    {
        $days = $request->get("t_day");

        if ($days) {
            $new_date = Carbon::now()->addDay(-value($days));
            $true_date = Carbon::parse($new_date)->format('yy-m-d');

            $allPoints = Point::whereDate('date', '<', $true_date)->orWhere('date', null)->orderBy("date", "desc")->paginate(50);


        } else {
            $t_search = $request->get("t_search");

            $allPoints = Point::where('name', 'like', '%' . $t_search . '%')->orWhere('t_number', 'like',  $t_search )->orWhere('description', 'like', '%' . $t_search . '%')->orWhere('id', $t_search)->orderBy("date", "desc")->paginate(50);

        }


        $mydatetime = Carbon::now();
        $mydate = $mydatetime->toDateString();


        $use_name = "";
        try {
            $use_name = session()->get("USER_NAME");

        } catch (Exception $s) {

        }
        $type3 = DB::table('point')->where("category", "<>", 4)->where('date', null)->count();
        $type2 = DB::table('point')->where("category", "<>", 4)->where('date', '=', $mydate)->count();
        $type1 = DB::table('point')->where("category", "<>", 4)->where('date', '<', $mydate)->count();
        return view('roadGuide.all_point2')->with([
            "allPoints" => $allPoints, "user_name" => $use_name, "type1" => $type1, "type2" => $type2, "type3" => $type3]);
    }

    public function all_point()
    {
        $username = session()->get("USER_NAME");
        if ($username) {
            $points = Point::where("username", $username)->orderBy("date", "desc")->paginate(50);
            return view("/CP/point/all_point", ["points" => $points]);
        } else {
            return view('user.contact');

        }

    }

    public function single($id)
    {
        $user_name = session()->get("USER_NAME");
        $user_phone = session()->get("USER_USERNAME");
        if ($user_name) {
            $points = Point::where("id", $id)->get();
//            return view("/CP/point/all_point", ["points" => $points, "user_name" => $user_name]);
            return view("/roadGuide/all_points", ["allPoints" => $points, "user_name" => $user_name]);
        } else {
            redirect("/login");
        }


    }


    public function my_family()
    {
        $name = session()->get("USER_NAME");
        if ($name) {

            $points = Point::where('username', $name)->orderBy("date", "desc")->paginate(50);
            $user_name = "";
            try {
                $user_name = session()->get("USER_NAME");

            } catch (Exception $s) {

            }
//            return view("/CP/point/all_point", ["points" => $points, "user_name" => $user_name]);
            return view("/roadGuide/all_points", ["allPoints" => $points, "user_name" => $user_name]);
        } else {


            redirect("/");
        }

    }
   public function my_family2()
    {
        $name = session()->get("USER_NAME");
        if ($name) {

            $points = Point::where('username', $name)->orderBy("date", "desc")->paginate(50);
            $user_name = "";
            try {
                $user_name = session()->get("USER_NAME");

            } catch (Exception $s) {

            }
//            return view("/CP/point/all_point", ["points" => $points, "user_name" => $user_name]);
            return view("/roadGuide/all_point2", ["allPoints" => $points, "user_name" => $user_name]);
        } else {


            redirect("/");
        }

    }

    public function edit_point($id)
    {
        $points = Point::where("id", $id)->get();
        return view("/CP/point/edit_point", ["points" => $points]);

    }

    public function update_point($id)
    {

        $point = Point::find($id);
        $point->name = Input::get("name");
        $point->description = Input::get("description");
        $point->t_number = Input::get("t_number");
        $point->category = Input::get("category");
        $point->latitude = Input::get("latitude");
        $point->longitude = Input::get("longitude");

        if ($point->save()) {
            $mesaage = "تم التعديل";
        } else {
            $mesaage = "لم يتم التعديل";
        }


        return redirect("/123456789123456789/all_point")->with('message', $mesaage);

    }

    public function ensure_delete($id)
    {

        if (session()->get("USER_NAME")) {
            return view("/CP/point/ensure_delete", ["id" => $id]);

        } else {
            return view("/");

        }

    }

    public function delete_point($id)
    {
        if (session()->get("USER_NAME")) {
            $point = Point::find($id);

            if ($point->delete()) {
                $mesaage = "تم الحذف";
            } else {
                $mesaage = "لم يتم الحذف";
            }


            return redirect("/my_family")->with('message', $mesaage);

        } else {
            $mesaage = "ليس لديك الصلاحية";
            return redirect("/my_family")->with('message', $mesaage);
        }

    }


}
