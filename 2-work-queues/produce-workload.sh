#!/bin/bash

if [ -z "$1" ]
then
  echo "No argument supplied"
	exit
fi

for TASK in $(seq $1)
do 
	docker-compose exec worker \
		php new_task.php \#$TASK report$(php render_dots.php $TASK)
done