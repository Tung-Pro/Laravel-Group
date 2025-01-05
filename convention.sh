echo "Testing PSR-2"
phpcs -- standard=PSR2 -- sniffs=Generic.PHP.LowerCaseConstant tests
phpcs -- standard=PSR2 app/Models
phpcs -- standard=PSR2 app/Http/Controllers
php vendor/bin/phpcs --standard=PSR2 app/Http/Controllers
php vendor/bin/phpcbf --standard=PSR2 app/Http/Controllers

