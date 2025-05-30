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
      replyDiv.textContent = 'Support: Thank you for your message, we will get back to you shortly.';
      chatBox.appendChild(replyDiv);
      chatBox.scrollTop = chatBox.scrollHeight;
    }, 1500);
  }

  const ctx = document.getElementById('shipmentChart').getContext('2d');
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Shipments',
        data: [12, 19, 10, 15, 22, 18, 24],
        fill: true,
        backgroundColor: 'rgba(0,123,255,0.2)',
        borderColor: 'rgba(0,123,255,1)',
        borderWidth: 2,
        tension: 0.3,
        pointRadius: 4,
        pointBackgroundColor: 'rgba(0,123,255,1)'
      }]
    },
    options: {
      responsive: true,
      scales: { y: { beginAtZero: true } }
    }
  });

  const users = [
    { id: 1, name: 'Alice Johnson', email: 'alice@example.com', role: 'Admin' },
    { id: 2, name: 'Bob Smith', email: 'bob@example.com', role: 'User' },
    { id: 3, name: 'Cathy Lee', email: 'cathy@example.com', role: 'Rider' }
  ];
  const shipments = [
    { trackingId: 'SHIP001', from: 'New York', to: 'Chicago', status: 'In Transit' },
    { trackingId: 'SHIP002', from: 'Los Angeles', to: 'San Francisco', status: 'Delivered' },
    { trackingId: 'SHIP003', from: 'Houston', to: 'Miami', status: 'Pending' }
  ];
  const riders = [
    { id: 101, name: 'John Rider', deliveries: 12 },
    { id: 102, name: 'Jane Driver', deliveries: 7 }
  ];

  function populateTables() {
    const userTable = document.getElementById('userTable');
    userTable.innerHTML = '';
    users.forEach(u => {
      userTable.innerHTML += `
        <tr>
          <td>${u.id}</td><td>${u.name}</td><td>${u.email}</td><td>${u.role}</td>
          <td>
            <button class="btn btn-sm btn-warning me-1" onclick="editUser(${u.id})">Edit</button>
            <button class="btn btn-sm btn-danger" onclick="deleteUser(${u.id})">Delete</button>
          </td>
        </tr>`;
    });

    const shipmentTable = document.getElementById('shipmentTable');
    shipmentTable.innerHTML = '';
    shipments.forEach(s => {
      shipmentTable.innerHTML += `
        <tr>
          <td>${s.trackingId}</td><td>${s.from}</td><td>${s.to}</td><td>${s.status}</td>
          <td>
            <button class="btn btn-sm btn-info me-1" onclick="viewShipment('${s.trackingId}')">View</button>
            <button class="btn btn-sm btn-danger" onclick="deleteShipment('${s.trackingId}')">Delete</button>
          </td>
        </tr>`;
    });

    const riderTable = document.getElementById('riderTable');
    riderTable.innerHTML = '';
    riders.forEach(r => {
      riderTable.innerHTML += `
        <tr>
          <td>${r.id}</td><td>${r.name}</td><td>${r.deliveries}</td>
          <td>
            <button class="btn btn-sm btn-warning me-1" onclick="editRider(${r.id})">Edit</button>
            <button class="btn btn-sm btn-danger" onclick="deleteRider(${r.id})">Delete</button>
          </td>
        </tr>`;
    });
  }

  function editUser(id) { alert('Edit user ' + id); }
  function deleteUser(id) { alert('Delete user ' + id); }
  function viewShipment(id) { alert('View shipment ' + id); }
  function deleteShipment(id) { alert('Delete shipment ' + id); }
  function editRider(id) { alert('Edit rider ' + id); }
  function deleteRider(id) { alert('Delete rider ' + id); }

  populateTables();