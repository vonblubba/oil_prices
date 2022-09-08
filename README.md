# Test exercise for Buzzoole

Disclaimer: as I said during our phone call, I'm currently working on RubyOnRails, so I'm not up to speed to the latest Laravel updates/best practices. So, there's probably margin for improvement in my code. Please be merciful while reviewing :-)

## A few considerations
- I chose the oil price tags exercise
- I chose to use Laravel (latest version)
- I chose a sqlite db (more than enough for a test exercise)
- I did not implement authentication. Sorry, not enough time for that!

## Project details
- I implemented a *PriceTagUpdater* service that retrieves the remote price tags JSON and stores it in the local db. It is executed at application startup.


## Exemple RPC call

Required procedure can be called like this:
curl 'http://127.0.0.1:8000/api/v1/oil' --data-binary '{"jsonrpc":"2.0","method":"oil@trend","id":1, "params": {"from_date": "2022-01-01", "to_date": "2022-02-01"} }'