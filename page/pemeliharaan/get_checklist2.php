<?php
            include("../../koneksibarang.php");
            $tamp = $_POST['tamp'];
            $pecah_bar = explode(".", $tamp);
            $kode_bar = $pecah_bar[0];
            $sql = "select * from tb_mesin where kode_mesin = '04.438.001'";
            $result = mysqli_query($koneksi, $sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {

            ?>
<label>Checklist</label>
<div class="form-group">
    <div class="form-line">
        <div class="form-check">
            <div class="form-line">
                <input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value="Periksa Kompresor Pegas untuk memastikannya tidak rusak." />
                <label class="form-check-label" for="checklist">
                 Periksa Kompresor Pegas untuk memastikannya tidak rusak.
                </label>
            </div>
            <div class="form-line">
                <input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value="Bersihkan kolom geser dan lap menggunakan sedikit oli transmisi." />
                <label class="form-check-label" for="checklist">
                Bersihkan kolom geser dan lap menggunakan sedikit oli transmisi.
                </label>
            </div>
        </div>
        <br>
        </input>
    </div>
</div>
<?php
                }
            } else {
                echo "0 results";
            }

            mysqli_close($koneksi);

?>