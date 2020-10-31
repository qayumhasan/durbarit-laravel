<?php


Route::get('/checkout',function(){
  return view('frontend.shopping.checkout');
});



Route::prefix('admin')->namespace('Admin')->group(function () {
   Route::get('/login','AdminController@showLoginPage')->name('admin.login.page');
   Route::post('/register','AdminController@register')->name('admin.register');
   Route::post('/login','AdminController@login')->name('admin.login');

   Route::get('/register','AdminController@showRegisterForm')->name('admin.register.form');

   Route::middleware(['auth:admin'])->group(function(){
        Route::get('/','AdminController@adminHome')->name('admin.home');
   });
   Route::post('/logout','AdminController@logout')->name('admin.logout');

   Route::get('/forgot/password','AdminController@showForgotPassword')->name('admin.forgot.passowrd');

   Route::post('/reset_password_without_token','AdminController@validatePasswordRequest')->name('admin.validate.password');
});

Route::resource('admin/slider', Admin\SliderController::class);
Route::prefix('admin')->middleware('auth:admin')->namespace('Admin')->group(function(){
  Route::prefix('service')->group(function(){
    Route::get('/','ServiceController@index')->name('admin.service.index');
    Route::get('/create','ServiceController@create')->name('admin.service.create');
    Route::post('/create','ServiceController@store')->name('admin.service.store');
    Route::get('/edit/{id}','ServiceController@edit')->name('admin.service.edit');
    Route::post('/update','ServiceController@update')->name('admin.service.update');
    Route::get('/status/{id}','ServiceController@status')->name('admin.service.status');
    Route::get('/delete/{id}','ServiceController@delete')->name('admin.service.delete');
  });

  Route::prefix('partner')->group(function(){
    Route::get('/','PartnerController@index')->name('admin.partner.index');
    Route::get('/create','PartnerController@create')->name('admin.partner.create');
    Route::post('/create','PartnerController@store')->name('admin.partner.store');
    Route::get('/edit/{id}','PartnerController@edit')->name('admin.partner.edit');
    Route::post('/update','PartnerController@update')->name('admin.partner.update');
    Route::get('/status/{id}','PartnerController@status')->name('admin.partner.status');
    Route::get('/delete/{id}','PartnerController@delete')->name('admin.partner.delete');
  });

  Route::prefix('logo')->group(function(){
    Route::get('/','LogoController@index')->name('admin.logo.index');
    Route::post('/update','LogoController@update')->name('admin.logo.update');
  });


  Route::prefix('subscriber')->group(function(){
    Route::get('/','SubscriberController@index')->name('admin.subscriber.index');
    Route::get('/create','SubscriberController@create')->name('admin.subscriber.create');
    Route::get('/status/{id}','SubscriberController@status')->name('admin.subscriber.status');
    Route::get('/delete/{id}','SubscriberController@delete')->name('admin.subscriber.delete');
  });

  Route::prefix('career')->group(function(){
    Route::get('/','CareerController@index')->name('admin.career.index');
    Route::get('/create','CareerController@create')->name('admin.career.create');
    Route::post('/create','CareerController@store')->name('admin.career.store');
    Route::get('/edit/{id}','CareerController@edit')->name('admin.career.edit');
    Route::post('/update','CareerController@update')->name('admin.career.update');
    Route::get('/status/{id}','CareerController@status')->name('admin.career.status');
    Route::get('/delete/{id}','CareerController@delete')->name('admin.career.delete');
  });

  Route::prefix('career')->group(function(){
    Route::get('/','CareerController@index')->name('admin.career.index');
    Route::get('/create','CareerController@create')->name('admin.career.create');
    Route::post('/create','CareerController@store')->name('admin.career.store');
    Route::get('/edit/{id}','CareerController@edit')->name('admin.career.edit');
    Route::post('/update','CareerController@update')->name('admin.career.update');
    Route::get('/status/{id}','CareerController@status')->name('admin.career.status');
    Route::get('/delete/{id}','CareerController@delete')->name('admin.career.delete');
  });

  Route::prefix('team')->group(function(){
    Route::get('/','TeamController@index')->name('admin.team.index');
    Route::get('/create','TeamController@create')->name('admin.team.create');
    Route::post('/create','TeamController@store')->name('admin.team.store');
    Route::get('/edit/{id}','TeamController@edit')->name('admin.team.edit');
    Route::post('/update','TeamController@update')->name('admin.team.update');
    Route::get('/status/{id}','TeamController@status')->name('admin.team.status');
    Route::get('/delete/{id}','TeamController@delete')->name('admin.team.delete');
  });

  Route::prefix('page')->group(function(){
    Route::get('/','PageController@index')->name('admin.page.index');
    Route::get('/create','PageController@create')->name('admin.page.create');
    Route::post('/create','PageController@store')->name('admin.page.store');
    Route::get('/edit/{id}','PageController@edit')->name('admin.page.edit');
    Route::post('/update','PageController@update')->name('admin.page.update');
    Route::get('/status/{id}','PageController@status')->name('admin.page.status');
    Route::get('/delete/{id}','PageController@delete')->name('admin.page.delete');
  });

  Route::prefix('client/say')->group(function(){
    Route::get('/','ClientController@index')->name('admin.client.index');
    Route::get('/create','ClientController@create')->name('admin.client.create');
    Route::post('/create','ClientController@store')->name('admin.client.store');
    Route::get('/edit/{id}','ClientController@edit')->name('admin.client.edit');
    Route::post('/update','ClientController@update')->name('admin.client.update');
    Route::get('/status/{id}','ClientController@status')->name('admin.client.status');
    Route::get('/delete/{id}','ClientController@delete')->name('admin.client.delete');
  });

  Route::prefix('project')->group(function(){
    Route::get('/','ProjectController@index')->name('admin.project.index');
    Route::get('/create','ProjectController@create')->name('admin.project.create');
    Route::post('/create','ProjectController@store')->name('admin.project.store');
    Route::get('/edit/{id}','ProjectController@edit')->name('admin.project.edit');
    Route::post('/update/{id}','ProjectController@update')->name('admin.project.update');
    Route::get('/status/{id}','ProjectController@status')->name('admin.project.status');
    Route::get('/delete/{id}','ProjectController@delete')->name('admin.project.delete');
  });

  Route::prefix('users')->group(function(){
    Route::get('/','UserController@index')->name('admin.user.index');
    Route::get('/create','UserController@create')->name('admin.user.create');
    Route::post('/create','UserController@store')->name('admin.user.store');
    Route::get('/edit/{type}/{id}','UserController@edit')->name('admin.user.edit');
    Route::post('/update','UserController@update')->name('admin.user.update');
    Route::get('/status/{type}/{id}','UserController@status')->name('admin.user.status');
    Route::get('/delete/{type}/{id}','UserController@delete')->name('admin.user.delete');

    Route::get('/profile/{id}','UserController@profile')->name('');
  });

  Route::prefix('about/us')->group(function(){
    Route::get('/','AboutUsController@index')->name('admin.aboutus.index');
    Route::post('/update','AboutUsController@update')->name('admin.aboutus.update');
  });
  Route::prefix('profile')->group(function(){
    Route::get('/{id}','ProfileController@showProfile')->name('admin.profile.index');
    Route::get('/edit/{id}','ProfileController@editProfile')->name('admin.profile.edit');
    Route::post('/update','ProfileController@updateProfile')->name('admin.profile.update');
    Route::get('/password/change/{id}','ProfileController@passwordChangePage')->name('admin.profile.password.page');
    Route::post('/password/change','ProfileController@passwordChange')->name('admin.password.change');
  });

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// category
Route::prefix('admin')->middleware('auth:admin')->namespace('Admin')->group(function(){
  Route::get(md5('/category/create'),'CategoryController@create')->name('admin.category.create');
  Route::post('/category/submit','CategoryController@store')->name('admin.category.store');
  Route::get(md5('/category/index'),'CategoryController@index')->name('admin.category.index');
  Route::get('/category/destroy/{id}','CategoryController@destroy');
  Route::get('/category/edit/{id}','CategoryController@edit');
  Route::post('/category/update/{id}','CategoryController@update')->name('admin.category.update');
});
// whychoseus
Route::prefix('admin')->middleware('auth:admin')->namespace('Admin')->group(function(){
  Route::get(md5('/whychoseus/create'),'WhyChoseUsController@create')->name('admin.whychoseus.create');
  Route::post('/whychoseus/submit','WhyChoseUsController@store')->name('admin.whychoseus.store');
  Route::get(md5('/whychoseus/index'),'WhyChoseUsController@index')->name('admin.whychoseus.index');
  Route::get('/whychoseus/destroy/{id}','WhyChoseUsController@destroy');
  Route::get('/whychoseus/edit/{id}','WhyChoseUsController@edit');
  Route::post('/whychoseus/update/{id}','WhyChoseUsController@update')->name('admin.whychoseus.update');
});
// ContactInformation
Route::prefix('admin')->middleware('auth:admin')->namespace('Admin')->group(function(){
  Route::get('/contactinformation/edit','ContactInformationController@edit')->name('admin.contactinformation');
  Route::post('/contactinformation/update/{id}','ContactInformationController@update')->name('admin.contactinformation.update');
});


// seo
Route::prefix('admin')->middleware('auth:admin')->namespace('Admin')->group(function(){
  Route::get('/seo/edit','SeoController@edit')->name('admin.seo.edit');
  Route::post('/seo/update/{id}','SeoController@update')->name('admin.seo.update');
});

Route::prefix('admin')->middleware('auth:admin')->namespace('Admin')->group(function(){
  Route::get(md5('/product/create'),'ProductController@create')->name('admin.product.create');
  Route::post(md5('/product/create/submit'),'ProductController@store')->name('admin.product.store');
   Route::get(md5('/product/index'),'ProductController@index')->name('admin.product.index');
  Route::get('/product/destroy/{id}','ProductController@destroy');
  Route::get('/product/edit/{id}','ProductController@edit');

  Route::post('/product/update/{id}','ProductController@update')->name('admin.product.update');
});

Route::prefix('admin')->middleware('auth:admin')->namespace('Admin')->group(function(){
  Route::get(md5('/contactmessage/index'),'ContactMessageController@index')->name('admin.contactmessage.index');
  Route::get(md5('/contactmessage/compose'),'ContactMessageController@create')->name('admin.compose.create');
  Route::get('/contactmessage/read/{id}','ContactMessageController@read')->name('admin.compose.read');
});

Route::prefix('admin')->middleware('auth:admin')->namespace('Admin')->group(function(){
  Route::get(md5('/social/index'),'SocialController@index')->name('admin.social.index');
  Route::post(md5('/social/index'),'SocialController@update')->name('admin.social.update');

});

Route::prefix('admin')->middleware('auth:admin')->namespace('Admin')->group(function(){
  Route::get(md5('/apply/index'),'ApplyController@index')->name('admin.apply.index');
  Route::get('/apply/active/{id}','ApplyController@active');
  Route::get('/apply/view/{id}','ApplyController@view');
  Route::get('/apply/delete/{id}','ApplyController@delete');
  

});


Route::prefix('customer')->namespace('Frontend')->group(function(){

  Route::post('/login','AuthController@login')->name('customar.login');
  Route::get('/logout','AuthController@logout')->name('customar.logout');
  Route::get('/add/to/cart','AddToCartController@addToCart')->name('product.add.cart');  
  Route::get('/product/cart','AddToCartController@showCart')->name('product.cart.page');  

});

Route::prefix('customer')->middleware('auth:web')->namespace('Frontend')->group(function(){

  Route::get('/dashboard','AdminController@index')->name('customar.dashboard');
  Route::get('/checkout','AddToCartController@checkout')->name('customar.checkout');
  Route::post('/checkout','AddToCartController@customarBilling')->name('customar.billing');
  Route::post('/cart/delete','AddToCartController@cartDelete')->name('cart.data.delete');
  

});



Route::get('/','Frontend\FrontendController@index');
Route::get('/product','Frontend\FrontendController@product');
Route::get('/product/details/{id}','Frontend\FrontendController@productdetails');
Route::get('/carrer','Frontend\FrontendController@carrer');
Route::get('/carrer/apply/{id}','Frontend\FrontendController@carrerapply');
Route::post('/carrer/apply/submit','Frontend\FrontendController@applysubmit');

Route::get('/contact','Frontend\FrontendController@contact');
Route::get('/team','Frontend\FrontendController@team');
Route::get('/customer/login','Frontend\FrontendController@loginpage')->name('auth.login');
Route::get('/page/{id}','Frontend\FrontendController@page');
Route::get('/service/{id}','Frontend\FrontendController@servicepage');
Route::post('/subscriber/website','Frontend\FrontendController@subcrive');
Route::get('/about-us','Frontend\FrontendController@about');
Route::post('/contact/insert','Frontend\FrontendController@contactinsert');
// cart controller
Route::get('/cart','Frontend\CartController@cart');

