<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Track Shipment - LogiTech</title>
  <link rel="icon" type="image/png" href="./images/favicon.png">

  <!-- Bootstrap & Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

  <!-- Leaflet & Animations -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="./assets/css/tracking.css"/>
</head>
<body>
  <!-- Noscript Fallback -->
  <noscript>
    <div class="alert alert-warning text-center">
      JavaScript is required to track shipments. Please enable it or contact support.
    </div>
  </noscript>

  <!-- Navbar (Mobile) -->


  <?php
$title = "Tracking Page";
include "./Components/Nav.php";
?>

      <!-- Main Content -->
      <main class="container-fluid pt-4">
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10 tracking-container">
            <h2 class="h4 mb-4 text-center">Track Your Shipment</h2>

            <!-- Tracking Form -->
            <form id="trackForm" class="animate__animated animate__fadeIn mb-3">
              <label for="trackingId" class="form-label visually-hidden">Tracking ID</label>
              <input type="text" id="trackingId" class="form-control mb-2" placeholder="Enter Tracking ID" required aria-describedby="trackingIdHelp">
              <div id="trackingIdHelp" class="form-text">Enter your shipment tracking ID to view status.</div>
              <button class="btn btn-primary w-100" type="submit">Track</button>
            </form>

            <!-- Chat Toggle Button -->
            <button class="btn btn-outline-primary mb-3" onclick="toggleChat()" aria-label="Open support chat">
              <i class="fas fa-comments me-2"></i>Contact Support
            </button>

            <!-- Tracking Result -->
            <div id="trackingResult" class="alert alert-info d-none animate__animated animate__fadeIn"></div>

            <!-- Map -->
            <div id="map" class="map-container mt-4 animate__animated animate__fadeInUp"></div>

            <!-- Progress Chart -->
            <div class="mt-4 animate__animated animate__fadeInUp chart-container">
              <h5 class="mb-3">Shipment Progress</h5>
              <canvas id="progressChart" height="100"></canvas>
            </div>

            <!-- Status Timeline -->
            <div class="mt-4 animate__animated animate__fadeInUp">
              <h5>Status</h5>
              <ul id="statusTimeline" class="list-group"></ul>
            </div>
          </div>
        </div>
      </main>

      <!-- Chat Widget -->
      <div id="chatWidget" class="chat-widget d-none">
        <div class="chat-header">Support Chat</div>
        <div id="chatBox" class="mb-2"></div>
        <form onsubmit="sendMessage(event)">
          <input type="text" id="message" class="form-control mb-2" placeholder="Type your message..." required />
          <button class="btn btn-sm btn-success w-100" type="submit">Send</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="./assets/js/tracking.js"></script>
</body>
</html>