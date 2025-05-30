

    function sendMessage(event) {
      event.preventDefault();
      const messageInput = document.getElementById('message');
      const chatBox = document.getElementById('chatBox');
      const message = messageInput.value.trim();
      if (message) {
        const messageElement = document.createElement('div');
        messageElement.classList.add('chat-message', 'text-primary');
        messageElement.textContent = `You: ${message}`;
        chatBox.appendChild(messageElement);
        chatBox.scrollTop = chatBox.scrollHeight;
        messageInput.value = '';
        // Mock support response
        setTimeout(() => {
          const responseElement = document.createElement('div');
          responseElement.classList.add('chat-message', 'text-muted');
          responseElement.textContent = 'Support: Thanks for your message! We’ll get back to you soon.';
          chatBox.appendChild(responseElement);
          chatBox.scrollTop = chatBox.scrollHeight;
        }, 1000);
      }
    }

    // Mock API response
 const mockData = {
  user: { name: 'Mubarak' },
  stats: { active: 3, pending: 1, completed: 15 },
  shipments: [
    { trackingId: '123456', from: 'Lagos', to: 'Abuja', status: 'In Transit', progress: 75 }
  ]
};

function loadDashboard() {
  document.getElementById('welcomeMessage').textContent = `Welcome, ${mockData.user.name}`;
  document.getElementById('activeShipments').textContent = mockData.stats.active;
  document.getElementById('pendingDeliveries').textContent = mockData.stats.pending;
  document.getElementById('completedOrders').textContent = mockData.stats.completed;

  const ctx = document.getElementById('shipmentChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Completed', 'Pending', 'In Transit', 'Failed'],
      datasets: [{
        label: 'Shipment Status',
        data: [15, 1, 3, 0],
        backgroundColor: [
          'rgba(40, 167, 69, 0.6)',
          'rgba(255, 193, 7, 0.6)',
          'rgba(13, 110, 253, 0.6)',
          'rgba(220, 53, 69, 0.6)'
        ],
        borderColor: [
          'rgba(40, 167, 69, 1)',
          'rgba(255, 193, 7, 1)',
          'rgba(13, 110, 253, 1)',
          'rgba(220, 53, 69, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      animation: {
        duration: 1200,
        easing: 'easeOutBounce'
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            stepSize: 1
          }
        }
      },
      plugins: {
        legend: {
          display: true,
          position: 'bottom'
        }
      }
    }
  });
}

document.addEventListener('DOMContentLoaded', loadDashboard);

