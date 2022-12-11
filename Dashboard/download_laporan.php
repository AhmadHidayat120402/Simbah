<?php
// Require composer autoload
require '../connect.php';
require_once  '../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();



// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

$tgl_mulai = $_GET["tglm"];
$tgl_selesai = $_GET["tgls"];
$status = $_GET["status"];

$semuadata = [];
$ambil = $koneksi->query("SELECT * FROM users u LEFT JOIN pembelian p ON u.id_pembeli =  p.id_pembeli WHERE status_pembayaran = '$status' AND tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");

while ($pecah =  $ambil->fetch_assoc()) {
  $semuadata[] = $pecah;
}

$isi = "<h1 align='center'>Kios Buah Pandawa</h1>";
$isi .= "<h3 align='center'>Laporan Pembelian dengan status " . $status . " </h3>";
$isi .= "<h3 align='center'> Mulai " . date("d F Y", strtotime($tgl_mulai)) . " hingga " . date("d F Y", strtotime($tgl_selesai)) . "</h3>";
$isi .= " <table align='center' class='table table=bordered' border='1'  cellpadding='7' id='laporan'>";
$isi .= "<thead>";
$isi .= "<tr>
    <th>No</th>
    <th>Pelanggan</th>
    <th>Tanggal</th>
    <th>Jumlah</th>
    <th>Status</th>
  </tr>";
$isi .= "</thead>";
$isi .= "<tbody>";
$total = 0;
foreach ($semuadata as $key => $value) :
  $total += $value['total_pembelian'];
  $nomor = $key + 1;
  $isi .= "<tr>";
  $isi .= "<td>" . $nomor . "</td>";
  $isi .= "<td>" . $value['nama_lengkap'] . "</td>";
  $isi .= "<td>" . date("d F Y", strtotime($value['tanggal_pembelian'])) . "</td>";
  $isi .= "<td>Rp " . number_format($value['total_pembelian']) . "</td>";
  $isi .= "<td>" . $value['status_pembayaran'] . "</td>";
  $isi .= "</tr>";
endforeach;
$isi .= "</tbody>";
$isi .= "<tfoot>";
$isi .= "<tr>";
$isi .= "<th colspan='3'>Total</th>";
$isi .= "<th>Rp" . number_format($total) . ",00</th>";
$isi .= "<th></th>";
$isi .= "</tr>";
$isi .= "</tfoot>";
$isi .= "</table>";

// Write some HTML code:
$mpdf->WriteHTML($isi);

// Output a PDF file directly to the browser
$mpdf->Output("laporan.pdf", "I");
