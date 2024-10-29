#!bin/bash

composer i

php -d variables_order=EGPCS artisan octane:start --server=roadrunner --host=0.0.0.0 --workers=1 --max-requests=1 --rpc-port=6001 --port=8080
