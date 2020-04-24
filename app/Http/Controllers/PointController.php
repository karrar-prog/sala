<?php

namespace App\Http\Controllers;

use App\Enums\PointCategory;
use App\Http\Requests\Request;
use App\Models\Point;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Mockery\Exception;

class PointController extends Controller
{
    public function index($c)
    {
        $mydatetime = Carbon::now();
        $mydate = $mydatetime->toDateString();

        $city = 0;
        if ($c == "1") {
            $allPoints = Point::OrderBy("t_number")->where("city", $city)->where("category", "<>", 4)->where('date', '<', $mydate)
                ->get();

        } elseif ($c == "2") {
            $allPoints = Point::OrderBy("t_number")->where("category", "<>", 4)->where('date', '=', $mydate)
                ->get();

        } else {
            $allPoints = DB::table('point')->where("category", "<>", 4)->where('date', "=", null)
                ->get();

        }
        $user_name = "";
        try {
            $user_name = session()->get("USER_NAME");

        } catch (Exception $s) {

        }


        $type3 = DB::table('point')->where("category", "<>", 4)->where('date', null)->count();
        $type2 = DB::table('point')->where("category", "<>", 4)->where('date', '=', $mydate)->count();
        $type1 = DB::table('point')->where("category", "<>", 4)->where('date', '<', $mydate)->count();
        return view('roadGuide.all_points')->with([
            "allPoints" => $allPoints, "user_name" => $user_name, "type1" => $type1, "type2" => $type2, "type3" => $type3]);
    }

    public function main()
    {
        $use_name = "";
        $phone = "";
        $his_name = "";
        $basket = "تجربة";
        $basket_day = 2;

        try {
            $use_name = session()->get("USER_NAME");
            $phone = session()->get("USER_USERNAME");

            $user = User::where("name", "=", $use_name)->first();
            $his_name = $user->his_name;
            if ($user) {
                $basket = $user->basket;
                $basket_day = $user->basket_days;

            }

        } catch (Exception $s) {

        }
        $mydatetime = Carbon::now();
        $mydate = $mydatetime->toDateString();


        $type3 = DB::table('point')->where("category", "<>", 4)->where('date', null)->count();
        $type2 = DB::table('point')->where("category", "<>", 4)->where('date', '=', $mydate)->count();
        $type1 = DB::table('point')->where("category", "<>", 4)->where('date', '<', $mydate)->count();
        $users = DB::table('user')->distinct()->get(['name']);
        return view("/about_app", ["user_name" => $use_name, "his_name" => $his_name, "phone" => $phone, "type1" => $type1, "type2" => $type2, "type3" => $type3, "users" => $users, "basket" => $basket, "basket_day" => $basket_day]);
    }

    public function getPublicPoints()
    {
        $source = Input::get("source");
        $destination = Input::get("destination");

        $publicPoints = Point::where("t_number", ">=", $source)
            ->where("t_number", "<=", $destination)
            ->where("category", PointCategory::PUBLIC)
            ->where("category", "<>", 4)
            ->get();

        return ["publicPoints" => $publicPoints];
    }

    public function shwoMaps()
    {
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

        $latAndLong = Point::orderBy('id')->where("category", "<>", 4)->get()->toArray();
        return view('roadGuide.maps', compact('latAndLong'), ["user_name" => $use_name, "type1" => $type1, "type2" => $type2, "type3" => $type3]);
    }

    function distance($lat1, $lon1, $lat2, $lon2, $unit)
    {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        } else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);

            if ($unit == "K") {
                return ($miles * 1.609344);
            } else if ($unit == "N") {
                return ($miles * 0.8684);
            } else {
                return $miles;
            }
        }
    }

}
