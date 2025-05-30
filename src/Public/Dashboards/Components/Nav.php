<?php
// Nav.php - Dynamic Sidebar Navigation Component

// Get current PHP script filename (e.g., 'user_dashboard.php')
$currentPage = basename($_SERVER['PHP_SELF']);

// Define nav items: page => [label, url, icon]
$navItems = [
  'User.php' => ['label' => 'Dashboard', 'url' => './User.php', 'icon' => 'fa-home'],
  'booking.php'        => ['label' => 'Book Delivery', 'url' => '/booking.php', 'icon' => 'fa-shipping-fast'],
  'tracking.php'       => ['label' => 'Track Shipment', 'url' => './tracking.php', 'icon' => 'fa-route'],
  'quote.php'          => ['label' => 'Get Quote', 'url' => '/quote.php', 'icon' => 'fa-calculator'],
  // Add more pages here if needed
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- <title>User Dashboard - LogiTech</title> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="./Components/Nav.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
 <style>
 
</style>
</head>
<!-- Mobile Navbar -->
<nav class="navbar navbar-light bg-light d-md-none">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center gap-2 py-4 animate__animated animate__fadeInDown" href="#" style="font-weight: 700; font-size: 1.8rem; user-select:none;">
      <i class="fas fa-truck text-primary fs-4"></i>
      <span class="text-dark">Logi</span><span class="text-primary">Tech</span>
    </a>
    <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
      <i class="fas fa-bars"></i>
    </button>
  </div>
</nav>

<!-- Mobile Sidebar -->
<div class="offcanvas offcanvas-end d-md-none" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="mobileSidebarLabel">Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="nav flex-column">
      <?php foreach ($navItems as $page => $item): ?>
        <li class="nav-item">
          <a href="<?= $item['url'] ?>" class="nav-link <?= ($currentPage === $page) ? 'active' : '' ?>">
            <i class="fas <?= $item['icon'] ?> me-2"></i>
            <?= $item['label'] ?>
          </a>
        </li>
      <?php endforeach; ?>
      <li class="nav-item"><a class="nav-link" href="#" onclick="toggleChat()"><i class="fas fa-comments me-2"></i>Support Chat</a></li>
      <li class="nav-item"><a class="nav-link" href="/logout"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
    </ul>
  </div>
</div>

<!-- Desktop Sidebar -->
<nav class="col-md-2 d-none d-md-block sidebar">
  <div class="text-center mb-4">
    <h4 class="company-name mb-0 pt-2 animate__animated animate__fadeInDown">🚚 Logi<span class="text-primary">Tech</span></h4>
  </div>
  <ul class="nav flex-column">
    <?php foreach ($navItems as $page => $item): ?>
      <li class="nav-item">
        <a href="<?= $item['url'] ?>" class="nav-link <?= ($currentPage === $page) ? 'active' : '' ?>">
          <i class="fas <?= $item['icon'] ?> me-2"></i>
          <?= $item['label'] ?>
        </a>
      </li>
    <?php endforeach; ?>
    <li class="nav-item"><a class="nav-link" href="#" onclick="toggleChat()"><i class="fas fa-comments me-2"></i>Support Chat</a></li>
    <li class="nav-item"><a class="nav-link" href="/logout"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
  </ul>
</nav>
<sricpt src="./Components/Nav.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
