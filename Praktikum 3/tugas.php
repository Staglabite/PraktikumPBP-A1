<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <title>Form Input Siswa</title>

    <script>
        function pilihanKelas() {
            let kelas = document.forms['form_input_siswa']['kelas'].value;
            let eksCheckboxes = document.getElementById("ekskul");
            
            if (kelas == "XII"){
                eksCheckboxes.style.display = 'none';
                } else {
                    eksCheckboxes.style.display = 'block';
                }
        }

        function resetForm(){
            document.getElementById("form_input_siswa").reset();
        }
    </script>
</head>
<body>
    <?php
        if(isset($_POST['submit'])){
            // Validasi NIS: tidak boleh kosong hanya terdiri dari 10 karakter dengan angka 0-9
            $nis = test_input($_POST['nis']);
            if (empty($nis)){
                $error_nis = "NIS harus diisi";
            }
            elseif(!preg_match("/^[0-9]*$/",$nis)){
                $error_nis = "NIS hanya boleh terdiri dari angka 0-9";
            }
            elseif(strlen($nis) != 10){
                $error_nis = "NIS harus memiliki panjang 10 karakter";
            }

            // Validasi Nama: tidak boleh kosong hanya terdiri dari huruf dan spasi  
            $nama = test_input($_POST['nama']);
            if (empty($nama)){
                $error_nama = "Nama harus diisi";
            }
            elseif(!preg_match("/^[a-zA-Z ]*$/", $nama)){
                $error_nama = "Nama hanya dapat berisi huruf dan spasi";
            }

            // Validasi Jenis Kelamin: tidak boleh kosong
            if(empty($_POST['jenis_kelamin'])){
                $error_jenis_kelamin = 'Jenis kelamin harus diisi';
            } else{
                $jenis_kelamin = $_POST['jenis_kelamin'];
            }

            // Validasi Kelas: tidak boleh kosong
            $kelas = isset($_POST['kelas'])? $_POST['kelas']: '';
            if($kelas == '' || $kelas == 'kelas'){
                $error_kelas = "Kelas harus diisi";
            }

            // Validasi Ekstrakurikuler: kelas x dan xi tidak boleh kosong, pilih minimal 1 dan maksimal 3 ektrakurikuler
            if (empty($_POST['ekstrakurikuler']) && $kelas != 'XII'){
                $error_ekstrakurikuler = 'Ekstrakurikuler harus diisi';
            } elseif ($kelas != 'XII'){
                $ekstrakurikuler = $_POST['ekstrakurikuler'];
                if (count($ekstrakurikuler) >  3){
                    $error_ekstrakurikuler = 'Pilih maksimal 3 ekstrakurikuler';
                }
            }

        }
        
        function test_input($data) {
            $data = trim($data); 
            $data = stripslashes($data); 
            $data = htmlspecialchars($data); 
            return $data;
        }
    ?>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">Form Input Siswa</div>
            <div class="card-body">
                <form method="POST" id="form_input_siswa" autocomplete="on" action="">
                    <div class="form-group">
                        <label for="nis">NIS:</label>
                        <input type="text" class="form-control" id="nis" name="nis" value="<?php if(isset($_POST['nis'])) echo $_POST['nis']?>" >
                        <div class="error text-danger"><?php if (isset($error_nis)) echo $error_nis; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php if(isset($_POST['nama'])) echo $_POST['nama']?>" >
                        <div class="error text-danger"><?php if (isset($error_nama)) echo $error_nama; ?></div>
                    </div>
                    <label>Jenis Kelamin:</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" <?php if(isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'pria') echo 'checked'?> name="jenis_kelamin" value="pria"/>Pria
                        </label>
                        <div class="error text-danger"><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" <?php if(isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'Wanita') echo 'checked'?> name="jenis_kelamin" value="wanita"/>Wanita
                        </label>
                        <div class="error text-danger"><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="kelas">Kelas:</label>
                        <select id="kelas" name="kelas" class="form-control" onchange="pilihanKelas()">
                            <option value="" selected disabled>-- Pilih Kelas --</option>
                            <option value="X" <?php if(isset($_POST['kelas']) && $_POST['kelas'] == 'X') echo 'selected' ?>>X</option>
                            <option value="XI" <?php if(isset($_POST['kelas']) && $_POST['kelas'] == 'XI') echo 'selected' ?>>XI</option>
                            <option value="XII" <?php if(isset($_POST['kelas']) && $_POST['kelas'] == "XII") echo 'selected' ?>>XII</option>
                        </select>
                        <div class="error text-danger"><?php if (isset($error_kelas)) echo $error_kelas?></div>
                    </div>
                    <div id="ekskul">
                        <label>Ekstrakurikuler:</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" <?php if(isset($_POST['ekstrakurikuler']) && in_array('pramuka', $_POST['ekstrakurikuler'])) echo 'checked' ?> name="ekstrakurikuler[]" value="Pramuka"/>Pramuka
                            </label>
                            <div class="error text-danger"><?php if (isset($error_ekstrakurikuler)) echo $error_ekstrakurikuler; ?></div>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" <?php if(isset($_POST['ekstrakurikuler']) && in_array('seni_tari', $_POST['ekstrakurikuler'])) echo 'checked' ?> name="ekstrakurikuler[]" value="Seni_tari"/>Seni Tari
                            </label>
                            <div class="error text-danger"><?php if (isset($error_ekstrakurikuler)) echo $error_ekstrakurikuler; ?></div>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" <?php if(isset($_POST['ekstrakurikuler']) && in_array('sinematografi', $_POST['ekstrakurikuler'])) echo 'checked' ?> name="ekstrakurikuler[]" value="Sinematografi"/>Sinematografi
                            </label>
                            <div class="error text-danger"><?php if (isset($error_ekstrakurikuler)) echo $error_ekstrakurikuler; ?></div>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" <?php if(isset($_POST['ekstrakurikuler']) && in_array('basket', $_POST['ekstrakurikuler'])) echo 'checked' ?> name="ekstrakurikuler[]" value="Basket"/>Basket
                            </label>
                            <div class="error text-danger"><?php if (isset($error_ekstrakurikuler)) echo $error_ekstrakurikuler; ?></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3" name="submit" value="submit">
                        Submit
                    </button>
                    <button type="reset" class="btn btn-danger mt-3" onclick="resetForm()">Reset</button>
                </form>
            </div>
        </div>
        <?php
        if(isset($_POST["submit"])){
            echo "<h3>Your Input:</h3>";
            echo 'NIS: '.$_POST['nis'].'<br/>';
            echo 'Nama: '.$_POST['nama'].'<br/>';
            echo 'Jenis Kelamin: ';
            if(isset($_POST['jenis_kelamin'])){
                echo $_POST['jenis_kelamin'].'<br/>';
            } else{
                echo '<br/>';
            }
            echo 'Kelas: ';
            if(isset($_POST['kelas'])){
                echo $_POST['kelas'].'<br/>';
            } else{
                echo '<br/>';
            }
            
            echo 'Ekstrakurikuler yang dipilih: ';
            if (!empty($_POST['ekstrakurikuler']) && count($_POST['ekstrakurikuler']) > 0) {
                $ekstrakurikuler = $_POST['ekstrakurikuler'];
                 foreach ($ekstrakurikuler as $ekstrakurikuler_item) {
                    echo '<br />' . $ekstrakurikuler_item;
                }
            } 
        }  
        ?>
    </div>
</body>
</html>
