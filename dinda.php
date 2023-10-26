<?php
$koneksi = new mysqli('localhost', 'root', '', 'ujianhidup');

if($koneksi->connect_error) die("Koneksi gagal: " . $koneksi->connect_error);

if(isset($_POST['tambah'])) $koneksi->query("INSERT INTO tabel (nama) VALUES ('".$_POST['nama']."')");
if(isset($_POST['edit'])) $koneksi->query("UPDATE tabel SET nama='".$_POST['nama']."' WHERE id=".$_POST['id']);
if(isset($_GET['hapus'])) $koneksi->query("DELETE FROM tabel WHERE id=".$_GET['hapus']);

$result = $koneksi->query("SELECT * FROM tabel");
?>

<form method="POST"><input type="text" name="nama" required><button type="submit" name="tambah">Tambah</button></form>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="p-3 mb-2 bg-primary text-white">
    <?php while($row = $result->fetch_assoc()): ?>
        
        <div >
            <?=$row['nama']?>
            <a href="?hapus=<?=$row['id']?>">Hapus</a>
            <form method="POST" style="display:inline;">
                <input type="hidden" name="id" value="<?=$row['id']?>">
                <input type="text" name="nama" value="<?=$row['nama']?>" required>
                <button type="submit" name="edit">Edit</button>
            </form>
        </div>
    <?php endwhile; ?>
</body>
</html>
