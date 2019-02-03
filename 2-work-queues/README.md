# rabbitmq-demo

## Requirements
php-cli, [composer](https://getcomposer.org/download/)

## Instructions
1. clone repository
1. change dir `$ cd rabbitmq-demo/2-work-queues/`
1. run `$ composer --working-dir=worker/src/code/ install`
1. run `docker-compose up -d --scale worker=2 ; watch docker-compose logs -f worker`
1. in another console run tasks `./produce-workload.sh 6`, but wait until you have message from workers similar to those. 
```
worker_1  | wait-for-it.sh: waiting 30 seconds for broker:5672
worker_2  | wait-for-it.sh: waiting 30 seconds for broker:5672
worker_2  | wait-for-it.sh: broker:5672 is available after 18 seconds
worker_2  |  [*] Waiting for messages. To exit press CTRL+C
worker_1  | wait-for-it.sh: broker:5672 is available after 18 seconds
worker_1  |  [*] Waiting for messages. To exit press CTRL+C
```
This will produce 6 jobs to consume. Each one with number of seconds as its ID 
number. So in this example first job will take 1 second, second 2 seconds, you
get the idea.

INFO: RabbitMQ manager panel is at `http://localhost` user/pass: `guest`
