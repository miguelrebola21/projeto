<?php

Route::filter('auth', function(){
dd('dsadsa');
if (Auth::guest()) {

if (Request::ajax())
{

$response = array( 'success' => false, 'status' => 'You do not have access to this section');

return Response::json($response)->setCallback(Input::get('callback'));
} else {

return Redirect::guest('');
}
}
});
?>