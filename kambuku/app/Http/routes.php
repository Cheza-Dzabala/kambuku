<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});


Route::group(['middleware' => ['web', 'CORS'], 'prefix' => 'app'], function(){
    Route::get('home',
        [
            'uses' => 'App\AppdashBoardController@index'
        ]
    );

    Route::resource('authenticate', 'App\AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'App\AuthenticateController@authenticate');

});

Route::group(['middleware' => ['web']], function () {
    Route::group(['middleware' => ['activationcheck', 'locale']], function () {
        Route::group(['middleware' => ['shoutbox']], function(){

                Route::get('/test', 'NavigationController@test');

    //Natural User Routes
    Route::auth();

    Route::get('lang/{lang}',
        [
            'as' => 'language.set',
            'uses' => 'LanguageController@index'
        ]
    );
    Route::post('/new_review',
        [
            'as' => 'new_review',
            'uses' => 'ReviewsController@store'
        ]
    );
    Route::post('/new_message',
        [
            'as' => 'new.message',
            'uses' => 'MessagesController@new_message'
        ]
    );


    Route::get('/',
        [
            'as' => 'home',
            'uses' => 'NavigationController@landing'
        ]
    );

    Route::get('login',
        [
            'as' => 'login',
            'uses' => 'NavigationController@login'
        ]
    );

    Route::get('login',
        [
            'as' => 'login',
            'uses' => 'NavigationController@login'
        ]
    );

    Route::get('messaging',
        [
            'as' => 'messages',
            'uses' => 'MessagesController@ReadMessages'
        ]
    );

    Route::get('register',
        [
            'as' => 'register',
            'uses' => 'NavigationController@register'
        ]
    );

    Route::get('users',
        'NavigationController@users'
    );

    Route::get('profile',
        [
            'as' => 'profile',
            'uses' => 'ProfileController@index'
        ]
    );


    Route::get('profile/edit',
        [
            'as' => 'profile.edit',
            'uses' => 'ProfileController@edit'
        ]
    );

    Route::post('profile/edit',
        [
            'as' => 'profile.save',
            'uses' => 'ProfileController@save'
        ]);

    Route::get('edit/{id}',
        [
            'as' => 'edit.product',
            'uses' => 'ClassifiedsController@edit'
        ]
    );

    Route::post('update',
        [
            'as' => 'classified.update',
            'uses' => 'ClassifiedsController@update'
        ]
    );

    Route::get('/category/{id}',
        [
            'as' => 'category.browse',
            'uses' => 'CategoryController@index'
        ]
    );

    Route::get('/content/{title}',
        [
            'as' => 'content.show',
            'uses' => 'renderContentController@index'
        ]
    );

    Route::get('search', 'SearchController@index');

  //  Route::get('classifieds/new', ['as' => 'post_new_ad', 'uses' =>'ClassifiedsController@index']);
    Route::resource('classifieds', 'ClassifiedsController');

    //Check what type of user has logged in or registered
    Route::get('/validate', 'UserType@check_type');



   });
   });


    //ADMIN Routes
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function()
    {
        Route::get('/dashboard',
            [
                'as' => 'admin.home',
                'uses' => 'Admin\AdminController@index'
            ]
        );


        /** Category & Sub Category Routes */

        Route::get('/categories/',
            [
                'as' => 'admin.categories',
                'uses' => 'Admin\CategoryAdminController@index'
            ]
        );


        Route::get('/manage_sub_category/{id}',
            [
                'as' => 'admin.subcategories',
                'uses' => 'Admin\CategoryAdminController@GetSubCategory'
            ]
        );

        Route::post('/new_category',
            [
                'as' => 'admin.postnewcategory',
                'uses' => 'Admin\CategoryAdminController@CreateCategory'
            ]
        );

        Route::get('/delete_category/{id}',
            [
                'as' => 'admin.deletecategory',
                'uses' => 'Admin\CategoryAdminController@DeleteCategory'
            ]
        );

        Route::get('/edit_category/{id}',
            [
                'as' => 'admin.editcategory',
                'uses' => 'Admin\CategoryAdminController@EditCategory'
            ]
        );

        Route::post('/update_category',
            [
                'as' => 'admin.updatecategory',
                'uses' => 'Admin\CategoryAdminController@UpdateCategory'
            ]
        );

        Route::get('/edit_subcategory/{id}',
            [
                'as' => 'admin.editsubcategory',
                'uses' => 'Admin\CategoryAdminController@EditSubCategory'
            ]
        );

        Route::post('/update_subcategory',
            [
                'as' => 'admin.updatesubcategory',
                'uses' => 'Admin\CategoryAdminController@UpdateSubCategory'
            ]
        );


        Route::get('/delete_subcategory/{id}',
            [
                'as' => 'admin.deletesubcategory',
                'uses' => 'Admin\CategoryAdminController@DeleteSubCategory'
            ]
        );




        Route::get('new_sub_category/{id}',
            [
                'as' => 'admin.createnewsubcategory',
                'uses' => 'Admin\CategoryAdminController@CreateSubCategory'
            ]

        );

        Route::post('save_sub_category/',
            [
                'as' => 'admin.postnewsubcategory',
                'uses' => 'Admin\CategoryAdminController@SaveSubCategory'
            ]

        );

        //Website Views & Settings

        Route::resource('safety_guidelines', 'Admin\SafetyGuidelines');




        /** Category & Sub Category Routes */

        /** Location Routes */
        Route::get('/locations',
            [
                'as' => 'admin.locations',
                'uses' => 'Admin\LocationAdminController@index'
            ]
        );

        Route::get('/locations/Regions/{id}',
            [
                'as' => 'admin.GetRegions',
                'uses' => 'Admin\LocationAdminController@GetRegions'
            ]
        );

        Route::get('/locations/Regions/Cities/{id}',
            [
                'as' => 'admin.GetCities',
                'uses' => 'Admin\LocationAdminController@GetCities'
            ]
        );

        Route::get('/locations/All/{id}',
            [
                'as' => 'admin.GetAllCities',
                'uses' => 'Admin\LocationAdminController@GetAllCities'
            ]
        );

        //USer Management

        Route::get('/users/listings/{id}',
            [
                'as' => 'admin.GetClassifieds',
                'uses' =>'Admin\UsersAdminController@GetClassifieds'
            ]
        );

        Route::get('/users',
            [
                'as' => 'admin.users',
                'uses' => 'Admin\UsersAdminController@index',
            ]
        );

        Route::get('/users/moderate/{id}',
            [
                'as' => 'admin.ModerateUsers',
                'uses' => 'Admin\UsersAdminController@ModerateUsers'
            ]
        );

        Route::post('/users/moderate/',
            [
                'as' => 'admin.saveModeration',
                'uses' => 'Admin\UsersAdminController@saveModeration'
            ]
        );

        Route::get('/users/admins/all',
            [
                'as' => 'admin.adminUsers',
                'uses' => 'Admin\UsersAdminController@getAdminUsers'
            ]
        );

        //ADMIN MANAGEMENT

        Route::get('/settings',
            [
                'as' => 'admin.settings',
                'uses' => 'Admin\ProfileAdminController@index'
            ]
        );

        Route::post('/update_info',
            [
                'as' => 'admin.updateinfo',
                'uses' => 'Admin\ProfileAdminController@update_info'
            ]
        );


        //Listing Managaement

        Route::get('/classifieds/',
            [
                'as' => 'admin.allclassifieds',
                'uses' => 'Admin\userListingsController@index'
            ]
        );

        Route::get('/classifieds/{id}',
            [
                'as' => 'admin.showclassifieds',
                'uses' => 'Admin\userListingsController@showlisting'
            ]
        );

        Route::post('/classified/update',
            [
                'as' => 'admin.updateListing',
                'uses' => 'Admin\userListingsController@update'
            ]
        );

        //Revenue

        Route::get('/slider',
            [
                'as' => 'admin.homesliderconfig',
                'uses' => 'Admin\HomeSliderController@index'
            ]
        );

        Route::get('/slider/new',
            [
                'as' => 'admin.newHomesliderconfig',
                'uses' => 'Admin\HomeSliderController@newSlide'
            ]
        );

        Route::post('/slider/new',
            [
                'as' => 'admin.addNewSlide',
                'uses' => 'Admin\HomeSliderController@save'
            ]
        );


        Route::get('/adverts/dashboard',
             [
                'as' => 'admin.adverts_config',
                'uses' => 'Admin\AdvertEngineController@index'
            ]
        );

        Route::get('/adverts/new',
            [
                'as' => 'admin.addNewAd',
                'uses' => 'Admin\AdvertEngineController@newAd'
            ]
        );

        Route::get('/adverts/edit/{id}',
            [
                'as' => 'admin.editAd',
                'uses' => 'Admin\AdvertEngineController@edit'
            ]
        );

        Route::post('/adverts/new',
            [
                'as' => 'admin.saveNewAd',
                'uses' => 'Admin\AdvertEngineController@save'
            ]
        );

        Route::get('/badwords',
            [
                'as' => 'admin.badwords',
                'uses' => 'Admin\Badwords@index'
            ]
        );

        Route::post('/badwords/new',
            [
                'as' => 'admin.saveWords',
                'uses' => 'Admin\Badwords@saveWords'
            ]
        );

        Route::get('/badwords/new',
            [
                'as' => 'admin.badwordsNew',
                'uses' => 'Admin\Badwords@new_filter'
            ]
        );

        Route::get('/badwords/update/{name}',
            [
                'as' => 'admin.badwordsEdit',
                'uses' => 'Admin\Badwords@edit_filter'
            ]
        );


        Route::post('/badwords/update',
            [
                'as' => 'admin.updateWords',
                'uses' => 'Admin\Badwords@updateWords'
            ]
        );

        Route::get('/badwords/delete/{id}',
            [
                'as' => 'admin.badwords_delete',
                'uses' => 'Admin\Badwords@delete'
            ]
        );


        //Content Pages

        Route::get('content_pages',
            [
                'as' => 'admin.contentHeaders',
                'uses' => 'Admin\contentPagesController@headerIndex'
            ]
        );

        Route::get('content_pages/new_header',
            [
                'as' => 'admin.newContentHeader',
                'uses' => 'Admin\contentPagesController@newHeader'
            ]
        );




        Route::post('content_pages/neHeader',
            [
                'as' => 'admin.saveNewHeader',
                'uses' => 'Admin\contentPagesController@saveHeader'
            ]
        );

        Route::get('content_pages/{id}',
            [
                'as' => 'admin.pagesIndex',
                'uses' => 'Admin\contentPagesController@pagesIndex'
            ]
        );

        Route::get('content_pages/new/{id}',
            [
                'as' => 'admin.pagesNew',
                'uses' => 'Admin\contentPagesController@pagesNew'
            ]
        );


        Route::post('content_pages/new_header',
            [
                'as' => 'admin.saveContentPage',
                'uses' => 'Admin\contentPagesController@savePage'
            ]
        );


        Route::get('content_pages/{id}/new',
            [
                'as' => 'admin.contentNew',
                'uses' => 'Admin\contentPagesController@contentNew'
            ]
        );

        Route::post('content_pages/save_page',
            [
                'as' => 'admin.contentSave',
                'uses' => 'Admin\contentPagesController@contentSave'

            ]
        );

        Route::post('content_pages/update_page',
            [
                'as' => 'admin.contentUpdate',
                'uses' => 'Admin\contentPagesController@contentUpdate'

            ]
        );



    });


});

Route::group(['prefix' => 'api'], function()
{
    Route::post('subcategory/{id}', 'Api\ApiController@get_subcategory');

    Route::post('/messages', 'Api\ApiController@load_conversation');

    Route::post('/send_message', 'Api\ApiController@send_message');

    Route::post('deactivate/{id}', 'Api\AccountFunctionsApiController@deactivate');
    Route::post('activate/{id}', 'Api\AccountFunctionsApiController@activate');
    Route::get('deleteListing/{id}', ['as' => 'listing.delete', 'uses' => 'Api\AccountFunctionsApiController@delete']);
});

