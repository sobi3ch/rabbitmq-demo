<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

# settings
define("QUEUE", "raports");

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'produce':
            produce();
            break;
        case 'consume':
            consume();
            break;
    }
}

function initialize(&$conn, &$channel) {
  $conn = new AMQPStreamConnection('broker', 5672, 'guest', 'guest');
  $channel = $conn->channel();
  list($queue, $messageCount, $consumerCount) = $channel->queue_declare(QUEUE, false, false, false, false);

  return $messageCount;
}

function produce() {
  initialize($connection, $channel);
  session_start();
  if(isset($_SESSION['raports_number'])) {
   $_SESSION['raports_number']=$_SESSION['raports_number']+1;
  } else {
   $_SESSION['raports_number']=1;
  }
  $msg_body = $_SESSION['raports_number'];
  $msg = new AMQPMessage($msg_body);
  $channel->basic_publish($msg, '', QUEUE);
  
  $channel->close();
  $connection->close();

  echo $msg_body;
  exit;
}

function consume() {
  $msgCount = initialize($connection, $channel);

  if ($msgCount > 0) {
    $message = $channel->basic_get(QUEUE);
    // sleep(2); // Simulate heavy process time for each message
    $channel->basic_ack($message->delivery_info['delivery_tag']);

    $channel->close();
    $connection->close();

    echo $message->body;
  }
  exit;
}