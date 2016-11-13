<?php
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 11/13/16
 * Time: 10:07 AM
 */

namespace App\Classes;


use App\classifieds;

class listingsClass
{
    public function pullDateTime($dateTime)
    {
        $listings = classifieds::where('created_at', '>', $dateTime)
            ->where('is_active', '=', '1')->get();

        return $listings;
    }
}