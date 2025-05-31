<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Worker Dashboard - LogiTech</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <style>
    body {
      background: #f8f9fa;
    }
    /* Sidebar Styles */
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 200px;
      height: 100%;
      background-color: #343a40;
      color: #fff;
      z-index: 1000;
      transition: left 0.3s ease;
    }
    .sidebar.hidden {
      left: -200px;
    }
    .sidebar .nav-link {
      color: #fff;
      transition: background-color 0.2s;
    }
    .sidebar .nav-link:hover {
      background-color: #495057;
    }
    .sidebar .nav-link.active {
      background-color: #007bff;
    }
    .company-name {
      font-size: 1.5rem;
      font-weight: 700;
    }
    /* Main Content */
    main {
      /* margin-right: 200px;
      padding: 2rem 1.5rem; */
      transition: margin-left 0.3s ease;
    }
    main.full-width {
      margin-left: 0;
    }
    main.content-blur {
      filter: blur(2px);
      pointer-events: none;
    }
    /* Chat Widget */
    .chat-float-btn {
      position: fixed;
      bottom: 20px;
      left: 20px;
      z-index: 1050;
      border-radius: 50%;
    }
    .chat-widget {
      position: fixed;
      bottom: 90px;
      left: 20px;
      width: 300px;
      max-height: 400px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      z-index: 1000;
      overflow: auto;
      display: none;
    }
    #chatBox {
      background-color: #f8f9fa;
      font-size: 0.9rem;
    }
    /* Chart and Cards */
    .chart-container {
      width: 100%;
      max-width: 900px;
      margin: 20px auto;
    }
    .card-stats {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem;
    }
    .card-icon {
      font-size: 1.5rem;
      padding: 0.75rem;
      border-radius: 50%;
    }
    .table-responsive {
      margin: 20px 0;
    }
    /* Mobile Styles */
    @media (max-width: 767.98px) {
      .sidebar {
        display: none; /* Use offcanvas for mobile */
      }
      main {
        margin-left: 0 !important;
      }
      .chat-widget {
        width: 90%;
        max-height: 300px;
      }
      .offcanvas {
        z-index: 1050; /* Ensure offcanvas is above content */
      }
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php include './Components/Nav.php'; ?>

  <main id="mainContent" class="col-md-10 ms-sm-auto px-md-5 py-4" aria-hidden="false">
    <h2 class="mb-4">Welcome, Worker John!</h2>

    <div class="row g-3">
      <div class="col-md-4">
        <div class="card">
          <div class="card-stats">
            <div>
              <h5>Total Deliveries</h5>
              <h3>24</h3>
            </div>
            <div class="card-icon bg-primary text-white"><i class="fas fa-truck"></i></div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-stats">
            <div>
              <h5>Active Shipments</h5>
              <h3>5</h3>
            </div>
            <div class="card-icon bg-warning text-white"><i class="fas fa-box"></i></div>
          </div>
        </div>
      </div>
    </div>

    <div class="chart-container">
      <canvas id="workerChart"></canvas>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="table-light">
          <tr>
            <th scope="col">Tracking ID</th>
            <th scope="col">Destination</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>W1001</td><td>Chicago</td><td>Delivered</td></tr>
          <tr><td>W1002</td><td>New York</td><td>In Transit</td></tr>
          <tr><td>W1003</td><td>Houston</td><td>Pending</td></tr>
        </tbody>
      </table>
    </div>
  </main>

  <button class="btn btn-primary chat-float-btn animate__animated animate__bounceIn" onclick="toggleChat()" aria-label="Open support chat">💬</button>
  <div class="chat-widget p-3 animate__animated animate__fadeInUp" id="chatWidget">
    <h6>Support Chat</h6>
    <div id="chatBox" class="border rounded p-2 mb-2" style="height: 200px; overflow-y: auto;"></div>
    <form onsubmit="sendMessage(event)">
      <input type="text" id="message" class="form-control mb-2" placeholder="Type a message..." aria-label="Chat message input"/>
      <button class="btn btn-primary w-100">Send</button>
    </form>
  </div>

  <script src="./assets/js/rider.js"></script>

  </script>
</body>
</html>