# rabbitmq-demo

## Requirements
php-cli, [composer](https://getcomposer.org/download/)

## Instructions
1. clone repository
1. change dir `$ cd rabbitmq-demo/2-work-queues/`
1. run `$ composer --working-dir=worker/src/code/ install`
1. run `docker-compose up -d --scale worker=2 ; watch docker-compose logs -f worker`
1. in another console run tasks `./produce-workload.sh 6`, but wait until you have message from workers similar to the following. 
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

To have more fun you can produce for instnace 20 jobs and then, in another console increase number of workers to let say 5 (`docker-compose scale workder=5`). Of course you change this number, the main idea is to watch how the whole thing behave under different workload.

INFO: RabbitMQ manager panel is at `http://localhost` user/pass: `guest`
