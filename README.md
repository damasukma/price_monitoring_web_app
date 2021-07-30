## Documentation

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/damasukma/price_monitoring_web_app.git
   ```
2. Composer install (composer v2, because my laravel version 8.0)
   ```sh
   composer install
   ```
3. Create file `.env` and you can copy the content for file .fenv
   ```sh
        APP_NAME=Laravel
        APP_ENV=local
        APP_KEY=
        APP_DEBUG=true
        APP_URL=http://localhost
        
        LOG_CHANNEL=stack
        LOG_LEVEL=debug
        
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=
        DB_DATABASE=
        DB_USERNAME=
        DB_PASSWORD=
        
        BROADCAST_DRIVER=log
        CACHE_DRIVER=file
        FILESYSTEM_DRIVER=local
        QUEUE_CONNECTION=redis
        SESSION_DRIVER=file
        SESSION_LIFETIME=120
        
        MEMCACHED_HOST=127.0.0.1
        
        REDIS_HOST=127.0.0.1
        REDIS_PASSWORD=null
        REDIS_PORT=6379
        
        MAIL_MAILER=smtp
        MAIL_HOST=mailhog
        MAIL_PORT=1025
        MAIL_USERNAME=null
        MAIL_PASSWORD=null
        MAIL_ENCRYPTION=null
        MAIL_FROM_ADDRESS=null
        MAIL_FROM_NAME="${APP_NAME}"
        
        AWS_ACCESS_KEY_ID=
        AWS_SECRET_ACCESS_KEY=
        AWS_DEFAULT_REGION=us-east-1
        AWS_BUCKET=
        AWS_USE_PATH_STYLE_ENDPOINT=false
        
        PUSHER_APP_ID=
        PUSHER_APP_KEY=
        PUSHER_APP_SECRET=
        PUSHER_APP_CLUSTER=mt1
        
        MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
        MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

   ```
4. generate key  
   ```sh
   php artisan key:generate
   ```
5. create database and dont forget for set variable in file .env (DB_DATABASE,DB_USERNAME,DB_PASSWORD)
   ```sh
   php artisan make:database
   ```
6. run migration table
   ```sh
   php artisan migrate
   ```
7. and run the server
   ```sh
   php artisan serve
   ```


   
