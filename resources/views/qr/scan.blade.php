@extends('layouts.master')

@section('web-content')
<div class="container mt-5">
    <h1>QR Code Scanner</h1>

    <!-- Camera Selector -->
    <div class="mb-3">
        <label for="camera-select" class="form-label">Select Camera</label>
        <select id="camera-select" class="form-select">
            <option value="" disabled selected>Detecting cameras...</option>
        </select>
    </div>

    <!-- QR Code Reader -->
    <div id="reader" style="width: 300px; height: 300px; margin: auto;"></div>

    <!-- Include Html5Qrcode Library -->
    <script src="https://cdn.jsdelivr.net/npm/html5-qrcode/minified/html5-qrcode.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const reader = new Html5Qrcode("reader");
            const cameraSelect = document.getElementById("camera-select");
            const resultElement = document.getElementById("result");

            // Detect Device Type
            const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

            // Fetch Available Cameras
            Html5Qrcode.getCameras().then((devices) => {
                if (devices && devices.length) {
                    cameraSelect.innerHTML = ""; // Clear default option

                    devices.forEach((device) => {
                        const option = document.createElement("option");
                        option.value = device.id;
                        option.textContent = device.label || `Camera ${cameraSelect.length + 1}`;
                        cameraSelect.appendChild(option);
                    });

                    // Automatically select a camera based on device type
                    const preferredCamera = isMobile
                        ? devices.find((d) => d.label.toLowerCase().includes("back")) || devices[0]
                        : devices[0];

                    if (preferredCamera) {
                        cameraSelect.value = preferredCamera.id;
                        cameraSelect.dispatchEvent(new Event("change")); // Trigger scanning
                    }
                } else {
                    console.error("No cameras found.");
                    alert("No cameras detected. Please connect a camera and try again.");
                }
            }).catch((err) => {
                console.error("Error getting cameras:", err);
                alert("Error detecting cameras. Please check your device permissions.");
            });

            // Start Scanning on Camera Change
            cameraSelect.addEventListener("change", function () {
                const cameraId = cameraSelect.value;

                // Stop any existing scanner before starting a new one
                if (reader.isScanning) {
                    reader.stop().catch(err => console.error("Failed to stop scanner:", err));
                }

                reader.start(
                    cameraId,
                    {
                        fps: 10, // Scans per second
                        qrbox: { width: 250, height: 250 }, // Scanning box dimensions
                    },
                    (decodedText) => {
                        // On successful scan
                        resultElement.textContent = decodedText;
                        console.log("Scanned text:", decodedText);

                        // Redirect if the QR code contains a valid URL
                        if (decodedText.startsWith('http') || decodedText.startsWith('https')) {
                            window.location.href = decodedText;
                        } else {
                            alert("Scanned QR Code is not a valid URL.");
                        }

                        // Stop scanning after success (optional)
                        reader.stop().then(() => {
                            console.log("Scanner stopped.");
                        }).catch(err => console.error("Failed to stop scanner:", err));
                    },
                    (errorMessage) => {
                        // Handle scan errors
                        console.warn("QR Code scan error:", errorMessage);
                    }
                ).catch(err => console.error("Failed to start scanner:", err));
            });
        });
    </script>
</div>
@endsection
