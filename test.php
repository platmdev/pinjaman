<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Format Rupiah</title>
</head>

<body>
    <input type="text" name="angka" id="angka" placeholder="Masukkan angka">
    <button name="convert" id="convert">Convert</button>
    <p id="hasil"></p>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/rupiah/rupiah.js"></script>
    <script>
    $(function() {
        $('#convert').click(function() {
            var angka = $('#angka').val();
            $("#hasil").text("Rp. " + formatRupiah(angka));
        })
    })
    </script>
</body>

</html>