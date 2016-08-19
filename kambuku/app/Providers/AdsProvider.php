<?php

namespace App\Providers;

use App\pageAds;
use App\paidAdverts;
use Illuminate\Support\ServiceProvider;

class AdsProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        $this->homeStandardBlocks();

        $this->homeStripAds();

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function homeStandardBlocks()
    {
        view()->composer('partials.adverts.homePageStandardBlocks', function ($view) {
            $landingAds = pageAds::wherePage_name('landing')
                ->whereIs_active('1')
                ->get();

            $adDetails = []; //array for display

            foreach ($landingAds as $ad) {

                $temp = paidAdverts::whereId($ad->advert_id)
                    ->first()
                    ->toArray();

                if ($temp['ad_type'] == '2' or $temp['ad_type'] == '3') {
                    $adDetails = array_add($adDetails, $temp['ad_name'], $temp);
                }
            }


            $view->with('adDetails', $adDetails);
        });
    }

    private function homeStripAds()
    {
        view()->composer('partials.adverts.homeStripAds', function ($view) {
            $landingAds = pageAds::wherePage_name('landing')
                ->whereIs_active('1')
                ->get();

            $adDetails = []; //array for display

            foreach ($landingAds as $ad) {

                $temp = paidAdverts::whereId($ad->advert_id)
                    ->first()
                    ->toArray();

                if ($temp['ad_type'] == '1') {
                    $adDetails = array_add($adDetails, $temp['ad_name'], $temp);
                }
            }

            $view->with('adDetails', $adDetails);
        });
    }
}
