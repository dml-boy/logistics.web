// Sample data for deliveries
const deliveries = [
  { trackingId: "SHIP101", pickup: "New York", dropoff: "Boston", status: "In Transit" },
  { trackingId: "SHIP102", pickup: "Chicago", dropoff: "Detroit", status: "Pending" },
  { trackingId: "SHIP103", pickup: "San Francisco", dropoff: "Los Angeles", status: "Delivered" },
];

// Update status cards based on deliveries data
function updateStatusCards() {
  const assigned = deliveries.length;
  const completed = deliveries.filter(d => d.status === "Delivered").length;
  const pending = deliveries.filter(d => d.status === "Pending").length;

  document.getElementById("deliveriesAssigned").textContent = assigned;
  document.getElementById("deliveriesCompleted").textContent = completed;
  document.getElementById("pendingDeliveries").textContent = pending;
}

// Render both desktop and mobile deliveries
function renderDeliveries() {
  const tableBody = document.getElementById("deliveriesTable");
  const cardsContainer = document.getElementById("deliveriesCards");
  if (!tableBody || !cardsContainer) return;

  tableBody.innerHTML = "";
  cardsContainer.innerHTML = "";

  deliveries.forEach(delivery => {
    // Table row (desktop)
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${delivery.trackingId}</td>
      <td>${delivery.pickup}</td>
      <td>${delivery.dropoff}</td>
      <td>${delivery.status}</td>
      <td>
        <select class="form-select form-select-sm" onchange="updateStatus('${delivery.trackingId}', this.value)">
          <option value="Pending" ${delivery.status === "Pending" ? "selected" : ""}>Pending</option>
          <option value="In Transit" ${delivery.status === "In Transit" ? "selected" : ""}>In Transit</option>
          <option value="Delivered" ${delivery.status === "Delivered" ? "selected" : ""}>Delivered</option>
        </select>
      </td>
    `;
    tableBody.appendChild(row);

    // Mobile card
    const card = document.createElement("div");
    card.className = "delivery-card border rounded p-3 mb-3 bg-light";
    card.innerHTML = `
      <h6>Tracking ID</h6>
      <p>${delivery.trackingId}</p>
      <h6>Pickup</h6>
      <p>${delivery.pickup}</p>
      <h6>Dropoff</h6>
      <p>${delivery.dropoff}</p>
      <h6>Status</h6>
      <select class="form-select form-select-sm mb-2" onchange="updateStatus('${delivery.trackingId}', this.value)">
        <option value="Pending" ${delivery.status === "Pending" ? "selected" : ""}>Pending</option>
        <option value="In Transit" ${delivery.status === "In Transit" ? "selected" : ""}>In Transit</option>
        <option value="Delivered" ${delivery.status === "Delivered" ? "selected" : ""}>Delivered</option>
      </select>
    `;
    cardsContainer.appendChild(card);
  });
}

// Update delivery status and show toast
function updateStatus(trackingId, newStatus) {
  const delivery = deliveries.find(d => d.trackingId === trackingId);
  if (delivery) {
    delivery.status = newStatus;
    showToast(`Status for ${trackingId} updated to "${newStatus}"`);
    renderDeliveries();
    updateStatusCards();
  }
}

// Show Bootstrap toast notification
function showToast(message) {
  const toastContainer = document.createElement("div");
  toastContainer.className = "toast-container position-fixed bottom-0 end-0 p-3";
  toastContainer.innerHTML = `
    <div class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">${message}</div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  `;
  document.body.appendChild(toastContainer);
  const toast = new bootstrap.Toast(toastContainer.querySelector(".toast"));
  toast.show();
  setTimeout(() => toastContainer.remove(), 3000);
}

// Toggle sidebar for mobile
document.getElementById("mobileNavToggle")?.addEventListener("click", e => {
  const sidebar = document.getElementById("sidebar");
  const mainContent = document.getElementById("mainContent");
  if (sidebar && mainContent) {
    const isExpanded = sidebar.classList.toggle("active");
    mainContent.classList.toggle("shifted");
    e.currentTarget.setAttribute("aria-expanded", isExpanded);
  }
});

// Toggle chat widget
function toggleChat() {
  const chatWidget = document.getElementById("chatWidget");
  if (chatWidget) {
    chatWidget.classList.toggle("d-none");
  }
}

// Send chat message
function sendMessage(e) {
  e.preventDefault();
  const msgInput = document.getElementById("message");
  const chatBox = document.getElementById("chatBox");
  if (!msgInput || !chatBox) return;

  const userMsg = msgInput.value.trim();
  if (!userMsg) return;

  const userDiv = document.createElement("div");
  userDiv.className = "text-success mb-1";
  userDiv.textContent = `You: ${userMsg}`;
  chatBox.appendChild(userDiv);
  chatBox.scrollTop = chatBox.scrollHeight;
  msgInput.value = "";

  setTimeout(() => {
    const replyDiv = document.createElement("div");
    replyDiv.className = "text-muted mb-1";
    replyDiv.textContent = "Support: Thanks for your message, we will reply soon.";
    chatBox.appendChild(replyDiv);
    chatBox.scrollTop = chatBox.scrollHeight;
  }, 1500);
}

// Initialize dashboard
document.addEventListener("DOMContentLoaded", () => {
  const chatBox = document.getElementById("chatBox");
  if (chatBox) {
    chatBox.innerHTML = '<div class="text-muted mb-1">Support: Hello! Need help?</div>';
  }

  const welcomeMessage = document.getElementById("welcomeMessage");
  if (welcomeMessage) {
    welcomeMessage.textContent = `Welcome, ${localStorage.getItem("riderName") || "Rider"}`;
  }

  renderDeliveries();
  updateStatusCards();
});
