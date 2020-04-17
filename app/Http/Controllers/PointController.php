<?php

namespace App\Http\Controllers;

use App\Enums\PointCategory;
use App\Models\Point;
use Illuminate\Support\Facades\Input;
use Mockery\Exception;

class PointController extends Controller
{
    public function index($c)
    {
        $city = 0;

        $allPoints = Point::OrderBy("t_number")->where("city",$city)->where("category",$c)
            ->get();

        $use_name ="";
        try
        {
            $use_name =  session()->get("USER_NAME");

        }catch (Exception $s){

        }
        return view('roadGuide.all_points')->with([
            "allPoints" => $allPoints,"user_name"=>$use_name]);
    }
    public function main()
    {
        $use_name ="";
        $phone = "";
        try
        {
            $use_name =  session()->get("USER_NAME");
            $phone =  session()->get("USER_USERNAME");

        }catch (Exception $s){

        }

       return view("/about_app",["user_name"=>$use_name , "phone"=>$phone]);
    }

    public function getPublicPoints()
    {
        $source = Input::get("source");
        $destination = Input::get("destination");

        $publicPoints = Point::where("t_number", ">=", $source)
            ->where("t_number", "<=", $destination)
            ->where("category", PointCategory::PUBLIC)
            ->get();

        return ["publicPoints" => $publicPoints];
    }

    public function shwoMaps ()
    {
        $use_name ="";
        try
        {
            $use_name =  session()->get("USER_NAME");

        }catch (Exception $s){

    }

        $latAndLong = Point::orderBy('id')->get()->toArray();
        return view('roadGuide.maps',compact('latAndLong'),["user_name"=>$use_name]);
    }
}
