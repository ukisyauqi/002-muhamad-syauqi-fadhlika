<!-- resources/views/scan.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner</title>
</head>
<body>
    <h1>QR Code Scanner</h1>
    <video id="video" width="100%" height="auto" playsinline></video>
    <script src="https://cdn.jsdelivr.net/npm/quagga"></script>
    <script>
        const video = document.getElementById('video');

        // Setup video stream from camera
        navigator.mediaDevices.getUserMedia({ video: true })
            .then((stream) => {
                video.srcObject = stream;
                video.play();
            })
            .catch((err) => {
                console.error('Error accessing camera:', err);
            });

        // Initialize QuaggaJS for QR code scanning
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: video
            },
            decoder: {
                readers: ["qrcode_reader"]
            }
        }, function(err) {
            if (err) {
                console.error('Error initializing Quagga:', err);
                return;
            }
            alert('Initialization finished. Ready to start');
            Quagga.start();
        });

        // Listen for scan results
        Quagga.onDetected((result) => {
            const code = result.codeResult.code;
            alert('Detected QR code:', code);
            // Handle the detected QR code here (e.g., send it to server via AJAX)
        });
    </script>
</body>
</html>
