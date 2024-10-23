<?php
include "accountInterface.php";

class BankAccount implements AccountInterface {
    const MIN_BALANCE = 0;

    protected float $balance;
    protected string $currency;

    public function __construct(string $currency, float $initialBalance = 0) {
        $this->currency = $currency;
        $this->balance = $initialBalance;
    }

    public function deposit(float $amount) {
        if ($amount <= 0) {
            throw new Exception("Сума поповнення повинна бути більшою за нуль.");
        }
        $this->balance += $amount;
        echo "Поповнено: $amount {$this->currency}<br>";
    }

    public function withdraw(float $amount) {
        if ($amount <= 0) {
            throw new Exception("Сума зняття повинна бути більшою за нуль.");
        }
        if ($this->balance - $amount < self::MIN_BALANCE) {
            throw new Exception("Недостатньо коштів.");
        }
        $this->balance -= $amount;
        echo "Знято: $amount {$this->currency}<br>";
    }

    public function getBalance(): float {
        return $this->balance;
    }
}