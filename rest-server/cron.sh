#!/bin/bash

while :
do
	echo "Fired!"
	php artisan schedule:run 1>> /dev/null 2>&1	
	sleep 60
done
