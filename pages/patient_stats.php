<?php
include '../layout/adminLayout.php';

$patientStatsContent = '
<div class="p-6 max-w-7xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Patient Statistics</span>
  </nav>

  <!-- Header -->
  <div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Patient Statistics & Insights</h1>
    <p class="text-gray-600">Overview of patient demographics, visits, and trends.</p>
  </div>

  <!-- KPI Cards -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white shadow rounded-xl p-4 text-center">
      <h2 class="text-3xl font-bold text-blue-600">1,250</h2>
      <p class="text-gray-600">Total Patients</p>
    </div>
    <div class="bg-white shadow rounded-xl p-4 text-center">
      <h2 class="text-3xl font-bold text-green-600">320</h2>
      <p class="text-gray-600">Active Inpatients</p>
    </div>
    <div class="bg-white shadow rounded-xl p-4 text-center">
      <h2 class="text-3xl font-bold text-purple-600">560</h2>
      <p class="text-gray-600">Outpatients This Month</p>
    </div>
    <div class="bg-white shadow rounded-xl p-4 text-center">
      <h2 class="text-3xl font-bold text-red-600">45</h2>
      <p class="text-gray-600">Emergency Cases</p>
    </div>
  </div>

  <!-- Charts -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Patient Visits Trend -->
    <div class="bg-white shadow rounded-xl p-6">
      <h2 class="text-lg font-bold text-gray-700 mb-4">Patient Visits (Last 6 Months)</h2>
      <canvas id="visitsChart" height="150"></canvas>
    </div>

    <!-- Patient Demographics -->
    <div class="bg-white shadow rounded-xl p-6">
      <h2 class="text-lg font-bold text-gray-700 mb-4">Patient Demographics</h2>
      <canvas id="demographicsChart" height="150"></canvas>
    </div>
  </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Line Chart - Patient Visits
  const visitsCtx = document.getElementById("visitsChart").getContext("2d");
  new Chart(visitsCtx, {
    type: "line",
    data: {
      labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep"],
      datasets: [{
        label: "Visits",
        data: [200, 300, 250, 400, 380, 450],
        borderColor: "#2563eb",
        backgroundColor: "rgba(37, 99, 235, 0.2)",
        borderWidth: 2,
        fill: true,
        tension: 0.3
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false } }
    }
  });

  // Doughnut Chart - Demographics
  const demoCtx = document.getElementById("demographicsChart").getContext("2d");
  new Chart(demoCtx, {
    type: "doughnut",
    data: {
      labels: ["Male", "Female", "Children", "Senior Citizens"],
      datasets: [{
        data: [40, 45, 10, 5],
        backgroundColor: ["#3b82f6", "#ec4899", "#f59e0b", "#10b981"]
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { position: "bottom" } }
    }
  });
</script>
';

adminLayout($patientStatsContent);
?>
