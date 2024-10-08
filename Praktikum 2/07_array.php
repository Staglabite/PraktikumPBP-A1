<?php
    // Nama : Mochammad Qaynan Mahdaviqya
    // NIM  : 24060122140170
    
    // NUMERIC ARRAY********************************************
    echo '<br />NUMERIC ARRAY<br />';
    //assignment melalui array identifier
    for ($i=0;$i<10;$i++){
        $diskon[] = $i * 5;
    }

    //assignment menggunakan fungsi array
    // $diskon = array(0,10,20,30,40,50,60,70,80,90);
    
    //cek apakah sebuah variabel bertipe array
    if (is_array($diskon)){
        echo 'Array <br/>';
    } else{
        echo 'Not Array <br/';
    }

    //menampilkan isi array
    $n = sizeof($diskon);
    for($i=0;$i<=($n-1);$i++){
        echo 'Diskon hari ke-'.($i+1).' = '.$diskon[$i].' % <br />';
    }

    // Percobaan 1 ============================================= 
    $disc = array(60,20,50,90,0,70,10,30,80,40);

    // TODO urutkan array disc tersebut dengan menggunakan ksort()
    // Mengurutkan array menggunakan ksort()
    echo '<br />Urutkan dengan ksort()<br />';
    ksort($diskon);
    // Menampilkan isi array setelah diurutkan
    foreach($diskon as $key => $value){
        echo 'Diskon hari ke-'.($key+1).' = '.$value.' % <br />';
    }


    // TODO urutkan array disc tersebut dengan menggunakan asort()
    // Mengurutkan array menggunakan asort()
    echo '<br />Urutkan dengan asort()<br />';
    asort($diskon);
    // Menampilkan isi array setelah diurutkan
    foreach($diskon as $key => $value){
        echo 'Diskon hari ke-'.($key+1).' = '.$value.' % <br />';
    }

    // TODO urutkan array disc tersebut dengan menggunakan sort()
    // Mengurutkan array menggunakan sort()
    echo '<br />Urutkan dengan sort()<br />';
    sort($diskon);
    // Menampilkan isi array setelah diurutkan
    $n = sizeof($diskon);
    for($i=0;$i<$n;$i++){
        echo 'Diskon ke-'.($i+1).' = '.$diskon[$i].' % <br />';
    }



    // ASSOSIATIVE ARRAY********************************************
    echo '<br />ASSOSIATIVE ARRAY<br />';
    //assignment menggunakan fungsi array
    $bulan = array('jan' => 'Januari', 
        'feb' => 'Februari',
        'mar' => 'Maret',
        'apr' => 'April',
        'mei' => 'Mei',
        'jun' => 'Juni',
        'jul' => 'Juli',
        'agu' => 'Agustus',
        'sep' => 'Sepetember',
        'okt' => 'Oktober',
        'nov' => 'November',
        'des' => 'Desember');
    foreach($bulan as $kode_bulan => $nama_bulan){
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }

    // Percobaan 2 =============================================     
    // TODO urutkan array bulan tersebut dengan menggunakan ksort()
    echo '<br />Urutkan array bulan dengan ksort()<br />';
    ksort($bulan);
    // Menampilkan isi array setelah diurutkan
    foreach($bulan as $kode_bulan => $nama_bulan){
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }

    // TODO urutkan array bulan tersebut dengan menggunakan asort()
    echo '<br />Urutkan array bulan dengan asort()<br />';
    asort($bulan);
    // Menampilkan isi array setelah diurutkan
    foreach($bulan as $kode_bulan => $nama_bulan){
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }

    // TODO urutkan array bulan tersebut dengan menggunakan sort()
    echo '<br />Urutkan array bulan dengan sort()<br />';
    sort($bulan);
    // Menampilkan isi array setelah diurutkan
    foreach($bulan as $nama_bulan){
        echo 'Nama bulan: '.$nama_bulan.'<br />';
    }

?>