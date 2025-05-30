<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Worker Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      background: #f8f9fa;
      overflow-x: hidden;
    }

    main {
       margin-left: 200px;
  padding: 2rem 1.5rem;
      transition: filter 0.3s ease;
    }
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
    @media (max-width: 767.98px) {
      .sidebar {
        width: 75%;
        right: -75%;
        top: 56px;
        transition: right 0.3s ease;
      }
      .sidebar.show {
        right: 0;
      }
      main {
        margin-right: 0;
        padding-top: 70px;
      }
      main.content-blur {
        filter: blur(2px);
        pointer-events: none;
      }
    }
  </style>
</head>
<body>
<?php
include "./Components/Nav.php";
?>

  <main id="mainContent" class="container-fluid">
    <h2 class="mb-4">Welcome, Worker John!</h2>

    <div class="row g-3">
      <div class="col-md-4">
        <div class="card">
          <div class="card-stats">
            <div>
              <h5>Total Deliveries</h5>
              <h3>24</h3>
            </div>
            <div class="card-icon bg-primary text-white"><i class="bi bi-truck"></i></div>
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
            <div class="card-icon bg-warning text-white"><i class="bi bi-box-seam"></i></div>
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
            <th>Tracking ID</th>
            <th>Destination</th>
            <th>Status</th>
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

  <button class="btn btn-primary chat-float-btn" onclick="toggleChat()">💬</button>
  <div class="chat-widget p-3" id="chatWidget">
    <h6>Support Chat</h6>
    <div id="chatBox" class="border rounded p-2 mb-2" style="height: 200px; overflow-y: auto;"></div>
    <form onsubmit="sendMessage(event)">
      <input type="text" id="message" class="form-control mb-2" placeholder="Type a message..." />
      <button class="btn btn-primary w-100">Send</button>
    </form>
  </div>

  <script>
    document.getElementById('mobileNavToggle').addEventListener('click', () => {
      const sidebar = document.getElementById('sidebar');
      const mainContent = document.getElementById('mainContent');
      sidebar.classList.toggle('show');
      mainContent.classList.toggle('content-blur');
    });

    function toggleChat() {
      const chatWidget = document.getElementById('chatWidget');
      chatWidget.classList.toggle('d-none');
    }

    function sendMessage(e) {
      e.preventDefault();
      const msgInput = document.getElementById('message');
      const chatBox = document.getElementById('chatBox');
      const userMsg = msgInput.value.trim();
      if (!userMsg) return;
      const userDiv = document.createElement('div');
      userDiv.className = 'text-primary';
      userDiv.textContent = 'You: ' + userMsg;
      chatBox.appendChild(userDiv);
      chatBox.scrollTop = chatBox.scrollHeight;
      msgInput.value = '';
      setTimeout(() => {
        const replyDiv = document.createElement('div');
        replyDiv.className = 'text-muted';
        replyDiv.textContent = 'Support: Thank you for your message.';
        chatBox.appendChild(replyDiv);
        chatBox.scrollTop = chatBox.scrollHeight;
      }, 1500);
    }

    const ctx = document.getElementById('workerChart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
          label: 'Deliveries',
          data: [3, 5, 4, 6, 2, 1, 3],
          backgroundColor: 'rgba(0,123,255,0.6)'
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
    document.getElementById('mobileNavToggle').addEventListener('click', () => {
  const sidebar = document.getElementById('sidebar');
  const mainContent = document.getElementById('mainContent');
  sidebar.classList.toggle('show');
  sidebar.classList.add('animate__animated', 'animate__slideInRight');
  mainContent.classList.toggle('content-blur');
});

  </script>
</body>
</html>
