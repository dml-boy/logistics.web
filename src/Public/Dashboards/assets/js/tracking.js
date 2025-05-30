document.addEventListener('DOMContentLoaded', () => {
  const trackForm = document.getElementById('trackForm');
  const result = document.getElementById('trackingResult');
  const progressChartCanvas = document.getElementById('progressChart');
  let progressChartInstance;

  // Map Initialization (Centered on Nigeria)
  const map = L.map('map').setView([9.05785, 7.49508], 6);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
  }).addTo(map);

  // Update Map with Markers and Route
  function updateMap(from, to) {
    const locations = {
      'Lagos': [6.5244, 3.3792],
      'Abuja': [9.05785, 7.49508]
    };
    const fromCoords = locations[from] || [6.5244, 3.3792];
    const toCoords = locations[to] || [9.05785, 7.49508];

    map.eachLayer(layer => {
      if (layer instanceof L.Marker || layer instanceof L.Polyline) {
        map.removeLayer(layer);
      }
    });

    L.marker(fromCoords).addTo(map).bindPopup(`${from}`);
    L.marker(toCoords).addTo(map).bindPopup(`${to}`);
    L.polyline([fromCoords, toCoords], { color: '#007bff' }).addTo(map);
    map.fitBounds([fromCoords, toCoords]);
  }

  // Update Status Timeline
  function updateStatusTimeline(updates) {
    const timeline = document.querySelector('.list-group');
    timeline.innerHTML = '';
    updates.forEach(update => {
      const li = document.createElement('li');
      li.className = 'list-group-item';
      li.textContent = `Status on ${update.date}: ${update.progress}%`;
      timeline.appendChild(li);
    });
  }

  // Chat Toggle
  window.toggleChat = function () {
    const chatWidget = document.getElementById('chatWidget');
    chatWidget.classList.toggle('d-none');
    if (!chatWidget.classList.contains('d-none')) {
      document.getElementById('message').focus();
    }
  };

  // Send Chat Message
  window.sendMessage = function (event) {
    event.preventDefault();
    const messageInput = document.getElementById('message');
    const chatBox = document.getElementById('chatBox');
    const message = messageInput.value.trim();
    if (message) {
      const userMsg = document.createElement('div');
      userMsg.className = 'text-primary';
      userMsg.textContent = `You: ${message}`;
      chatBox.appendChild(userMsg);
      messageInput.value = '';
      chatBox.scrollTop = chatBox.scrollHeight;

      setTimeout(() => {
        const reply = document.createElement('div');
        reply.className = 'text-muted';
        reply.textContent = 'Support: Thanks! We’ll get back to you shortly.';
        chatBox.appendChild(reply);
        chatBox.scrollTop = chatBox.scrollHeight;
      }, 1000);
    }
  };

  // Handle Tracking Form Submit
  trackForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    const trackingId = document.getElementById('trackingId').value.trim().toUpperCase();
    if (!trackingId) {
      result.classList.remove('d-none', 'alert-info');
      result.classList.add('alert-danger');
      result.textContent = 'Please enter a valid tracking ID';
      return;
    }

    // Simulated API response (replace with real API call)
    const data = {
      trackingId,
      from: 'Lagos',
      to: 'Abuja',
      status: 'In Transit',
      progress: 75,
      updates: [
        { date: '2025-05-25', progress: 0 },
        { date: '2025-05-26', progress: 25 },
        { date: '2025-05-27', progress: 50 },
        { date: '2025-05-28', progress: 75 }
      ]
    };

    // Update Result UI
    result.classList.remove('d-none', 'alert-danger');
    result.classList.add('alert-info');
    result.innerHTML = `
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tracking ID: ${data.trackingId}</h5>
          <p class="card-text">From: ${data.from}<br>To: ${data.to}<br>Status: ${data.status}</p>
          <div class="progress mb-2">
            <div class="progress-bar bg-info" role="progressbar" style="width: ${data.progress}%" aria-valuenow="${data.progress}" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    `;

    // Update Map
    updateMap(data.from, data.to);

    // Update Status Timeline
    updateStatusTimeline(data.updates);

    // Destroy Previous Chart
    if (progressChartInstance) progressChartInstance.destroy();

    // Render Line Chart
    const ctx = progressChartCanvas.getContext('2d');
    progressChartInstance = new Chart(ctx, {
      type: 'line',
      data: {
        labels: data.updates.map(u => u.date),
        datasets: [{
          label: 'Shipment Progress',
          data: data.updates.map(u => u.progress),
          borderColor: '#007bff',
          backgroundColor: 'rgba(0, 123, 255, 0.1)',
          fill: true,
          tension: 0.4,
          pointBackgroundColor: '#007bff',
          pointBorderColor: '#ffffff',
          pointBorderWidth: 2
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            max: 100,
            title: { display: true, text: 'Progress (%)' }
          },
          x: {
            title: { display: true, text: 'Date' }
          }
        },
        plugins: {
          legend: { display: true, position: 'top' }
        }
      }
    });
  });
});