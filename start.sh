#!/bin/bash
php artisan schedule:work >> /dev/null 2>&1 &
php artisan serve >> /dev/null 2>&1 &