<?php

    //class
    class mobil {
        //atibut / property
        private $odoMtr;

        //method
        function __construct()
        {
            $this->odoMtr = 1000;
        }

        public function nyalakan($mode1, $type){
            return"Nyalakan mobil $mode1 - $type";
        }

        public function berjalan($km){
            return $this->odoMtr + $km;
        }
    }

    //object
    $mobil1 = new mobil();
    
    //method
    echo $mobil1->nyalakan("Tesla", "Roadster");
    echo "Berjalan sejauh : " . $mobil1->berjalan(500);

?>