<?php 

// koneksi ke database
// $conn = mysqli_connect("localhost", "root", "", "dummy_project_2");

function tambahOrderan($typeMenu, $namaMenu, $hargaMenu, $userName, $itemTambahan, $hargaItemTambahan, $totalHarga) {
    // global $conn;
    $conn = mysqli_connect("localhost", "root", "", "dummy_project_2");

    // query insert data
    $query = " INSERT INTO order_menu
                VALUES
            ('', '$typeMenu', '$namaMenu','$hargaMenu', '$userName', '$itemTambahan', '$hargaItemTambahan', '$totalHarga') 
    ";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
} 




 ?>