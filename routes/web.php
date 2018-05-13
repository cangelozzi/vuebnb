<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great! */

Route::get('/', 'ListingController@get_home_web');

Route::get('/listing/{listing}', 'ListingController@get_listing_web');

Route::get('/saved', 'ListingController@get_home_web');


/* Now that we've added a login page at the /login route, we will need to create a matching
server-side route. We will also need a route for the login form that posts to the same /login path. In fact, both of these routes are provided out-of-the-box by Laravel as part of its default login system. */

Auth::routes();



/* use our login system now to protect certain routes from guests, that is,
unauthenticated users. Laravel provides the auth middleware, which can be applied to any route and will redirect a guest user to the login page if they attempt to access it. Let's apply this to our saved page route. */

Route::get('/saved', 'ListingController@get_home_web')->middleware('auth');
