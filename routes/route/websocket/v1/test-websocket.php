<?php


use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;

WebSocketsRouter::webSocket("/socket/test/websocket", \App\Http\Websocket\V1\TestWebsocket::class);
