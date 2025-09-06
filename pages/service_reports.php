<?php
include '../layout/adminLayout.php';

$serviceReportsContent = '
<div class="p-6 max-w-7xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Service Reports</span>
  </nav>

  <!-- Header -->
  <div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Hospital Service Reports</h1>
    <p class="text-gray-600">Overview of key service utilization and performance indicators.</p>
  </div>

  <!-- KPI Cards -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white shadow rounded-xl p-4 text-center">
      <h2 class="text-3xl font-bold text-blue-600">980</h2>
      <p class="text-gray-600">Appointments</p>
    </div>
    <div class="bg-white shadow rounded-xl p-4 text-center">
      <h2 class="text-3xl font-bold text-green-600">450</h2>
      <p class="text-gray-600">Admissions</p>
    </div>
    <div class="bg-white shadow rounded-xl p-4 text-center">
      <h2 class="text-3xl font-bold text-purple-600">120</h2>
      <p class="text-gray-600">Telehealth Sessions</p>
    </div>
    <div class="bg-white shadow rounded-xl p-4 text-center">
      <h2 class="text-3xl font-bold text-red-600">60</h2>
      <p class="text-gray-600">Emergency Cases</p>
    </div>
  </div>

  <!-- Charts -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Monthly Service Usage -->
    <div class="bg-white shadow rounded-xl p-6">
      <h2 class="text-lg font-bold text-gray-700 mb-4">Monthly Service Usage</h2>
      <canvas id="serviceUsageChart" height="150"></canvas>
    </div>

    <!-- Service Breakdown -->
    <div class="bg-white shadow rounded-xl p-6">
      <h2 class="text-lg font-bold text-gray-700 mb-4">Service Breakdown</h2>
      <canvas id="serviceBreakdownChart" height="150"></canvas>
    </div>
  </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Bar Chart - Service Usage
  const usageCtx = document.getElementById("serviceUsageChart").getContext("2d");
  new Chart(usageCtx, {
    type: "bar",
    data: {
      labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep"],
      datasets: [
        { label: "Appointments", data: [150, 180, 200, 220, 210, 230], backgroundColor: "#3b82f6" },
        { label: "Admissions", data: [70, 90, 80, 110, 95, 105], backgroundColor: "#10b981" },
        { label: "Telehealth", data: [20, 25, 30, 28, 35, 40], backgroundColor: "#8b5cf6" },
        { label: "Emergency", data: [10, 12, 14, 16, 13, 15], backgroundColor: "#ef4444" }
      ]
    },
    options: {
      responsive: true,
      plugins: { legend: { position: "top" } },
      scales: { y: { beginAtZero: true } }
    }
  });

  // Pie Chart - Service Breakdown
  const breakdownCtx = document.getElementById("serviceBreakdownChart").getContext("2d");
  new Chart(breakdownCtx, {
    type: "pie",
    data: {
      labels: ["Appointments", "Admissions", "Telehealth", "Emergency"],
      datasets: [{
        data: [980, 450, 120, 60],
        backgroundColor: ["#3b82f6", "#10b981", "#8b5cf6", "#ef4444"]
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { position: "bottom" } }
    }
  });
</script>
';

adminLayout($serviceReportsContent);
?>
