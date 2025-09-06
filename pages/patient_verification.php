<?php
include '../layout/adminLayout.php';

// Sample patient verification data (replace with DB query later)
$patients = [
  ['id' => 'P-2025-0001', 'name' => 'John Doe', 'contact' => '09171234567', 'status' => 'Pending'],
  ['id' => 'P-2025-0002', 'name' => 'Jane Smith', 'contact' => '09179876543', 'status' => 'Verified'],
  ['id' => 'P-2025-0003', 'name' => 'Michael Cruz', 'contact' => '09221234567', 'status' => 'Rejected'],
];

$content = '
<div class="p-6 max-w-6xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Patient Verification</span>
  </nav>

  <!-- Page Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Patient Verification</h1>
    <button onclick="bulkVerify()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow flex items-center gap-2">
      <i class="bx bx-check-shield text-xl"></i> Bulk Verify
    </button>
  </div>

  <!-- Search -->
  <div class="bg-white shadow rounded-xl p-4 mb-6 flex items-center gap-2">
    <input type="text" id="searchPatient" placeholder="Search patient by name or ID..." class="flex-1 border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
    <button onclick="searchPatient()" class="px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"><i class="bx bx-search"></i></button>
  </div>

  <!-- Verification Table -->
  <div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="w-full text-sm text-left text-gray-600">
      <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
        <tr>
          <th class="px-6 py-3">Patient ID</th>
          <th class="px-6 py-3">Patient Name</th>
          <th class="px-6 py-3">Contact</th>
          <th class="px-6 py-3">Verification Status</th>
          <th class="px-6 py-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
';

foreach ($patients as $p) {
  // Status badge styling
  $statusBadge = '';
  if ($p['status'] === 'Pending') {
    $statusBadge = '<span class="px-2 py-1 text-xs font-semibold text-yellow-700 bg-yellow-100 rounded-full">Pending</span>';
  } elseif ($p['status'] === 'Verified') {
    $statusBadge = '<span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Verified</span>';
  } else {
    $statusBadge = '<span class="px-2 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">Rejected</span>';
  }

  $content .= '
        <tr class="border-b hover:bg-gray-50">
          <td class="px-6 py-4 font-medium text-gray-900">'.$p['id'].'</td>
          <td class="px-6 py-4">'.$p['name'].'</td>
          <td class="px-6 py-4">'.$p['contact'].'</td>
          <td class="px-6 py-4">'.$statusBadge.'</td>
          <td class="px-6 py-4 text-center space-x-2">
  ';

  if ($p['status'] === 'Pending') {
    $content .= '
            <button class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded" onclick="verifyPatient(\''.$p['id'].'\')"><i class="bx bx-check"></i> Verify</button>
            <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded" onclick="rejectPatient(\''.$p['id'].'\')"><i class="bx bx-x"></i> Reject</button>
    ';
  } else {
    $content .= '<span class="text-gray-400 italic">No action available</span>';
  }

  $content .= '
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
  alert("Search functionality to be implemented.");
}

function verifyPatient(id) {
  alert("Patient " + id + " has been verified.");
}

function rejectPatient(id) {
  alert("Patient " + id + " has been rejected.");
}

function bulkVerify() {
  alert("Bulk verification functionality to be implemented.");
}
</script>
';

adminLayout($content);
?>
