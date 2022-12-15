<!-- checkout -->
<div class="col-md-3">
            <select name="id_diskon" id="diskon" class="form-select" style="background-color: white !important;" aria-label="Default select example" <?php
                                                                                                                                                      $tampilan = '';
                                                                                                                                                      if ($result['id_status'] == '3') { ?> disabled='disabled' ; <?php  } else ?> <?php { ?> <?php } ?>>
              <option value="">pilih potongan harga</option>
              <?php
              include 'connect.php';
              $dsikon  = mysqli_query($koneksi, "SELECT * FROM diskon");
              while ($ambil_diskon = mysqli_fetch_array($dsikon)) {
              ?>
                <option value="
                <?php echo $ambil_diskon['id_diskon'] ?>">
                  <?php echo $ambil_diskon['persen'] ?> %
                </option>
              <?php }; ?>
            </select>
          </div>