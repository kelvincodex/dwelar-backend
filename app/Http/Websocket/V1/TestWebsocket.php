<?php

namespace App\Http\Websocket\V1;

use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;

class TestWebsocket extends BaseWebsocket implements MessageComponentInterface
{

    public function onMessage(ConnectionInterface $conn, MessageInterface $msg)
    {
        // TODO: Implement onMessage() method.
    }
}
