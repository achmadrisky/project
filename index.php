<?php
require 'data.php';
require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UIN Datokarama Palu Kampus II</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <img src="img/logo.png" alt="logo">
        <h1>UIN DATOKARAMA PALU</h1>
    </div>

    <div class="hero">
        <img src="img/uin2.jpg" alt="Beranda" class="hero-image">
        <div class="hero-text">
            <h1>PROJECT KELOMPOK 6</h1>
        </div>
    </div>

    

    <form method="POST" action="" class="form-container">

        <div class="container-maps">
            <h1>Google Maps</h1>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1702.363876069262!2d119.93371968304191!3d-0.9864670908236284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d8bf7f8feab37d5%3A0x5172625c47f4ca40!2sPos%20Satpam!5e1!3m2!1sid!2sid!4v1735803658542!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <H1>Mencari Rute Terpendek</H1>
        <label for="start">Lokasi Anda:</label>
        <select name="start" id="start" required>
            <?php foreach (array_keys($graph) as $node): ?>
                <option value="<?= $node; ?>"><?= $node; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="end">Lokasi Tujuan:</label>
        <select name="end" id="end" required>
            <?php foreach (array_keys($graph) as $node): ?>
                <option value="<?= $node; ?>"><?= $node; ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Cari Rute</button>
    </form>

    <div class="result">
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $start = $_POST['start'];
        $end = $_POST['end'];

        $result = dijkstra($graph, $start, $end);

        echo "<h1>Rute Terbaik</h1>";
        echo "<p>Jarak Terpendek: " . $result['distance'] . " meter</p>";
        echo "<p>Rute: " . implode(' -> ', $result['path']) . "</p>";
    }
    ?>
    </div>

    <footer class="footer">
        <div class="footer-container">
            <p>&copy; Achmad Risky. </p>
            <div class="footer-links">
                <a href="https://www.instagram.com/achriskyy/">Achmad Risky</a>
                <a href="https://www.instagram.com/_mu.ammar/">Muammar</a>
                <a href="https://www.instagram.com/rhaitttt/">Sandi</a>
            </div>
        </div>
    </footer>

    
</body>
</html>
