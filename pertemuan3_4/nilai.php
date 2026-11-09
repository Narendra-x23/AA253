<?php

    //class
    class Nilai {
        //method
        public function getNilaiRataRata($nTugas, $nKuis, $nUTS, $nUAS) {
            return ($nTugas + $nKuis + $nUTS + $nUAS) / 4;
        }
    }

    //object
    $nilai = new Nilai();

    //method
    echo "Nilai rata-rata : " . $nilai->getNilaiRataRata(80, 80, 85, 90);

?>