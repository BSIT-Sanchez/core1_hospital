<?php
include '../layout/adminLayout.php';

// Sample patient records (replace with DB query later)
$records = [
  ['id' => 'P-2025-0001', 'name' => 'John Doe', 'age' => 32, 'gender' => 'Male', 'contact' => '09171234567', 'status' => 'Active'],
  ['id' => 'P-2025-0002', 'name' => 'Jane Smith', 'age' => 28, 'gender' => 'Female', 'contact' => '09179876543', 'status' => 'Active'],
  ['id' => 'P-2025-0003', 'name' => 'Michael Cruz', 'age' => 45, 'gender' => 'Male', 'contact' => '09221234567', 'status' => 'Inactive'],
];

$content = '
<div class="p-6 max-w-7xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Patient Records</span>
  </nav>

  <!-- Page Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Patient Records</h1>
    <button onclick="exportRecords()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow flex items-center gap-2">
      <i class="bx bx-export text-xl"></i> Export Records
    </button>
  </div>

  <!-- Search & Filter -->
  <div class="bg-white shadow rounded-xl p-4 mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div class="flex items-center gap-2 w-full md:w-1/2">
      <input type="text" id="search" placeholder="Search patient by name or ID..." class="w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
      <button onclick="searchPatient()" class="px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"><i class="bx bx-search"></i></button>
    </div>
    <div>
      <select id="statusFilter" class="border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
        <option value="">Filter by Status</option>
        <option>Active</option>
        <option>Inactive</option>
      </select>
    </div>
  </div>

  <!-- Patient Records Table -->
  <div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="w-full text-sm text-left text-gray-600">
      <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
        <tr>
          <th class="px-6 py-3">Patient ID</th>
          <th class="px-6 py-3">Patient Name</th>
          <th class="px-6 py-3">Age</th>
          <th class="px-6 py-3">Gender</th>
          <th class="px-6 py-3">Contact</th>
          <th class="px-6 py-3">Status</th>
          <th class="px-6 py-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
';

foreach ($records as $r) {
  $statusBadge = $r['status'] === 'Active'
    ? '<span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Active</span>'
    : '<span class="px-2 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">Inactive</span>';

  $content .= '
        <tr class="border-b hover:bg-gray-50">
          <td class="px-6 py-4 font-medium text-gray-900">'.$r['id'].'</td>
          <td class="px-6 py-4">'.$r['name'].'</td>
          <td class="px-6 py-4">'.$r['age'].'</td>
          <td class="px-6 py-4">'.$r['gender'].'</td>
          <td class="px-6 py-4">'.$r['contact'].'</td>
          <td class="px-6 py-4">'.$statusBadge.'</td>
          <td class="px-6 py-4 text-center space-x-2">
            <button class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded" title="View"><i class="bx bx-show"></i></button>
            <button class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded" title="Edit"><i class="bx bx-edit"></i></button>
            <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded" title="Delete"><i class="bx bx-trash"></i></button>
          </td>
        </tr>
  ';
}

$content .= '
      </tbody>
    </table>
  </div>
</div>

<script>
function searchPatient() {
  alert("Search function to be implemented.");
}

function exportRecords() {
  alert("Export function to be implemented.");
}
</script>
';

adminLayout($content);
?>
