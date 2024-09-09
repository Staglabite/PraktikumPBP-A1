<?php
    // Nama : Mochammad Qaynan Mahdaviqya
    // NIM  : 24060122140170

    $array_mhs = array('Abdul' => array(89, 90, 54),
                     'Budi' => array(78, 60, 64),
                     'Nina' => array(67, 56, 84),
                     'Budi' => array(87, 69, 50),
                     'Budi' => array(98, 65, 74)
                    );
    echo'<table border="1">';
    echo'<tr>
            <td>Nama</td>
            <td>Nilai 1</td>
            <td>Nilai 2</td>
            <td>Nilai 3</td>
            <td>Rata2</td>
    </tr>';
    
    //fungsi hitung_rata
    function hitung_rata($nilai){
        $rata2 = (($nilai[0] + $nilai[1] + $nilai[2]) / 3);
        return $rata2;
    }

    //fungsi print_mhs
    function print_mhs($array_mhs){
        foreach($array_mhs as $nama => $nilai){
            echo '<tr>';
            echo '<td>'.$nama.'</td>';
            echo '<td>'.$nilai[0].'</td>';
            echo '<td>'.$nilai[1].'</td>';
            echo '<td>'.$nilai[2].'</td>';
            $rata2 = hitung_rata($nilai);
            echo '<td>'.$rata2.'</td>';
            echo '</tr>';
        }
    }

    print_mhs($array_mhs);
?>

