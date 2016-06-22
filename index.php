<?php

require_once "bootstrap.php";

echo 'Adding articles...', PHP_EOL;

$article1 = new Article("CPU");
$entityManager->persist($article1);
$article2 = new Article("RAM");
$entityManager->persist($article2);
$entityManager->flush();

echo 'Creating order with article...', PHP_EOL;

$shopOrder1 = new ShopOrder();
$shopOrder1->createOrderLine($article1);
$entityManager->persist($shopOrder1);
$entityManager->flush();

echo 'Adding some more articles...', PHP_EOL;

$shopOrder1->createOrderLine($article2);
$entityManager->flush();

echo 'End.', PHP_EOL;
