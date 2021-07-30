#!/bin/bash
kill -9 $(ps | grep "php artisan serve" | awk '{ print $1 }') &
kill -9 $(ps | grep "php artisan schedule:work" | awk '{ print $1 }') &

