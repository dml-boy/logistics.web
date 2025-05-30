<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Worker Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link rel="stylesheet" href="./assets/css/rider.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    /* */
  </style>
</head>
<body>
  <?php include "./Components/Nav.php"; ?>

 

  <main id="mainContent" class="">
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


    

    function toggleChat() {
      const chatWidget = document.getElementById('chatWidget');
      chatWidget.style.display = chatWidget.style.display === 'block' ? 'none' : 'block';
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
  </script>
</body>
</html>
