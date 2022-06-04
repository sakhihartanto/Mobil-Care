<?php
          include("../../koneksibarang.php");
          $tamp = $_POST['tamp'];
          $id_mesin = 26;
          $sql = "SELECT * FROM `tb_mesin` WHERE id = 26";
          $result = mysqli_query($koneksi, $sql);
          
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
          ?>
<label>Checklist</label>
<div class="form-group">
  <div class="form-line">
    <div class="form-check">
      <div class="form-line">
        <input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value=" Periksa perangkat keras yang longgar " />
        <label class="form-check-label" for="checklist">
          Periksa perangkat keras yang longgar
        </label>
      </div>
      <div class="form-line">
        <input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value="Periksa adaptor retak atau rusak" />
        <label class="form-check-label" for="checklist">
          Periksa adaptor retak, atau rusak
        </label>
      </div>
      <div class="form-line">
        <input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value="Periksa pengukur tekanan dan selang yang rusak" />
        <label class="form-check-label" for="checklist">
          Periksa pengukur tekanan dan selang yang rusak
        </label>
      </div>
      <div class="form-line">
        <input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value="Membersihkan mesin dari kotoran minyak dan pasir" />
        <label class="form-check-label" for="checklist">
          Membersihkan mesin dari kotoran, minyak dan pasir
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