<?php
include '../layout/adminLayout.php';

$criticalCasesContent = '
<div class="p-6 max-w-7xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="mb-6 text-sm text-gray-600" aria-label="breadcrumb">
      <ol class="flex space-x-2">
          <li><a href="dashboard.php" class="text-blue-600 hover:underline">Dashboard</a></li>
          <li>/</li>
          <li><a href="#" class="text-blue-600 hover:underline">Emergency & ER Triage</a></li>
          <li>/</li>
          <li class="text-gray-800">Critical Cases</li>
      </ol>
  </nav>

  <!-- Header -->
  <div class="bg-red-700 text-white p-4 rounded-lg shadow mb-6">
      <h1 class="text-xl font-bold">Critical Cases</h1>
      <p class="text-sm">Monitor and manage patients requiring immediate attention</p>
  </div>

  <!-- Search / Filter -->
  <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
      <input type="text" placeholder="Search by Patient ID or Name..." class="border rounded p-2 w-full md:w-1/3">
      <select class="border rounded p-2 w-full md:w-1/4">
          <option value="">Filter by Status</option>
          <option value="Ongoing">Ongoing Treatment</option>
          <option value="Transferred">Transferred</option>
          <option value="Resolved">Resolved</option>
      </select>
  </div>

  <!-- Critical Cases Table -->
  <div class="overflow-x-auto bg-white rounded-lg shadow">
      <table class="min-w-full border rounded-lg">
          <thead class="bg-gray-100">
              <tr>
                  <th class="px-4 py-2 border">Patient ID</th>
                  <th class="px-4 py-2 border">Name</th>
                  <th class="px-4 py-2 border">Symptoms</th>
                  <th class="px-4 py-2 border">Vital Signs</th>
                  <th class="px-4 py-2 border">Status</th>
                  <th class="px-4 py-2 border">Admitted</th>
                  <th class="px-4 py-2 border">Actions</th>
              </tr>
          </thead>
          <tbody>
              <tr class="bg-red-50">
                  <td class="px-4 py-2 border">P-1023</td>
                  <td class="px-4 py-2 border font-semibold">Juan Dela Cruz</td>
                  <td class="px-4 py-2 border">Severe chest pain, difficulty breathing</td>
                  <td class="px-4 py-2 border">BP: 90/60, HR: 120</td>
                  <td class="px-4 py-2 border text-red-600 font-bold">Ongoing</td>
                  <td class="px-4 py-2 border">2025-09-04 10:20 AM</td>
                  <td class="px-4 py-2 border text-center">
                      <button class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">Update</button>
                      <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm">Transfer</button>
                  </td>
              </tr>
              <tr class="bg-red-50">
                  <td class="px-4 py-2 border">P-1088</td>
                  <td class="px-4 py-2 border font-semibold">Maria Santos</td>
                  <td class="px-4 py-2 border">Severe head trauma, unconscious</td>
                  <td class="px-4 py-2 border">BP: 80/55, HR: 130</td>
                  <td class="px-4 py-2 border text-red-600 font-bold">Ongoing</td>
                  <td class="px-4 py-2 border">2025-09-04 09:50 AM</td>
                  <td class="px-4 py-2 border text-center">
                      <button class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">Update</button>
                      <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm">Transfer</button>
                  </td>
              </tr>
          </tbody>
      </table>
  </div>

  <!-- Alerts -->
  <div class="mt-8">
      <h2 class="text-lg font-semibold mb-3">Critical Alerts</h2>
      <ul class="space-y-2">
          <li class="bg-red-100 border-l-4 border-red-600 p-3 rounded">
              🚨 <span class="font-bold">Code Red:</span> Patient Juan Dela Cruz requires immediate cardiology consult.
          </li>
          <li class="bg-red-100 border-l-4 border-red-600 p-3 rounded">
              🚨 <span class="font-bold">Code Trauma:</span> Patient Maria Santos needs urgent neurosurgery evaluation.
          </li>
      </ul>
  </div>

</div>
';

adminLayout($criticalCasesContent);
?>
