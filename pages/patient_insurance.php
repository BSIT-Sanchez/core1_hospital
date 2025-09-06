<?php
include '../layout/adminLayout.php';

// Sample insurance data (replace with DB queries later)
$insuranceRecords = [
  ['id' => 'P-2025-0001', 'name' => 'John Doe', 'provider' => 'PhilHealth', 'policy' => 'PH-12345', 'coverage' => 'Inpatient, Outpatient', 'validity' => '2026-12-31'],
  ['id' => 'P-2025-0002', 'name' => 'Jane Smith', 'provider' => 'Maxicare', 'policy' => 'MX-56789', 'coverage' => 'Inpatient, Outpatient, Dental', 'validity' => '2025-10-15'],
  ['id' => 'P-2025-0003', 'name' => 'Michael Cruz', 'provider' => 'Medicard', 'policy' => 'MC-98765', 'coverage' => 'Inpatient Only', 'validity' => '2027-01-01'],
];

$content = '
<div class="p-6 max-w-7xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Patient Insurance</span>
  </nav>

  <!-- Page Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Patient Insurance</h1>
    <button onclick="openAddModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow flex items-center gap-2">
      <i class="bx bx-plus-circle text-xl"></i> Add Insurance
    </button>
  </div>

  <!-- Table -->
  <div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="w-full text-sm text-left text-gray-600">
      <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
        <tr>
          <th class="px-6 py-3">Patient ID</th>
          <th class="px-6 py-3">Patient Name</th>
          <th class="px-6 py-3">Provider</th>
          <th class="px-6 py-3">Policy Number</th>
          <th class="px-6 py-3">Coverage</th>
          <th class="px-6 py-3">Validity</th>
          <th class="px-6 py-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
';

foreach ($insuranceRecords as $record) {
  $validityClass = (strtotime($record['validity']) < time())
    ? 'text-red-600 font-semibold'
    : 'text-green-600 font-semibold';

  $content .= '
        <tr class="border-b hover:bg-gray-50">
          <td class="px-6 py-4 font-medium text-gray-900">'.$record['id'].'</td>
          <td class="px-6 py-4">'.$record['name'].'</td>
          <td class="px-6 py-4">'.$record['provider'].'</td>
          <td class="px-6 py-4">'.$record['policy'].'</td>
          <td class="px-6 py-4">'.$record['coverage'].'</td>
          <td class="px-6 py-4 '.$validityClass.'">'.$record['validity'].'</td>
          <td class="px-6 py-4 text-center space-x-2">
            <button class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded"><i class="bx bx-show"></i> View</button>
            <button class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded"><i class="bx bx-edit"></i> Edit</button>
            <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded"><i class="bx bx-trash"></i> Delete</button>
          </td>
        </tr>
  ';
}

$content .= '
      </tbody>
    </table>
  </div>
</div>

<!-- Add Insurance Modal -->
<div id="addModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
    <h2 class="text-xl font-bold mb-4">Add Patient Insurance</h2>
    <form class="space-y-4">
      <div>
        <label class="block text-sm font-medium">Patient ID</label>
        <input type="text" class="w-full border rounded-lg px-3 py-2" placeholder="Enter Patient ID">
      </div>
      <div>
        <label class="block text-sm font-medium">Provider</label>
        <input type="text" class="w-full border rounded-lg px-3 py-2" placeholder="Enter Provider">
      </div>
      <div>
        <label class="block text-sm font-medium">Policy Number</label>
        <input type="text" class="w-full border rounded-lg px-3 py-2" placeholder="Enter Policy Number">
      </div>
      <div>
        <label class="block text-sm font-medium">Coverage</label>
        <input type="text" class="w-full border rounded-lg px-3 py-2" placeholder="Enter Coverage">
      </div>
      <div>
        <label class="block text-sm font-medium">Validity</label>
        <input type="date" class="w-full border rounded-lg px-3 py-2">
      </div>
      <div class="flex justify-end gap-2 mt-4">
        <button type="button" onclick="closeAddModal()" class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save</button>
      </div>
    </form>
  </div>
</div>

<script>
function openAddModal() {
  document.getElementById("addModal").classList.remove("hidden");
}
function closeAddModal() {
  document.getElementById("addModal").classList.add("hidden");
}
</script>
';

adminLayout($content);
?>
