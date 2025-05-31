  function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const mainContent = document.getElementById('mainContent');
      const isHidden = sidebar.classList.contains('hidden');
      sidebar.classList.toggle('hidden', !isHidden);
      mainContent.classList.toggle('full-width', isHidden);
      mainContent.classList.toggle('content-blur', isHidden);
      mainContent.setAttribute('aria-hidden', isHidden ? 'true' : 'false');
      localStorage.setItem('sidebarState', isHidden ? 'open' : 'closed');
    }

    function toggleChat() {
      const chatWidget = document.getElementById('chatWidget');
      const isVisible = chatWidget.style.display === 'block';
      chatWidget.style.display = isVisible ? 'none' : 'block';
      chatWidget.classList.toggle('animate__fadeInUp', !isVisible);
      chatWidget.classList.toggle('animate__fadeOutDown', isVisible);
    }

    function escapeHTML(str) {
      return str.replace(/[&<>"']/g, function(match) {
        return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[match];
      });
    }

    function sendMessage(e) {
      e.preventDefault();
      const msgInput = document.getElementById('message');
      const chatBox = document.getElementById('chatBox');
      const userMsg = msgInput.value.trim();
      if (!userMsg) return;
      const userDiv = document.createElement('div');
      userDiv.className = 'text-primary mb-2';
      userDiv.textContent = `You: ${escapeHTML(userMsg)}`;
      chatBox.appendChild(userDiv);
      chatBox.scrollTop = chatBox.scrollHeight;
      msgInput.value = '';
      setTimeout(() => {
        const replyDiv = document.createElement('div');
        replyDiv.className = 'text-muted mb-2';
        replyDiv.textContent = 'Support: Thank you for your message.';
        chatBox.appendChild(replyDiv);
        chatBox.scrollTop = chatBox.scrollHeight;
      }, 1500);
    }

    // Persist sidebar state
    document.addEventListener('DOMContentLoaded', () => {
      const sidebarState = localStorage.getItem('sidebarState');
      if (sidebarState === 'closed') {
        toggleSidebar();
      }
    });

    const ctx = document.getElementById('workerChart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
          label: 'Deliveries',
          data: [3, 5, 4, 6, 2, 1, 3],
          backgroundColor: ['#007bff', '#28a745', '#dc3545', '#ffc107', '#17a2b8', '#6610f2', '#6f42c1']
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: true },
          tooltip: { enabled: true }
        },
        scales: {
          y: { beginAtZero: true, title: { display: true, text: 'Number of Deliveries' } },
          x: { title: { display: true, text: 'Day of Week' } }
        }
      }
    });