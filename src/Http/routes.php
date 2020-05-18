<?php

const ZOOP_CONTROLER = 'LevanteLab\Zoop\Http\Controllers\ZoopController@';

Route::group(['middleware' => ['web', 'theme', 'locale', 'currency']], function () {
    Route::prefix('zoop')->group(function () {
        Route::get('/', ZOOP_CONTROLER . 'index')->name('zoop.index');
        Route::post('/pay', ZOOP_CONTROLER . 'pay')->name('zoop.pay');
        Route::get('/cancel', ZOOP_CONTROLER . 'cancel')->name('zoop.cancel');
        // Route::post('/notify', ZOOP_CONTROLER . 'notify')->name('zoop.notify');
        // Route::get('/success/{reference}', ZOOP_CONTROLER . 'success')->name('wirecard.success');

        // Route::get('/createwebhook', ZOOP_CONTROLER . 'createWebhook')->name('wirecard.createwebhook');
        // Route::get('/listwebhook', ZOOP_CONTROLER . 'listWebhook')->name('wirecard.listwebhook');
        // Route::get('/deletewebhook/{notification_id}', ZOOP_CONTROLER . 'deleteWebhook')->name('wirecard.deletewebhook');
    });
});