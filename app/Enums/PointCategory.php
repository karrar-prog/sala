<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/30/2018
 * Time: 9:17 AM
 */

namespace App\Enums;


class PointCategory
{
    const MAWAKEP = 1;
    const HEMAMAT = 2;
    const PUBLIC = 3;
    const LOST_CENTER = 4;
    const REFERENDUM_CENTER = 5;
    const MEDICAL_CENTER = 6;




    public static function getCategoryColor($category) {
        switch ($category) {
            case "1": return "green"; break;
            case "2": return "brown"; break;
            case "3": return "pink"; break;
            case "4": return "orange"; break;
            case "5": return "yellow"; break;
            case "6": return "teal"; break;
        }
        return "";
    }

    public static function getCategoryIcon($category) {
        switch ($category) {
            case "1": return "maps-icon/1.png"; break;
            case "2": return "maps-icon/2.png"; break;
            case "3": return "maps-icon/3.png"; break;
            case "4": return "maps-icon/4.png"; break;
            case "5": return "maps-icon/5.png"; break;
            case "6": return "maps-icon/6.png"; break;
        }
        return "";
    }
}