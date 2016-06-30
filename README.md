# doctrine2-bug-doctrine-bidirectional-association

## Installation
```sh
composer install
vendor/bin/doctrine orm:schema-tool:update --dump-sql --force
```

## Run test
```sh
php index.php
```

## Result
```
Adding articles...
Creating order with article...
Adding some more articles...

Fatal error: Uncaught exception 'Doctrine\ORM\ORMInvalidArgumentException' with message 'A new entity was found through the relationship 'Article#orderLines' that was not configured to cascade persist operations for entity: OrderLine@0000000051952ced000000004c9b4459. To solve this issue: Either explicitly call EntityManager#persist() on this unknown entity or configure cascade persist  this association in the mapping for example @ManyToOne(..,cascade={"persist"}). If you cannot find out which entity causes the problem implement 'OrderLine#__toString()' to get a clue.' in vendor/doctrine/orm/lib/Doctrine/ORM/ORMInvalidArgumentException.php:92
```
