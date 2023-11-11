<?php

namespace App\Http\Websocket\V1;

use Ratchet\ConnectionInterface;

abstract class BaseWebsocket
{
    function onOpen(ConnectionInterface $conn)
    {
        // TODO: Implement onOpen() method.
        dump("onOpen");
    }

    function onClose(ConnectionInterface $conn)
    {
        // TODO: Implement onClose() method.
        dump("onClose");
    }

    function onError(ConnectionInterface $conn, \Exception $e)
    {
        // TODO: Implement onError() method.
        dump("onError");
    }
}
