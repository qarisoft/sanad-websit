<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

// use Symfony\Component\;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            \App\Http\Middleware\HandleInertiaRequests::class,
            \Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets::class,
        ]);

        //
    })
    ->withExceptions(function (Exceptions $exceptions) {

        // $exceptions->render(function () {
        //     // if ($request->is('api/*')) {
        //     //     return response()->json([
        //     //         'message' => 'Record not found.',
        //     //     ], 404);
        //     // }
        //     return [
        //         'message' => 'dsadas',
        //     ];

        // });
        $exceptions->shouldRenderJsonWhen(fn ($request, Throwable $e) => $request->is('api/*'));

        $exceptions->respond(function (Response $response, Throwable $e, $request) {
            // if ($request->is('api/*')) {
            //     if ($e instanceof NotFoundHttpException) {
            //         return response()->json([
            //             'message' => 'not found',
            //         ], Response::HTTP_NOT_FOUND);
            //     }
            // }

            return $response;
        });
        // if () {
        //     # code...
        // }
        // $exceptions->shouldRenderJsonWhen(function (Request $request, Throwable $e) {
        //     // if ($request->is('api/*')) {
        //     //     // return $request->expectsJson();
        //     // }
        //     return true;

        // });
    })

    ->create();
