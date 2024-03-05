<?php

class Company {
    public $name;
    public $location;
    public $tot_employees;

    public function __construct($name, $location, $tot_employees = 0) {
        $this->name = $name;
        $this->location = $location;
        $this->tot_employees = $tot_employees;
    }

    public function printEmployees() {
        if ($this->tot_employees > 0) {
            echo "L'azienda {$this->name} con sede in {$this->location} ha ben {$this->tot_employees} dipendenti.\n";
        } else {
            echo "L'azienda {$this->name} con sede in {$this->location} non ha dipendenti.\n";
        }
    }

    public function calculateAnnualExpense() {
        return $this->tot_employees * 30000;
    }

    public static function calculateTotalExpense($companies) {
        $total = 0;
        foreach ($companies as $company) {
            $total += $company->calculateAnnualExpense();
        }
        return $total;
    }

    public static function printTotalExpense($total) {
        echo "La spesa annuale totale di tutte le aziende è di $total dollari.\n";
    }
}

// Creo le aziende
$companies = [
    new Company("Aulab", "Italia", 50),
    new Company("Samsung", "USA", 100),
    new Company("Apple", "Francia", 200),
    new Company("Meta", "Germania", 75),
    new Company("Nokia", "Spagna", 0)
];

// Stampo i dipendenti per ogni azienda
foreach ($companies as $company) {
    $company->printEmployees();
}

// Stampo le spese delle singole aziende
foreach ($companies as $company) {
    $expense = $company->calculateAnnualExpense();
    echo "La spesa annuale per l'azienda {$company->name} è di $expense dollari.\n";
}

// Stampo le spese di tutte le aziende
$totalExpense = Company::calculateTotalExpense($companies);
Company::printTotalExpense($totalExpense);










function checkPassword($password) {
    $length = 0;
    $uppercase = false;
    $number = false;
    $specialChar = false;

    // Controllo lunghezza dela password
    foreach ($password as $char) {
        $length++;
    }
    if ($length < 8) {
        echo "La password deve contenere almeno 8 caratteri.\n";
        return false;
    }

    // Controllo lettera maiuscola, carattere speciale e numero 
    foreach ($password as $char) {
        if ($char >= 'A' && $char <= 'Z') {
            $uppercase = true;
        } elseif ($char >= '0' && $char <= '9') {
            $number = true;
        } elseif (!($char >= 'a' && $char <= 'z')) {
            $specialChar = true;
        }
    }

    if (!$uppercase) {
        echo "La password deve contenere almeno una lettera maiuscola.\n";
        return false;
    }

    if (!$number) {
        echo "La password deve contenere almeno un carattere numerico.\n";
        return false;
    }

    if (!$specialChar) {
        echo "La password deve contenere almeno un carattere speciale.\n";
        return false;
    }

    return true;
}

// chiede all'utente di inserire una password
function askForPassword() {
    echo "Inserisci la password con un carattere maiuscolo un numero e un carattere speciale: ";
    $password = readline();
    return str_split($password);
}

do {
    $password = askForPassword();
} while (!checkPassword($password));

echo "Password accettata!\n";




 

?>

