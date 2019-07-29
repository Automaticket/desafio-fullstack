<?php

Route::fallback(function() {
    return response()->json(['message' => 'Not Found!'], 404);
});

Route::any('{any}', function(){
    return view('spa');       
})->where('any', '^(?!api).*$');
