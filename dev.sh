#install dependencies
composer install

# Run the Laravel migrations
php artisan migrate:refresh

# Install Laravel Passport
php artisan passport:install

# Seed the Users table
php artisan db:seed --class=UsersTableSeeder

# Check if the storage/public/news directory exists
if [ -d "storage/app/public/news" ]; then
    echo "Clearing storage/app/public/news directory..."
    rm -rf storage/app/public/news/*
fi

echo "Finished executing commands."