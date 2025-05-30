<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Dashboard - LogiTech</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="./assets/css/user-dashboard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
 
</head>
<body>
  <div class="container-fluid">
  <div class="row">
  <!-- Imported sidebar -->
<?php
$title = "User Dashboard";
include "./Components/Nav.php";
?>


      <!-- Main Content -->
      <main class="col-md-10 ms-sm-auto px-md-5 py-4">
        <div class="d-flex justify-content-between flex-wrap align-items-center mb-4">
          <h2>User Dashboard</h2>
          <div class="user-greeting text-muted animate__animated animate__fadeInRight" id="welcomeMessage">Welcome, <strong class="text-dark">Mubarak</strong></div>
        </div>

        <div class="row mb-4">
          <div class="col-12 col-md-4 mb-3">
            <div class="card animate__animated animate__fadeInUp">
              <div class="card-stats">
                <div>
                  <h6 class="text-muted">Active Shipments</h6>
                  <h4 class="fw-bold" id="activeShipments">3</h4>
                </div>
                <div class="card-icon text-primary bg-light"><i class="fas fa-truck"></i></div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 mb-3">
            <div class="card animate__animated animate__fadeInUp">
              <div class="card-stats">
                <div>
                  <h6 class="text-muted">Pending Deliveries</h6>
                  <h4 class="fw-bold" id="pendingDeliveries">1</h4>
                </div>
                <div class="card-icon text-warning bg-light"><i class="fas fa-box"></i></div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 mb-3">
            <div class="card animate__animated animate__fadeInUp">
              <div class="card-stats">
                <div>
                  <h6 class="text-muted">Completed Orders</h6>
                  <h4 class="fw-bold" id="completedOrders">15</h4>
                </div>
                <div class="card-icon text-success bg-light"><i class="fas fa-check-circle"></i></div>
              </div>
            </div>
          </div>
        </div>

        <div class="chart-container mb-4">
          <canvas id="shipmentChart"></canvas>
        </div>

        <h5 class="mb-3 fw-bold">Active Shipments</h5>
        <div class="row" id="shipmentsContainer">
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card shipment-card mb-4 animate__animated animate__fadeInUp">
              <div class="card-body">
                <h5 class="card-title">Tracking ID: 123456</h5>
                <p class="card-text text-muted">From: Lagos<br>To: Abuja</p>
                <div class="progress mb-2" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar bg-info" style="width: 75%"></div>
                </div>
                <span class="badge bg-info mb-2">In Transit</span>
                <a href="./tracking.php?trackingId=123456" class="btn btn-outline-primary btn-sm">Track</a>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- Chat Widget -->
  <div id="chatWidget" class="chat-widget">
    <div class="chat-header p-2 d-flex justify-content-between align-items-center">
      <strong>Support Chat</strong>
      <button class="btn-close btn-close-white" onclick="toggleChat()" aria-label="Close chat"></button>
    </div>
    <div class="p-2" id="chatBox" style="height:200px; overflow-y:auto;">
      <div class="chat-message text-muted">Support: How can we assist you today?</div>
      <div class="chat-message text-primary">You: I need help with my dashboard.</div>
    </div>
    <form id="chatForm" class="p-2" onsubmit="sendMessage(event)">
      <input type="text" id="message" class="form-control mb-2" placeholder="Type a message..." required>
      <button class="btn btn-primary w-100">Send</button>
    </form>
  </div>
</div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
  <script src="./assets/js/user_dashboard.js"></script>
</body>
</html>
