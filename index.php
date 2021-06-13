<?php
include 'tampil.php';?>
<!DOCTYPE html>
<html>
    <head>
        <title>Noir Virtual Kitchen</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="header">
                <h1 style="font-family: cursive; 
                font-size: 120px;
                text-align: center;
                color: white; 
                background-image: url('/images/bg_web.png');
                background-size: 50%;
                ">
                    NOIR VIRTUAL KITCHEN</h1>
        </div>
        <div class="main">
            <div class="column side">
                <div class ="col-side-left">
                    <h3 style="text-transform: uppercase;">Mengapa Noir Virtual Kitchen ? </h3>
                    <p style="margin-top: 100px; color: #edcfa8; font-size :16px">
                        Noir Virtual Kitchen menyajikan hidangan anda 
                        dengan sistem Pre-Order dikarenakan bahan utama 
                        dari makanan kami harus dipesan terlebih dahulu.<br>
                        Dibuat dari bahan yang berkualitas dan segar, Noir pilihan tepat
                        untuk disantap bersama dengan keluarga Anda.
                        Noir memiliki cita rasa yang khas dan tidak perlu diragukan lagi 
                        kelezatannya.
                    </p>   
                </div>
                <div class="box">
                    <video width="320" height="320" controls >
                        <source src="videos/video_promosi.mp4" type="video/mp4">
                    </video>
                </div> 
                <h3 style="text-transform: uppercase;"> 
                    Pesan Disini ! 
                </h3>
                <div class="layout">
                    <form action="simpan.php" name="myForm" method="POST" onsubmit="return validateForm()">
                        <div>
                            <label>*Nama :</label>
                            <input type="text" name="fName"/>
                        </div>
                        <div>
                            <label>*Nomor Telfon :</label>
                            <input type="tel" name="fTelp"/>
                        </div>
                        <div>
                            <label>*Alamat :</label>
                            <input type="text" name="fAlamat"/>
                        </div>
                        <div>
                            <label>*Pesanan :</label>
                            <br><input type="radio" name="fPesanan" value = "King Crab" /> King Crab 3kg
                            <br><input type="radio" name="fPesanan" value = "Lobster" /> Lobster 1kg
                            <br><input type="radio" name="fPesanan" value = "Steak Wagyu" /> Steak Wagyu 1kg
                        </div>
                        <div style="margin-top: 5px;margin-bottom: 5px;">
                            <label>Total :</label>
                            <span id="totalprice" style="font-size: 15px; color: #597273;"></span>
                            <input type="hidden" id="inputtotalprice" name="fTotal">
                        </div>
                        <div>
                            <label>Catatan :</label>
                            <textarea name="fNotes"></textarea>
                        </div>
                        <div>
                            <label>*wajib diisi</label>
                        </div>              
                        <div>
                            <input type="submit" value="Submit" class="submit"/>
                        </div>
                    </form>
                </div>
                <div class ="col-side-right">
                <p style="margin-top: 20px;">
                    <li>Makanan akan tersedia 3 hari setelah pemesanan.</li>
                    <li>Pembeli akan dihubungi melalui SMS apabila makanan sudah siap diambil.</li>
                    <li>Pembayaran hanya dilakukan saat pesanan diambil.</li>
                </p>   
                </div>
                <br>
                <div class="box-table">
                    <h3 style="text-transform: uppercase; margin-left: 45%; margin-right: 35%; color: #666;"> 
                        Pesanan Hari Ini
                    </h3>
                    <table>
                        <thead>
                            <tr>
                            <th>NAMA</th>
                            <th>PESANAN</th>
                            <th>TOTAL</th>
                            <th>CATATAN</th>
                            <th>TANGGAL READY</th>
                            </tr>
                        </thead> 
                        <tbody>
                            <?php while ($r = mysqli_fetch_array($result)) { ?>
                                <tr>
                                <td><?php echo $r['nama']?></td>
                                <td><?php echo $r['pesanan']?></td>
                                <td><?php echo $r['total']?></td>
                                <td><?php echo $r['catatan']?></td>
                                <td><?php echo $r['tanggal_ready']?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="column middle">
                <h3 style="text-align: center;text-transform: uppercase;">Our Menu</h3>
                <img src="images/1.png" style="width: 320px;height: 540px;border: 0;">
                <br>
                <img src="images/2.png" style="width: 320px;height: 540px;border: 0;">
                <br>
                <img src="images/3.png" style="width: 320px;height: 540px;border: 0;">
            </div>
        </div>
        <div class="footer">
            <p> Noir Virtual Kitchen </p>
            <p>Jl. Surtikanyi 3/1 RT 06 / RW 02 Kel. Bulu Lor Kec. Semarang Utara
                Jawa Tengah 50179, Indonesia
            </p>
        </div>
    </body>
    <script>
        function validateForm() {
            var nama = document.forms["myForm"]["fName"].value;
            var telp = document.forms["myForm"]["fTelp"].value;
            var alamat = document.forms["myForm"]["fAlamat"].value;
            var pesanan = document.forms["myForm"]["fPesanan"].value;
            if (nama == "" ||telp == "" ||alamat == "" ||pesanan == "") {
                alert("Data yang diisi harus lengkap !");
                return false;
            }
        }       
        $("input[name=fPesanan]").change(function(){
            if($(this).val() == "King Crab"){
                total = 2875000;
            }
            if($(this).val() == "Lobster"){
                total = 515000;
            }
            if($(this).val() == "Steak Wagyu"){
                total = 2880000;
            }
            $("#inputtotalprice").val(total);
            $("#totalprice").html(total);
        });
    </script>
</html>