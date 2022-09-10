# Test exercise

Disclaimer: as I said during our phone call, I'm currently working on Ruby On Rails, so I'm not up to speed to the latest Laravel developments/best practices. So, there's certainly margin for improvement in my code. Please be patient while reviewing :-)

## A few considerations
- I chose the oil price tags exercise
- I chose to use Laravel (latest version)
- I chose a sqlite db (more than enough for a test exercise)
- I did not implement authentication for RPC. Sorry, not enough time for that!
- I wrote basic Dockerfile / docker-compose.yml files to run a dockerized dev environment
- I normally have a Test Driven approach to development. That is, I always write specs first, then the actual implementation. I find that specs are a great tool for designing functionalities. In this context, since I'm not fresh non PHPunit syntax, I was not sure I would have enough time to write tests, so I chose to write the implementation first and tests later. Please do not consider this as my usual way to do things.
- Many improvements could be made to the app:
  - pagination on RPC response
  - RPC authentication
  - improve tests
  - download price trends only once at startup instead of at every request (I tried a singleton for this in `AppServiceProvider` but for some reason it didn't work, I'd need a little more time to figure it out).

## Project details
- I implemented a *PriceTagUpdater* service that retrieves the remote price tags JSON and stores it in the local db. It is executed at application startup.
- I implemented a *GetOilPriceTrendSpec* class and registered a route on `/v1/oil` endpoint for RPC

## Running the app
App can be run either with `php artisan serve` (assuming a local PHP 8.1 enviroment is installed), or with docker running `docker compose up`. In either case, app will be available at `127.0.0.1:8000`

Tests (PHPunit) can be run with `php artisan test`

## Exemple RPC call

Required procedure can be called like this:

curl 'http://127.0.0.1:8000/api/v1/oil' --data-binary '{"jsonrpc":"2.0","method":"oil@trend","id":1, "params": {"from_date": "2022-01-01", "to_date": "2022-02-01"} }'
