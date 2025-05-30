<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard - LogiTech</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  
<link rel="stylesheet" href="./assets/css/admin.css" />
 <style>.chart-container {
  width: 100%;
  max-width: 900px; /* or any preferred max width */
  margin: 20px auto;
}

.chart-container canvas {
  width: 100% !important;
  height: 400px !important;
  display: block;
}</style>
</head>
<body>

<main class="container-fluid" id="mainContent">
  <div class="row">
    <div class="col-12 py-4 px-3 px-md-5">
      <!-- Header -->
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-2">
        <h2 class="h5 m-0">Admin Dashboard</h2>
        <div class="text-muted fw-semibold text-end" id="welcomeMessage">Welcome, Admin</div>
      </div>

      <!-- Summary Cards -->
      <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="card h-100">
            <div class="card-stats">
              <div>
                <h6 class="text-muted">Total Users</h6>
                <h4 class="fw-bold" id="totalUsers">100</h4>
              </div>
              <div class="card-icon text-primary bg-light"><i class="fas fa-users"></i></div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="card h-100">
            <div class="card-stats">
              <div>
                <h6 class="text-muted">Total Shipments</h6>
                <h4 class="fw-bold" id="totalShipments">250</h4>
              </div>
              <div class="card-icon text-info bg-light"><i class="fas fa-box"></i></div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="card h-100">
            <div class="card-stats">
              <div>
                <h6 class="text-muted">Active Riders</h6>
                <h4 class="fw-bold" id="activeRiders">20</h4>
              </div>
              <div class="card-icon text-success bg-light"><i class="fas fa-truck"></i></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Chart -->
      <div class="row mb-5">
        <div class="col-12">
          <div class="card p-3">
            <h6 class="fw-bold mb-3">Shipments Overview</h6>
            <div class="chart-container">
              <canvas id="shipmentChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- User Management -->
      <div class="mb-5">
        <h5 class="fw-bold mb-3">User Management</h5>
        <div class="table-responsive">
          <table class="table table-hover align-middle text-nowrap">
            <thead class="table-light">
              <tr>
                <th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Actions</th>
              </tr>
            </thead>
            <tbody id="userTable"></tbody>
          </table>
        </div>
      </div>

      <!-- Shipment Management -->
      <div class="mb-5">
        <h5 class="fw-bold mb-3">Shipment Management</h5>
        <div class="table-responsive">
          <table class="table table-hover align-middle text-nowrap">
            <thead class="table-light">
              <tr>
                <th>Tracking ID</th><th>From</th><th>To</th><th>Status</th><th>Actions</th>
              </tr>
            </thead>
            <tbody id="shipmentTable"></tbody>
          </table>
        </div>
      </div>

      <!-- Rider Management -->
      <div class="mb-5">
        <h5 class="fw-bold mb-3">Rider Management</h5>
        <div class="table-responsive">
          <table class="table table-hover align-middle text-nowrap">
            <thead class="table-light">
              <tr>
                <th>ID</th><th>Name</th><th>Assigned Deliveries</th><th>Actions</th>
              </tr>
            </thead>
            <tbody id="riderTable"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Chat Widget -->
<div id="chatWidget" class="d-none">
  <h6 class="fw-bold">Live Chat</h6>
  <div id="chatBox" class="mb-3 border rounded p-2" style="height: 200px; overflow-y: auto;"></div>
  <form onsubmit="sendMessage(event)">
    <div class="input-group">
      <input type="text" class="form-control" id="message" placeholder="Type a message..." required />
      <button class="btn btn-primary" type="submit">Send</button>
    </div>
  </form>
</div>

<button onclick="toggleChat()" class="btn btn-primary position-fixed bottom-0 end-0 m-4 z-3">
  <i class="fas fa-comments"></i> Chat
</button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
<script src ="./assets/js/admin.js"></script>
 
</script>

</body>
</html>
