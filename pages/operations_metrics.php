<?php
include '../layout/adminLayout.php';

$operationsMetricsContent = '
<div class="p-6 max-w-7xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Operations Metrics</span>
  </nav>

  <!-- Header -->
  <div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Operations Metrics</h1>
    <p class="text-gray-600">Monitoring hospital efficiency and utilization in real-time.</p>
  </div>

  <!-- KPI Cards -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white shadow rounded-xl p-4 text-center">
      <h2 class="text-3xl font-bold text-blue-600">78%</h2>
      <p class="text-gray-600">Bed Occupancy Rate</p>
    </div>
    <div class="bg-white shadow rounded-xl p-4 text-center">
      <h2 class="text-3xl font-bold text-green-600">32 mins</h2>
      <p class="text-gray-600">Avg. Patient Wait Time</p>
    </div>
    <div class="bg-white shadow rounded-xl p-4 text-center">
      <h2 class="text-3xl font-bold text-purple-600">88%</h2>
      <p class="text-gray-600">Staff Utilization</p>
    </div>
    <div class="bg-white shadow rounded-xl p-4 text-center">
      <h2 class="text-3xl font-bold text-red-600">65</h2>
      <p class="text-gray-600">ER Patients Today</p>
    </div>
  </div>

  <!-- Charts -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Bed Occupancy Trend -->
    <div class="bg-white shadow rounded-xl p-6">
      <h2 class="text-lg font-bold text-gray-700 mb-4">Bed Occupancy Trend</h2>
      <canvas id="bedOccupancyChart" height="150"></canvas>
    </div>

    <!-- Wait Time Trend -->
    <div class="bg-white shadow rounded-xl p-6">
      <h2 class="text-lg font-bold text-gray-700 mb-4">Average Wait Time (Minutes)</h2>
      <canvas id="waitTimeChart" height="150"></canvas>
    </div>
  </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Line Chart - Bed Occupancy
  const bedCtx = document.getElementById("bedOccupancyChart").getContext("2d");
  new Chart(bedCtx, {
    type: "line",
    data: {
      labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
      datasets: [{
        label: "Bed Occupancy %",
        data: [72, 75, 80, 78, 76, 82, 79],
        borderColor: "#3b82f6",
        backgroundColor: "rgba(59, 130, 246, 0.2)",
        tension: 0.3,
        fill: true
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false } },
      scales: { y: { beginAtZero: true, max: 100 } }
    }
  });

  // Bar Chart - Avg Wait Time
  const waitCtx = document.getElementById("waitTimeChart").getContext("2d");
  new Chart(waitCtx, {
    type: "bar",
    data: {
      labels: ["8AM", "10AM", "12PM", "2PM", "4PM", "6PM"],
      datasets: [{
        label: "Wait Time (mins)",
        data: [25, 30, 28, 35, 40, 32],
        backgroundColor: "#10b981"
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false } },
      scales: { y: { beginAtZero: true } }
    }
  });
</script>
';

adminLayout($operationsMetricsContent);
?>
