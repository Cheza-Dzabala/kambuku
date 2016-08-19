<?php

namespace App\Http\Controllers\Admin;

use App\cities;
use App\countries;
use App\states;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LocationAdminController extends Controller
{
    //
    /**
     * @var countries
     */
    private $countries;
    /**
     * @var cities
     */
    private $cities;
    /**
     * @var states
     */
    private $states;

    /**
     * LocationAdminController constructor.
     * @param countries $countries
     * @param cities $cities
     * @param states $states
     */
    public function __construct(countries $countries, cities $cities, states $states)
    {
        $this->middleware('admin');
        $this->countries = $countries;
        $this->cities = $cities;
        $this->states = $states;
    }

    public function index()
    {
        $locations_array = $this->get_countries();
        return view('admin.locations.locations', compact('locations_array'));
    }


    public function GetRegions($id)
    {
        $country_id = $id;

        $country_name = countries::whereId($country_id)->get()->first();

        $states = $this->states->orderBy('id', 'DESC')->whereCountry_id($country_id)->get()->toArray();


      // dd($states);
        $region_array = array();

        $i = 0;

        foreach ($states as $key => $value)
        {
            $city_number = cities::whereState_id($value['id'])->count();
            $stats = array('id' => $value['id'], 'cities' => $city_number, '#' => $i);
            $region_array = array_add($region_array, $value['name'], $stats);
            $i++;
        }
      // dd($region_array);


        return view('admin.locations.regions', compact('region_array','country_name'));
    }

    public function GetCities($id)
    {
        $cities = $this->cities->orderBy('name', 'ASC')->whereState_id($id)->get();

        foreach ($cities as $key => $value)
        {
            $region = $this->states->whereId($value['state_id'])->get()->first();
            $cities[$key]->setAttribute('region', $region['name']);
        }


        // dd($cities);

        return view('admin.locations.cities', compact('cities'));
    }

    public function GetAllCities($id)
    {
        $cities = $this->cities->orderBy('name', 'ASC')->whereCountry_id($id)->get();



        foreach ($cities as $key => $value)
        {
            $region = $this->states->whereId($value['state_id'])->get()->first();
            $cities[$key]->setAttribute('region', $region['name']);
        }

       // dd($cities);

        return view('admin.locations.cities', compact('cities'));
    }

    /**
     * @param Request $request
     * @param $locations
     * @return array
     */

    /**
     * @return array
     */
    private function get_countries()
    {
        $countries = countries::orderBy('id', 'DESC')->get()->toArray();

        $locations = array();
        $i = 0;
        foreach ($countries as $key => $value) {
            $state_number = states::whereCountry_id($value['id'])->count();
            $cities_number = cities::whereCountry_id($value['id'])->count();
            $stats = array('id' => $value['id'], 'states' => $state_number, 'cities' => $cities_number, '#' => $i);
            $locations = array_add($locations, $value['name'], $stats);
            $i++;
        }
//        dd($locations);
        return $locations;
    }


}
