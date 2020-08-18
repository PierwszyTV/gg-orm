### Create project

1. Run `composer install`
2. Create database
3. Set database credentials in .env or .env.local
4. Run `bin/console doctrine:migrations:diff`
5. Migrate database by `bin/console doctrine:migrations:migrate`
6. If you have global installed Symfony package you can run `symfony server:start`
7. Enjoy you app at '/tickets' route! :)


PS. Closure function is in /src/Service/TicketService.php