<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\comments;
use App\classifieds;
use App\safety_guidelines;


class ProductPageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->get_comments(); //get comments for the review page

        $this->get_more_from_user(); //get more classifieds from this user

        $this->get_related_products();

        $this->get_safety_guidelines();


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

    /*
     * Get More Classifieds from this user
     * */
    private function get_more_from_user()
    {
        view()->composer('partials.product_page.more_from', function ($view) {
            $viewdata = $view->getdata(); //get data from the view
            $viewdataarray = $viewdata['classified_details']->toArray(); //convert data to array
          //dd($viewdataarray);
            $user_id = $viewdataarray['user_id'];
            $listing_id = $viewdataarray['id'];
            $more = classifieds::orderBy('id', 'DESC')
                ->take(4)
                ->where('user_id', '=', $user_id)
                ->where('id', '!=', $listing_id)
                ->where('is_active', '=', '1')
                ->get()
                ->toArray();

           // dd($more);
            $view->with('more', $more);

        });
    }

    private function get_related_products()
    {
        view()->composer('partials.product_page.related_products', function ($view){
            $viewdata = $view->getdata(); //get data from the view
            $viewdataarray = $viewdata['classified_details']->toArray(); //convert data to array

            $sub_category_id = $viewdataarray['sub_category_id'];

            //dd($sub_category_id);
            $listing_id = $viewdataarray['id'];


            $related = classifieds::orderBy('id', 'DESC')
                    ->take(4)
                ->whereSub_category_id($sub_category_id)
                ->whereIs_active('1')
                ->where('id', '!=', $listing_id)
                ->get()
                ->toArray();

            //dd($related);
            $view->with('related', $related);
        });

    }


    /**
     *Get comments for classifieds
     */
    private function get_comments()
    {
        view()->composer('partials.product_page.reviews', function ($view) {
            $viewdata = $view->getdata(); //get data from the view
            $viewdataarray = $viewdata['classified_details']->toArray(); //convert data to array
            $id = $viewdataarray['id']; //get the id of the classified loaded
            $comment = comments::where('classified_id', '=', $id)->get(); //fetch the comments along with the classified
            $comment_count = comments::where('classified_id', '=', $id)->get()->count(); //fetch the comments along with the classified
            $review = $comment->toArray(); //convert result to array

            $view->with('review', $review)->with('comment_count', $comment_count); //pass result to the view with the variable review
        });
    }

    private function get_safety_guidelines()
    {
        view()->composer('partials.product_page.safety', function ($view) {
            $guidelines = safety_guidelines::orderBy('order', 'ASC')
                ->whereIs_active('1')
                ->get()
                ->toArray();

            $view->with('guidelines', $guidelines);
        });
    }




}
