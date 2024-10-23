<?php
include "bankAccount.php";

class SavingsAccount extends BankAccount {
    private static float $interestRate = 0.05;

    public static function setInterestRate(float $rate) {
        if ($rate < 0) {
            throw new Exception("Відсоткова ставка не може бути від'ємною.");
        }
        self::$interestRate = $rate;
    }

    public function applyInterest() {
        $interest = $this->balance * self::$interestRate;
        $this->balance += $interest;
        echo "Застосовано відсоткову ставку: $interest {$this->currency}\n";
    }
}