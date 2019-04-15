# Azzier Microservice project based off the Lumens Framework
The Azzier Microservice is a middleware service that will be used to communicate between Azzier and our local cache. This will keep a consistent dataset between our cache and Azzier. This microservice uses the Lumens PHP framework along with the [nordsoftware/lumen-dynamodb](https://github.com/digiaonline/lumen-dynamodb)

## Getting Started
Clone the project. 
* Run a composer install using `composer install --ignore-platform-reqs`. 
* Copy the .env.example file as **.env** using `cp .env.eample .env`. 
* Copy config/database.php.example to config/database.php using `cp database.php.eample database.php` and config to use the production/local database

