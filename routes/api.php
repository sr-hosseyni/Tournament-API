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

    $api->resources([
        'group' => Tournament\API\V1\Controllers\GroupController::class,
        'stage' => Tournament\API\V1\Controllers\StageController::class,
        'team' => Tournament\API\V1\Controllers\TeamController::class,
        'match' => Tournament\API\V1\Controllers\MatchController::class,
        'match-fact' => Tournament\API\V1\Controllers\MatchFactController::class,
        'user' => Tournament\API\V1\Controllers\UserController::class,
        'profile' => Tournament\API\V1\Controllers\ProfileController::class,
        'invitation' => Tournament\API\V1\Controllers\InvitationController::class,
        'tournament' => Tournament\API\V1\Controllers\TournamentController::class,
        'invitaion-mail' => Tournament\API\V1\Controllers\InvitationMailController::class,
    ]);

    $api->post('group/{groupId}/team', \Tournament\API\V1\Controllers\GroupController::class . '@addTeam');
    $api->get('generator/{groupId}/matches', \Tournament\API\V1\Controllers\GeneratorController::class . '@matches');
    $api->get('standing/{groupId}/summary', \Tournament\API\V1\Controllers\StandingController::class . '@summary');
});
