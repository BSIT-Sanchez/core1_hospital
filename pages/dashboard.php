<?php
include '../layout/adminLayout.php';

// Sample Hospital Data (replace with DB queries)
$totalPatients = 540;
$todayAppointments = 38;
$currentInpatients = 56;
$erCases = 12;

$dashboardContent = '
<div class="p-6">

  <!-- Breadcrumb Navigation -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Hospital Dashboard</span>
  </nav>

  <!-- Page Header -->
  <div class="flex items-center gap-3 mb-6">
    <i class="bx bx-hospital text-slate-700 text-3xl"></i>
    <h1 class="text-2xl font-bold text-gray-800">Hospital Dashboard</h1>
  </div>

  <!-- Quick Stats -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white rounded-xl shadow p-4">
      <h2 class="text-lg font-semibold text-gray-700">Total Patients</h2>
      <p class="text-3xl font-bold text-blue-600 mt-2">'.$totalPatients.'</p>
    </div>
    <div class="bg-white rounded-xl shadow p-4">
      <h2 class="text-lg font-semibold text-gray-700">Appointments Today</h2>
      <p class="text-3xl font-bold text-green-600 mt-2">'.$todayAppointments.'</p>
    </div>
    <div class="bg-white rounded-xl shadow p-4">
      <h2 class="text-lg font-semibold text-gray-700">Current Inpatients</h2>
      <p class="text-3xl font-bold text-purple-600 mt-2">'.$currentInpatients.'</p>
    </div>
    <div class="bg-white rounded-xl shadow p-4">
      <h2 class="text-lg font-semibold text-gray-700">ER Cases</h2>
      <p class="text-3xl font-bold text-red-600 mt-2">'.$erCases.'</p>
    </div>
  </div>

  <!-- Charts -->
  <div class="mt-10">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Hospital Analytics</h2>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <div class="bg-white shadow rounded-xl p-4">
        <h3 class="text-lg font-semibold text-gray-700 mb-2">Patients by Department</h3>
        <div class="h-64">
          <canvas id="deptChart"></canvas>
        </div>
      </div>
      <div class="bg-white shadow rounded-xl p-4">
        <h3 class="text-lg font-semibold text-gray-700 mb-2">Appointments Trend</h3>
        <div class="h-64">
          <canvas id="apptChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Pie Chart: Patients by Department
  const deptCtx = document.getElementById("deptChart").getContext("2d");
  new Chart(deptCtx, {
    type: "doughnut",
    data: {
      labels: ["General Medicine", "Pediatrics", "Cardiology", "Orthopedics", "ER"],
      datasets: [{
        label: "Patients",
        data: [120, 90, 70, 50, 30],
        backgroundColor: [
          "rgba(59, 130, 246, 0.7)",
          "rgba(16, 185, 129, 0.7)",
          "rgba(239, 68, 68, 0.7)",
          "rgba(245, 158, 11, 0.7)",
          "rgba(139, 92, 246, 0.7)"
        ],
        borderColor: [
          "rgba(59, 130, 246, 1)",
          "rgba(16, 185, 129, 1)",
          "rgba(239, 68, 68, 1)",
          "rgba(245, 158, 11, 1)",
          "rgba(139, 92, 246, 1)"
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: { legend: { position: "right" } }
    }
  });

  // Line Chart: Appointments Trend
  const apptCtx = document.getElementById("apptChart").getContext("2d");
  new Chart(apptCtx, {
    type: "line",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
      datasets: [
        {
          label: "Appointments",
          data: [40, 55, 38, 60, 72, 68],
          borderColor: "rgba(16, 185, 129, 1)",
          backgroundColor: "rgba(16, 185, 129, 0.2)",
          tension: 0.3,
          fill: true
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: { legend: { display: false } },
      scales: { y: { beginAtZero: true } }
    }
  });
</script>
';

adminLayout($dashboardContent);
?>
