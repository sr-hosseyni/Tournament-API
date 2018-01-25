<?php

use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'auth'], function(Router $api) {
        $api->post('signup', 'Tournament\\Api\\V1\\Controllers\\SignUpController@signUp');
        $api->post('login', 'Tournament\\Api\\V1\\Controllers\\LoginController@login');

        $api->post('recovery', 'Tournament\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'Tournament\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');
    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {
        $api->get('protected', function() {
            return response()->json([
                'message' => 'Access to protected resources granted! You are seeing this text as you provided the token correctly.'
            ]);
        });

        $api->get('refresh', [
            'middleware' => 'jwt.refresh',
            function() {
                return response()->json([
                    'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
                ]);
            }
        ]);
    });

    $api->get('hello', function() {


        return response()->json([
            'message' => 'This is a simple example of item returned by your APIs. Everyone can see it.'
        ]);
    });

    $api->resource('team', Tournament\API\V1\Controllers\TeamController::class);
    $api->resource('match', Tournament\API\V1\Controllers\MatchController::class);
    $api->resource('match-fact', Tournament\API\V1\Controllers\MatchFactController::class);
    $api->resource('user', Tournament\API\V1\Controllers\UserController::class);
    $api->resource('profile', Tournament\API\V1\Controllers\ProfileController::class);
    $api->resource('invitation', Tournament\API\V1\Controllers\InvitationController::class);
    $api->resource('tournament', Tournament\API\V1\Controllers\TournamentController::class);
    $api->resource('invitaion-mail', Tournament\API\V1\Controllers\InvitationMailController::class);
});
