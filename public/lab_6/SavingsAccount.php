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
<<<<<<< HEAD
        echo "Застосовано відсоткову ставку: $interest {$this->currency}<br>";
=======
        echo "Застосовано відсоткову ставку: $interest {$this->currency}\n";
>>>>>>> 117ce011cf614d4206e0b7ef9371bf3524cf7263
    }
}