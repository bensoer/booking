<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    /**$app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });**/

    // GET /user/{guid}
    // GET /user/{guid}/roles
    // GET /user/{guid}/apikeys
    // GET /user/{guid}/bookings - Get all bookings user is part of
    $app->group('/user', function(Group $group){
        $group->post('', \App\Application\Actions\User\CreateUserAction::class)->setName("CreateUser");
        $group->get('', \App\Application\Actions\User\GetAllUserAction::class)->setName("GetAllUsers");
        $group->get('/{guid}', \App\Application\Actions\User\GetUserAction::class)->setName("GetUser");
    });

    // GET /roles
    // GET /role
    // POST /role
    // DELETE /role/{guid}

    // POST /auth/login
    // POST /auth/logout

    // GET /packages
    // GET /package/{guid}
    // POST /package
    // DELETE /package/{guid}

    // GET /bookingtypes
    // POST /bookingtype
    // DELETE /bookingtype/{guid}

    // POST /booking - Create a new booking
    // PUT /booking/{guid} - Update a booking
    // DELETE /booking/{guid} - Delete a booking
    // GET /booking/{guid}
    // GET /booking/{guid}/users - Get all users of a booking

};
