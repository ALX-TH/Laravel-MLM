<?php

Auth::routes();

Route::get('/', 'GuestController@index')->name('index');

Route::get('/verify/logout', 'GuestController@verifyLogout')->name('verifyLogout');

Route::get('/verify/user/{token}', 'GuestController@verify')->name('verify');

Route::get('/contact-us', 'GuestController@contact')->name('contact');

Route::post('/contact-us', 'GuestController@EmailContact')->name('GuestEmail');

Route::get('/payment-proof', 'GuestController@proof')->name('paymentProof');

Route::get('/blog', 'GuestController@tutorials')->name('tutorials');

Route::get('/view/post/{slug}', 'GuestController@tutorialView')->name('viewPost');

Route::get('{provider}/auth', 'GuestController@auth')->name('social.auth');

Route::get('user/{provider}/redirect', 'GuestController@auth_callback')->name('social.callback');

Route::get('/{slug}', 'GuestController@PageView')->name('viewPage');

/*
|--------------------------------------------------------------------------
| Web Routes For Admin
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>'admin'], function (){


    Route::get('admin/dashboard', 'AdminController@index')->name('adminIndex');

    Route::get('admin/mail/inbox', 'AdminEmailController@index')->name('adminEmail');
    Route::get('admin/mail/view/{id}', 'AdminEmailController@show')->name('adminEmail.show');
    Route::get('admin/email/compose', 'AdminEmailController@create')->name('adminEmail.create');
    Route::post('admin/send/mail', 'AdminEmailController@send')->name('adminEmail.send');


    Route::get('admin/users', ['uses' => 'AdminUsersController@index','as' => 'admin.users.index']);
    Route::get('admin/user/create', ['uses' => 'AdminUsersController@create','as' => 'admin.user.create']);
    Route::get('admin/user/edit/{id}', ['uses' => 'AdminUsersController@edit','as' => 'admin.user.edit']);
    Route::get('admin/user/delete/{id}', ['uses' => 'AdminUsersController@destroy','as' => 'admin.user.delete']);
    Route::post('admin/user/update/{id}', ['uses' => 'AdminUsersController@update','as' => 'admin.user.update']);
    Route::post('admin/user/create/store', ['uses' => 'AdminUsersController@store','as' => 'admin.user.store']);
    Route::get('admin/user/create/admin/{id}', ['uses' => 'AdminUsersController@admin','as' => 'admin.create.admin']);
    Route::get('admin/user/remove/admin/{id}', ['uses' => 'AdminUsersController@adminRemove','as' => 'admin.remove.admin']);
    Route::resource('admin/posts', 'AdminPostsController',['names'=>[

        'index'=>'admin.posts.index',
        'create'=>'admin.post.create',
        'store'=>'admin.posts.store',
        'edit'=>'admin.posts.edit'

    ]]);

    Route::get('admin/posts/delete/{id}', ['uses' => 'AdminPostsController@destroy','as' => 'admin.posts.delete']);
    Route::post('admin/posts/update/{id}', ['uses' => 'AdminPostsController@update', 'as' => 'admin.posts.update']);
    Route::get('admin/trash/posts', ['uses' => 'AdminPostsController@trashed', 'as' => 'admin.posts.tIndex']);
    Route::get('admin/kill/post/{id}', ['uses' => 'AdminPostsController@kill', 'as' => 'admin.post.kill']);
    Route::get('admin/restore/post/{id}', ['uses' => 'AdminPostsController@restore', 'as' => 'admin.post.restore']);


    Route::resource('admin/categories', 'AdminCategoriesController',['names'=>[

        'index'=>'admin.category.index',
        'create'=>'admin.category.create',
        'store'=>'admin.category.store',
        'edit'=>'admin.category.edit'
    ]]);

    Route::post('admin/categories/update/{id}', ['uses' => 'AdminCategoriesController@update', 'as' => 'admin.category.update']);
    Route::get('admin/categories/delete/{id}', ['uses' => 'AdminCategoriesController@destroy', 'as' => 'admin.category.delete']);


    Route::get('admin/tags', ['uses' => 'AdminTagsController@index', 'as' => 'admin.tags.index']);
    Route::get('admin/tag/edit/{id}', ['uses' => 'AdminTagsController@edit', 'as' => 'admin.tag.edit']);
    Route::post('admin/tag/update/{id}', ['uses' => 'AdminTagsController@update', 'as' => 'admin.tag.update']);
    Route::post('admin/tag/store', ['uses' => 'AdminTagsController@store', 'as' => 'admin.tag.store']);
    Route::get('admin/tag/delete/{id}', ['uses' => 'AdminTagsController@destroy', 'as' => 'admin.tag.destroy']);


    Route::get('admin/website/pages', ['uses' => 'AdminPagesController@index', 'as' => 'adminPages']);
    Route::get('admin/website/page/edit/{id}', ['uses' => 'AdminPagesController@edit', 'as' => 'adminPage.edit']);
    Route::post('admin/website/page/update/{id}', ['uses' => 'AdminPagesController@update', 'as' => 'adminPage.update']);
    Route::get('admin/website/page/publish/{id}', ['uses' => 'AdminPagesController@publish', 'as' => 'adminPage.Publish']);
    Route::get('admin/website/page/unpublish/{id}', ['uses' => 'AdminPagesController@unPublish', 'as' => 'adminPage.unPublish']);

    Route::get('admin/memberships', ['uses' => 'AdminMembershipController@index', 'as' => 'admin.memberships.index']);
    Route::get('admin/membership/create', ['uses' => 'AdminMembershipController@create', 'as' => 'admin.membership.create']);
    Route::get('admin/membership/edit/{id}', ['uses' => 'AdminMembershipController@edit', 'as' => 'admin.membership.edit']);
    Route::get('admin/membership/delete/{id}', ['uses' => 'AdminMembershipController@destroy', 'as' => 'admin.membership.delete']);
    Route::post('admin/membership/store', ['uses' => 'AdminMembershipController@store', 'as' => 'admin.membership.store']);
    Route::post('admin/membership/update/{id}', ['uses' => 'AdminMembershipController@update', 'as' => 'admin.membership.update']);


    Route::get('admin/ptc', ['uses' => 'AdminPTCController@index', 'as' => 'admin.ptcs.index']);
    Route::get('admin/ptc/create', ['uses' => 'AdminPTCController@create', 'as' => 'admin.ptc.create']);
    Route::post('admin/ptc/create', ['uses' => 'AdminPTCController@store', 'as' => 'admin.ptc.store']);
    Route::get('admin/ptc/delete/{id}', ['uses' => 'AdminPTCController@destroy', 'as' => 'admin.ptc.delete']);
    Route::get('admin/ptc/edit/{id}', ['uses' => 'AdminPTCController@edit', 'as' => 'admin.ptc.edit']);
    Route::post('admin/ptc/update/{id}', ['uses' => 'AdminPTCController@update', 'as' => 'admin.ptc.update']);


    Route::get('admin/ppv', ['uses' => 'AdminPPVController@index', 'as' => 'admin.ppvs.index']);
    Route::get('admin/ppv/create', ['uses' => 'AdminPPVController@create', 'as' => 'admin.ppv.create']);
    Route::post('admin/ppv/create', ['uses' => 'AdminPPVController@store', 'as' => 'admin.ppv.store']);
    Route::get('admin/ppv/delete/{id}', ['uses' => 'AdminPPVController@destroy', 'as' => 'admin.ppv.delete']);
    Route::get('admin/ppv/edit/{id}', ['uses' => 'AdminPPVController@edit', 'as' => 'admin.ppv.edit']);
    Route::post('admin/ppv/update/{id}', ['uses' => 'AdminPPVController@update', 'as' => 'admin.ppv.update']);


    Route::get('admin/gateways', ['uses' => 'AdminGatewaysController@index', 'as' => 'admin.gateways.index']);
    Route::get('admin/gateway/edit/{id}', ['uses' => 'AdminGatewaysController@edit', 'as' => 'admin.gateway.edit']);
    Route::get('admin/gateway/delete/{id}', ['uses' => 'AdminGatewaysController@destroy', 'as' => 'admin.gateway.delete']);
    Route::post('admin/gateway/update/{id}', ['uses' => 'AdminGatewaysController@update', 'as' => 'admin.gateway.update']);


    Route::get('admin/local/gateways', ['uses' => 'AdminGatewaysController@localIndex', 'as' => 'admin.gateways.local']);
    Route::get('admin/local/gateway/edit/{id}', ['uses' => 'AdminGatewaysController@localEdit', 'as' => 'admin.local.edit']);
    Route::get('admin/local/gateway/delete/{id}', ['uses' => 'AdminGatewaysController@localDestroy', 'as' => 'admin.local.delete']);
    Route::post('admin/local/gateway/update/{id}', ['uses' => 'AdminGatewaysController@localUpdate', 'as' => 'admin.local.update']);
    Route::post('admin/local/gateway/create', ['uses' => 'AdminGatewaysController@localStore', 'as' => 'admin.local.store']);
    Route::get('admin/local/gateway/create', ['uses' => 'AdminGatewaysController@localCreate', 'as' => 'admin.local.create']);




    Route::get('admin/kyc/identity', 'AdminKYCController@kyc')->name('adminKyc');
    Route::get('admin/kyc/address', 'AdminKYCController@kyc2')->name('adminKyc2');
    Route::get('admin/kyc/show/data/{id}', 'AdminKYCController@show')->name('adminKycShow');
    Route::get('admin/kyc2/show/data/{id}', 'AdminKYCController@show2')->name('adminKyc2Show');
    Route::get('admin/kyc/identity/verify/accept/{id}', 'AdminKYCController@KycAccept')->name('adminKycAccept');
    Route::get('admin/kyc/identity/verify/reject/{id}', 'AdminKYCController@KycReject')->name('adminKycReject');
    Route::get('admin/kyc/address/verify/accept/{id}', 'AdminKYCController@Kyc2Accept')->name('adminKyc2Accept');
    Route::get('admin/kyc/address/verify/reject/{id}', 'AdminKYCController@Kyc2Reject')->name('adminKyc2Reject');

    Route::get('admin/user/reviews', 'AdminController@review')->name('adminReview');
    Route::get('admin/user/review/publish/{id}', 'AdminController@reviewPublish')->name('adminReview.accept');
    Route::get('admin/user/review/un-publish/{id}', 'AdminController@reviewUnPublish')->name('adminReview.reject');


    Route::get('admin/users/deposit', ['uses' => 'AdminController@userDeposits', 'as' => 'admin.users.deposit']);
    Route::get('admin/users/deposit/local', ['uses' => 'AdminController@localDeposits', 'as' => 'admin.deposit.local']);
    Route::get('admin/users/deposit/local/update/{id}', ['uses' => 'AdminController@localDepositsUpdate', 'as' => 'admin.deposit.update']);
    Route::get('admin/users/deposit/local/fraud/{id}', ['uses' => 'AdminController@localDepositsFraud', 'as' => 'admin.deposit.fraud']);

    Route::get('admin/users/withdraws', ['uses' => 'AdminController@userWithdraws', 'as' => 'admin.users.withdraws']);
    Route::get('admin/users/withdraws/request', ['uses' => 'AdminController@userWithdrawsRequest', 'as' => 'admin.withdraws.request']);
    Route::get('admin/users/withdraw/update/{id}', ['uses' => 'AdminController@payment', 'as' => 'admin.withdraw.update']);
    Route::get('admin/users/withdraw/fraud/{id}', ['uses' => 'AdminController@withdrawFraud', 'as' => 'admin.withdraw.fraud']);

    Route::get('admin/invest/style', 'AdminStyleController@index')->name('adminStyle');
    Route::post('admin/invest/style', 'AdminStyleController@store')->name('adminStyle.post');
    Route::get('admin/invest/style/edit/{id}', 'AdminStyleController@edit')->name('adminStyle.edit');
    Route::post('admin/invest/style/update/{id}', 'AdminStyleController@update')->name('adminStyle.update');
    Route::get('admin/invest/style/delete/{id}', 'AdminStyleController@destroy')->name('adminStyle.delete');

    Route::get('admin/invest/plan', 'AdminInvestController@index')->name('adminInvest');
    Route::get('admin/invest/plan/create', 'AdminInvestController@create')->name('adminInvest.create');
    Route::post('admin/invest/plan', 'AdminInvestController@store')->name('adminInvest.post');
    Route::get('admin/invest/plan/edit/{id}', 'AdminInvestController@edit')->name('adminInvest.edit');
    Route::post('admin/invest/plan/update/{id}', 'AdminInvestController@update')->name('adminInvest.update');
    Route::get('admin/invest/plan/delete/{id}', 'AdminInvestController@destroy')->name('adminInvest.delete');


    Route::get('admin/faqs/index', 'AdminFAQController@index')->name('adminFAQ');
    Route::get('admin/faq/edit/{id}', 'AdminFAQController@edit')->name('adminFAQEdit');
    Route::post('admin/faq/update/{id}', 'AdminFAQController@update')->name('adminFAQUpdate');
    Route::post('admin/faq/create', 'AdminFAQController@store')->name('adminFAQStore');
    Route::get('admin/faq/delete/{id}', 'AdminFAQController@destroy')->name('adminFAQDestroy');

    Route::get('admin/user/supports', 'AdminSupportController@open')->name('adminSupports.open');
    Route::get('admin/user/supports/close', 'AdminSupportController@index')->name('adminSupports.index');
    Route::get('admin/user/support/ticket/view/{ticket}', 'AdminSupportController@show')->name('adminSupport.view');
    Route::post('admin/user/support/create/{ticket}', 'AdminSupportController@store')->name('adminSupport.post');


    Route::get('admin/website/settings', 'SettingsController@index')->name('websiteSettings');
    Route::post('admin/website/settings/general/update/{id}', 'SettingsController@generalSettings')->name('generalSettings');
    Route::post('admin/website/settings/features/update/{id}', 'SettingsController@featuresSettings')->name('featuresSettings');
    Route::post('admin/website/settings/users/update/{id}', 'SettingsController@usersSettings')->name('usersSettings');

    //Route::get('admin/laravel-filemanager', '\UniSharp\LaravelFilemanager\controllers\LfmController@show')->name('laravelFileManager.index');
    //Route::post('admin/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\controllers\UploadController@upload')->name('laravelFileManager.upload');
});

/*
|--------------------------------------------------------------------------
| Web Routes for user
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>'auth'], function (){


    Route::get('user/dashboard', 'HomeController@index')->name('userDashboard');
    Route::get('user/kyc', 'HomeController@kyc')->name('userKyc');
    Route::post('user/kyc', 'HomeController@kycSubmit')->name('userKyc.submit');
    Route::post('user/kyc2', 'HomeController@kyc2Submit')->name('userKyc2.submit');

    Route::get('user/profile', 'UserProfileController@index')->name('userProfile');
    Route::post('user/profile', 'UserProfileController@update')->name('userProfile.update');


    Route::get('user/cash/links', 'UserAdvertsController@cashLinks')->name('userCash.links');
    Route::get('user/cash/link/show/{id}', 'UserAdvertsController@cashLinkShow')->name('userCashLinks.show');
    Route::get('user/cash/link/confirm/{id}', 'UserAdvertsController@cashLinkConfirm')->name('userCashLink.confirm');


    Route::get('user/cash/videos', 'UserAdvertsController@cashVideos')->name('userCash.videos');
    Route::get('user/cash/video/show/{id}', 'UserAdvertsController@cashVideoShow')->name('userCashVideo.show');
    Route::get('user/cash/video/confirm/{id}', 'UserAdvertsController@cashVideoConfirm')->name('userCashVideo.confirm');

    Route::get('user/deposits', 'UserDepositsController@index')->name('userDeposits');
    Route::post('user/deposit/preview', 'UserDepositsController@paymentPreview')->name('userPaymentPreview');
    Route::post('user/deposit/off/confirm', 'UserDepositsController@offline')->name('userDepConfirm');
    Route::get('user/deposit/create', 'UserDepositsController@create')->name('userDeposit.create');
    Route::post('user/deposit/create', 'UserDepositsController@postPayment')->name('userDeposit.post');
    Route::post('user/local/deposit/create', 'UserDepositsController@create')->name('userDeposit.local');

    Route::get('user/funds/transfer', 'UserFundsTransferController@index')->name('userFundsTransfer');
    Route::post('user/funds/transfer', 'UserFundsTransferController@self')->name('userFundsTransfer.self');
    Route::post('user/funds/transfer/others', 'UserFundsTransferController@others')->name('userFundsTransfer.others');

    Route::get('user/withdraws', 'UserWithdrawsController@index')->name('userWithdraws');
    Route::get('user/withdraws/create', 'UserWithdrawsController@create')->name('userWithdraw.create');
    Route::post('user/withdraws/create', 'UserWithdrawsController@postWithdraw')->name('userWithdraw.post');

    Route::get('user/memberships', 'UserMembershipsController@index')->name('userMemberships');
    Route::get('user/membership/upgrade/{id}', 'UserMembershipsController@upgrade')->name('userMembership.upgrade');

    Route::get('user/referrals', 'UsersReferralController@index')->name('userReferrals');
    Route::get('user/earning/history', 'HomeController@earnHistory')->name('userEarns');


    Route::get('user/review', 'HomeController@review')->name('userReview');
    Route::post('user/review', 'HomeController@reviewPost')->name('userReview.post');

    Route::get('user/investments/history', 'UserInterestController@investHistory')->name('userInvest.history');
    Route::get('user/interests/history', 'UserInterestController@interestHistory')->name('userInterest.history');

    Route::get('user/investments', 'UserInterestController@index')->name('userInvestments');
    Route::post('user/investments', 'UserInterestController@submit')->name('userInvestment.submit');
    Route::post('user/investment/order/confirm/', 'UserInterestController@confirm')->name('userInvestment.confirm');


    Route::get('user/supports', 'UserSupportsController@index')->name('userSupports');
    Route::get('user/support/ticket/view/{ticket}', 'UserSupportsController@show')->name('userSupport.view');
    Route::get('user/support/create', 'UserSupportsController@create')->name('userSupport.create');
    Route::get('user/support/ticket/close/{id}', 'UserSupportsController@close')->name('userSupport.close');
    Route::post('user/support/create', 'UserSupportsController@store')->name('userSupport.post');
    Route::post('user/message/create/{ticket}', 'UserSupportsController@message')->name('userMessage.post');



    Route::get('user/deposit/paypal/status', 'UserDepositsController@getPaypalStatus')->name('userDepositPayPal.status');

});