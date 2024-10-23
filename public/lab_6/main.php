<?php
include "savingsAccount.php";

try {
    $account = new BankAccount("USD", 100);
    echo "Баланс рахунку: " . $account->getBalance() . " USD<br>";
    $account->deposit(50);
    echo "Баланс після поповнення: " . $account->getBalance() . " USD<br>";
    $account->withdraw(30);
    echo "Баланс після зняття: " . $account->getBalance() . " USD<br>";

    $savings = new SavingsAccount("USD", 200);
    echo "Баланс накопичувального рахунку: " . $savings->getBalance() . " USD<br>";
    $savings->applyInterest();
    echo "Баланс після застосування відсоткової ставки: " . $savings->getBalance() . " USD<br>";

    $account->deposit(-10);
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "<br>";
}

try {
    $account->withdraw(500);
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage();
}