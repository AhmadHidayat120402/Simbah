          <h2>Detail Pembelian</h2>
          <?php
          require '../connect.php';
          include 'pembelian.php';
          $query_pembelian = "SELECT * FROM users JOIN pembelian ON pembelian.id_pembeli = users.id_pembeli WHERE pembelian.id = '$_GET[id]'";
          
          $hasil_keputusan = mysqli_query($koneksi, $query_pembelian);
          $ambil = mysqli_fetch_array($hasil_keputusan);
          ?>
          </div>

          
          