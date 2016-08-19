<?php

namespace App\Http\Controllers;

use App\classifieds;
use App\Events\SearchEvent;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

class SearchController extends Controller
{
    //
    /**
     * @var classifieds
     */
    private $classifieds;

    /**
     * SearchController constructor.
     * @param classifieds $classifieds
     */
    public function __construct(classifieds $classifieds)
    {

        $this->classifieds = $classifieds;
    }

    public function index(Request $request)
    {

       // dd($request);

        $search_term = $request['search_term'];


        $search_category = $request['search_category'];
        $search_city = $request['search_city'];

        $searchResults = [];

        Event::fire(new SearchEvent($search_term));



		

            $results = $this->classifieds->where('title', 'LIKE', '%' . $search_term . '%')
                ->orWhere('description', 'LIKE', '%' . $search_term . '%')
                ->orWhere('keywords', 'LIKE', '%' . $search_term . '%')
                ->get();

            $resultCount = $this->classifieds->where('title', 'LIKE', '%' . $search_term . '%')
                ->orWhere('description', 'LIKE', '%' . $search_term . '%')
                ->orWhere('keywords', 'LIKE', '%' . $search_term . '%')
                ->count();


            if($resultCount == 0)
            {
                return view('search.results')->with(['empty' => 'true', 'search_term' => $search_term]);
            }

            foreach ($results as $key => $value) {
                if ($search_category != '') {
                    if ($value->category_id == $search_category) {
			if($value->is_active == 1){
                     
                        	$searchResults = array_add($searchResults, $key, $value);
			}
                    }
                }

                $user = User::whereId($value->user_id)->first();

                if ($search_city != '') {
                    //dd('here');
                    if ($search_city == $user->city_id) {
                        $searchResults = array_add($searchResults, $key, $value);
                    }
                }

                if ($search_city == '' and $search_category == '') {
                    $searchResults = array_add($searchResults, $key, $value);
                }
            }

            $items = collect($searchResults);

            if (isset($request['page']))
            {
                $page = $request['page'];
            }else{
                $page = 1;
            }

            if (isset($request['perPage']))
            {
                $perPage = $request['perPage'];
            }else{
                $perPage = 3;
            }

            $listingsArray = new LengthAwarePaginator(
                $items->forPage($page, $perPage), $items->count(), $perPage, $page
            );

            $listingsArray->setPath('/search');
            return view('search.results')->with(['listingsArray' => $listingsArray, 'perPage' => $perPage, 'search_term' => $search_term]);


    }

      // dd($searchResults);


}
