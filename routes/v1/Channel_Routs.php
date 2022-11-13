<?php




use App\Http\Controllers\API\V01\Channel\Channelcontroller;
use Illuminate\Support\Facades\Route;



Route::prefix('/channel')->group(function(){
    Route::get('/all'         ,[Channelcontroller::class , 'grtAllChannelsList'])->name('Channel.all');
    Route::post('/create'     ,[Channelcontroller::class , 'createNewChannel'  ])->name('Channel.CreateNew');
    Route::put('/update'      ,[Channelcontroller::class , 'update'            ])->name('Channel.update');
    Route::delete('/delete'   ,[Channelcontroller::class , 'destroy'           ])->name('Channel.delete');
});
