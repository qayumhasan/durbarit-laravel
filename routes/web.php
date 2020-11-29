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


  Route::prefix('payroll')->group(function(){
    Route::get('/','PayrollController@index')->name('admin.payroll.index');
    Route::get('/search','PayrollController@payrollSearch')->name('admin.staff.attendance.payroll.search');
    Route::get('/show/{id}/{month}','PayrollController@payrollGenerate')->name('admin.payroll.genaretor');

  });



  Route::prefix('leave')->group(function(){
    Route::get('/','LeaveController@index')->name('admin.leave.index');

    Route::post('/create','LeaveController@store')->name('admin.leave.store');
    Route::get('/edit/{id}','LeaveController@edit')->name('admin.leave.edit');
    Route::post('/update','LeaveController@update')->name('admin.leave.update');
    Route::get('/status/{id}','LeaveController@status')->name('admin.leave.status');
    Route::get('/delete/{id}','LeaveController@delete')->name('admin.leave.delete');
  });
  Route::prefix('leave/type')->group(function(){
    Route::get('/','LeaveController@leaveType')->name('admin.leave.type.index');

    Route::post('/create','LeaveController@leaveTypeStore')->name('admin.leave.type.store');
    Route::get('/edit/{id}','LeaveController@edit')->name('admin.leave.type.edit');
    Route::post('/update','LeaveController@typeUpdate')->name('admin.leave.type.update');
    
    Route::get('/delete/{id}','LeaveController@deleteType')->name('admin.leave.type.delete');
  });
  


  Route::prefix('video')->group(function(){
    Route::get('/section','VideoController@index')->name('admin.video.index');
    Route::post('/update','VideoController@update')->name('admin.video.update');

  });

  Route::prefix('payment/setting')->group(function(){
    Route::get('/','PaymentSettingController@index')->name('admin.payment.setting.index');
    Route::post('/stripe/update','PaymentSettingController@stripeUpdate')->name('admin.stripe.setting.update');
    Route::post('/paypal/update','PaymentSettingController@paypalUpdate')->name('admin.paypal.setting.update');
    Route::post('/ssl/commerz/update','PaymentSettingController@sslCommerzUpdate')->name('admin.ssl.commerz.setting.update');

  });
  
  Route::prefix('sms/setting')->group(function(){
    Route::get('/','SmsController@index')->name('admin.sms.setting');
    Route::post('/update','SmsController@update')->name('admin.sms.update');

  });
  Route::prefix('order')->group(function(){
    Route::get('/','OrderController@index')->name('admin.order.index');
    Route::get('/order/show/{id}','OrderController@showOrder')->name('admin.show.order');
    Route::get('/order/delete/{id}','OrderController@orderDelete')->name('admin.order.delete');

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

  Route::prefix('human/resource')->group(function(){
    Route::get('/','StaffDirectoryController@index')->name('admin.staff.index');
    Route::get('/create','StaffDirectoryController@create')->name('admin.staff.create');
    Route::post('/create','StaffDirectoryController@store')->name('admin.staff.store');
    Route::get('/edit/{id}','StaffDirectoryController@edit')->name('admin.staff.edit');
    Route::post('/update','StaffDirectoryController@update')->name('admin.staff.update');
    Route::get('/status/{id}','StaffDirectoryController@status')->name('admin.staff.status');
    Route::get('/delete/{id}','StaffDirectoryController@delete')->name('admin.staff.delete');
    Route::get('/show/{id}','StaffDirectoryController@show')->name('admin.staff.show');
  });


  Route::prefix('staff/role')->group(function(){
    Route::get('/','StaffRoleController@index')->name('admin.staff.role.index');
    Route::get('/create','StaffRoleController@create')->name('admin.staff.role.create');
    Route::post('/create','StaffRoleController@store')->name('admin.staff.role.store');
    Route::get('/edit/{id}','StaffRoleController@edit');
    Route::post('/update','StaffRoleController@update')->name('admin.staff.role.update');
    Route::get('/status/{id}','StaffRoleController@status')->name('admin.staff.role.status');
    Route::get('/delete/{id}','StaffRoleController@delete')->name('admin.staff.role.delete');
  });
  Route::prefix('staff/department')->group(function(){
    Route::get('/','DepartmentController@index')->name('admin.staff.department.index');
    Route::get('/create','DepartmentController@create')->name('admin.staff.department.create');
    Route::post('/create','DepartmentController@store')->name('admin.staff.department.store');
    Route::get('/edit/{id}','DepartmentController@edit');
    Route::post('/update','DepartmentController@update')->name('admin.staff.department.update');
    Route::get('/status/{id}','DepartmentController@status')->name('admin.staff.department.status');
    Route::get('/delete/{id}','DepartmentController@delete')->name('admin.staff.department.delete');
  });

  Route::prefix('staff/designation')->group(function(){
    Route::get('/','DesignationController@index')->name('admin.staff.designation.index');
    Route::get('/create','DesignationController@create')->name('admin.staff.designation.create');
    Route::post('/create','DesignationController@store')->name('admin.staff.designation.store');
    Route::get('/edit/{id}','DesignationController@edit');
    Route::post('/update','DesignationController@update')->name('admin.staff.designation.update');
    Route::get('/status/{id}','DesignationController@status')->name('admin.staff.designation.status');
    Route::get('/delete/{id}','DesignationController@delete')->name('admin.staff.designation.delete');
  });
  Route::prefix('staff/attendance')->group(function(){
    Route::get('/','AttendanceController@index')->name('admin.staff.attendance.index');
    Route::get('/create','AttendanceController@create')->name('admin.staff.attendance.create');
    Route::post('/create','AttendanceController@store')->name('admin.staff.attendance.store');
    Route::get('/edit/{id}','AttendanceController@edit');
    Route::post('/update','AttendanceController@update')->name('admin.staff.attendance.update');
    Route::get('/status/{id}','AttendanceController@status')->name('admin.staff.attendance.status');
    Route::get('/delete/{id}','AttendanceController@delete')->name('admin.staff.attendance.delete');
    Route::get('/search','AttendanceController@staffSearch')->name('admin.staff.attendance.search');
  });
  Route::prefix('staff/attendance/report')->group(function(){
    Route::get('/','AttendanceController@reportShow')->name('admin.staff.attendance.report.index');
    Route::get('/search','AttendanceController@reportSearch')->name('admin.staff.attendance.report.search');
    Route::get('/show/{id}/{year}','AttendanceController@singleReportShow')->name('admin.staff.attendance.show');
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

  Route::prefix('invoice/project/category')->group(function(){
    Route::get('/','ProjectCategoryController@index')->name('admin.invoice.project.category.index');
    Route::get('/create','ProjectCategoryController@create')->name('admin.invoice.project.category.create');
    Route::post('/create','ProjectCategoryController@store')->name('admin.invoice.project.category.store');
    Route::get('/edit/{id}','ProjectCategoryController@edit');
    Route::post('/update','ProjectCategoryController@update')->name('admin.invoice.project.category.update');
    Route::get('/status/{id}','ProjectCategoryController@status')->name('admin.invoice.project.category.status');
    Route::get('/delete/{id}','ProjectCategoryController@delete')->name('admin.invoice.project.category.delete');
  });
  Route::prefix('invoice')->group(function(){
    Route::get('/','InvoiceController@create')->name('admin.invoice.create');
    Route::get('/view/{id}','InvoiceController@invoiceView')->name('admin.invoice.project.view');
    Route::get('/delete/{id}','InvoiceController@invoiceDelete')->name('admin.invoice.project.delete');
    Route::post('/store','InvoiceController@store')->name('admin.invoice.store');
    Route::get('/get/product','InvoiceController@getProduct');
    Route::get('/product/value/{id}','InvoiceController@getSingleProduct');
    Route::get('/list','InvoiceController@invoiceList')->name('admin.invoice.list');
    Route::get('/setting','InvoiceController@invoiceSetting')->name('admin.invoice.setting');
    Route::post('/setting/update','InvoiceController@invoiceSettingUpdate')->name('admin.invoice.setting.update');
    
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


  Route::prefix('product')->group(function(){
    Route::get('/','InvoieProductController@index')->name('admin.invoice.product.index');
    
    Route::post('/create','InvoieProductController@store')->name('admin.invoice.product.store');
    Route::get('/invoice/edit/{id}','InvoieProductController@edit');
    Route::post('/update','InvoieProductController@update')->name('admin.invoice.product.update');
    
    Route::get('/delete/{id}','InvoieProductController@delete')->name('admin.invoice.product.delete');
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



Route::post('payment/ssl_commercez/success','Frontend\AddToCartController@successSSL');
Route::post('payment/ssl_commercez/fail','Frontend\AddToCartController@successSSL');
Route::post('payment/ssl_commercez/cancel','Frontend\AddToCartController@successSSL');


Route::prefix('customer')->namespace('Frontend')->group(function(){

  Route::post('/login','AuthController@login')->name('customar.login');
  Route::post('/register','AuthController@register')->name('customar.register');
  Route::get('/logout','AuthController@logout')->name('customar.logout');
  Route::get('/add/to/cart','AddToCartController@addToCart')->name('product.add.cart');  
  Route::get('/service/add/to/cart','AddToCartController@serviceAddToCart')->name('service.product.add.cart');  
  Route::get('/product/cart','AddToCartController@showCart')->name('product.cart.page'); 
  Route::get('/checkout','AddToCartController@checkout')->name('customar.checkout'); 
  Route::post('/profile/update','AdminController@profileUpdate')->name('customar.profile.update'); 
  Route::get('/customar/verification/{token}','AuthController@verification')->name('customar.verification'); 
  Route::post('/customar/verify','AuthController@verifyAccount')->name('customar.verify'); 
  Route::post('/cart/delete','AddToCartController@cartDelete')->name('cart.data.delete');

  Route::get('/forgot/password','AuthController@checkPhone')->name('customar.forgot.phone');
  Route::post('/forgot/password','AuthController@cartDelete')->name('customar.forgot.verify');
  Route::post('/forgot/phone/submit','AuthController@phoneSubmit')->name('customar.forgot.phone.submit');
  Route::post('/forgot/code/submit','AuthController@codeSubmit')->name('customar.forgot.code.submit');
  Route::post('/forgot/password/submit','AuthController@passwordSubmit')->name('customar.forgot.password.submit');
  Route::get('/forgot/code/show/{token}','AuthController@showForgetcodeform')->name('customar.forgot.code');
  Route::get('/forgot/password/show/{token}/{code}','AuthController@showForgetPasswordform')->name('customar.forgot.password');
  

});

Route::prefix('customer')->middleware('auth:web')->namespace('Frontend')->group(function(){

  Route::get('/dashboard','AdminController@index')->name('customar.dashboard');
  Route::post('/checkout','AddToCartController@customarBilling')->name('customar.billing');
  Route::post('/stripe','AddToCartController@stripePayment')->name('payment.stripe.submit');
  Route::get('/invoice/details/{orderid}','AddToCartController@invoiceDetails')->name('customar.invoice.details');
  Route::get('/admin/invoice/details/{orderid}','AddToCartController@adminInvoiceDetails')->name('admin.customar.invoice.details');
  Route::get('/invoice/download/{orderid}','AddToCartController@invoiceDownload')->name('customar.invoice.download');
  
});


Route::get('/product/collection/{id}','Frontend\AddToCartController@addToCollect');



Route::get('/paypal/{billing}','Frontend\PaymentController@paywithpaypal')->name('paypal.submit');

Route::get('/paypal/payment/success','Frontend\PaymentController@paypalsucess');


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

Route::get('payment', 'Admin\PayPalController@payment')->name('payment');
Route::get('cancel', 'Admin\PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'Admin\PayPalController@success')->name('payment.success');

Route::get('/test',function(){
  return view('welcome');
});

