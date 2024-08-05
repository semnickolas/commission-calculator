# commission-calculator

1 step:

`docker-compose up -d --build`

2 step:

`docker-compose exec commission_calculator_app bash` 

3 step:

`bin/console calculate-commission {filepath}`

Tests:

`bin/phpunit`