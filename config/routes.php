<?php

declare(strict_types=1);

use App\Bucket\CreateObject;
use App\Bucket\DeleteObject;
use App\Bucket\ExistObject;
use Mezzio\Application;
use Mezzio\MiddlewareFactory;
use Psr\Container\ContainerInterface;
use App\Bucket\ListObject;
use App\Bucket\ShareObject;
use App\Bucket\UpdateObject;
use Mezzio\Helper\BodyParams\BodyParamsMiddleware;

/**
 * FastRoute route configuration
 *
 * @see https://github.com/nikic/FastRoute
 *
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Handler\HomePageHandler::class, 'home');
 * $app->post('/album', App\Handler\AlbumCreateHandler::class, 'album.create');
 * $app->put('/album/{id:\d+}', App\Handler\AlbumUpdateHandler::class, 'album.put');
 * $app->patch('/album/{id:\d+}', App\Handler\AlbumUpdateHandler::class, 'album.patch');
 * $app->delete('/album/{id:\d+}', App\Handler\AlbumDeleteHandler::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Handler\ContactHandler::class,
 *     Mezzio\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */


return function (Application $app, MiddlewareFactory $factory, ContainerInterface $container): void {
    $app->get('/api/v1/objects', ListObject::class, 'api.v1.objects.list');
    $app->post('/api/v1/objects', CreateObject::class, 'api.v1.objects.create');
    $app->get('/api/v1/objects/share',  ShareObject::class, 'api.v1.objects.share');    
    $app->get('/api/v1/objects/exist', ExistObject::class, 'api.v1.objects.exist');
    $app->route('/api/v1/objects', DeleteObject::class, ['DELETE'],'api.v1.objects.delete' ); //might need something
    $app->route('/api/v1/objects', UpdateObject::class,  ['PATCH', 'PUT'],'api.v1.objects.update' ); //might need something
};
