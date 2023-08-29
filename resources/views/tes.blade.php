<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <canvas id="canvas"></canvas>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
<script src="https://zxpsuper.github.io/qrcode-with-logos/doc/qrcode-with-logo.min.js"></script>
<script>
    function generateQrCode(data, canvasId, imageId) {
        new QrCodeWithLogo({
            canvas: document.getElementById(canvasId), //jika pakai tag canvas
            content: data,
            width: 380,
            // image: document.getElementById("image"), //jika pakai tag img
            logo: {
                src: imageId
            }
        })
        // .toImage();
        .toCanvas()
    }
    generateQrCode("https://www.google.com", "canvas",
        "https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/2008px-Google_%22G%22_Logo.svg.png"
    );
</script>

</html>
