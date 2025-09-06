<?php
include '../layout/adminLayout.php';

// Sample outpatient records (replace with DB queries)
$outpatients = [
  ['id' => 1, 'patient' => 'Juan Dela Cruz', 'doctor' => 'Dr. Maria Santos', 'visit_date' => '2025-09-01', 'diagnosis' => 'Hypertension', 'status' => 'Ongoing'],
  ['id' => 2, 'patient' => 'Ana Reyes', 'doctor' => 'Dr. Carlos Reyes', 'visit_date' => '2025-08-28', 'diagnosis' => 'Asthma', 'status' => 'Completed'],
  ['id' => 3, 'patient' => 'Mark Lopez', 'doctor' => 'Dr. Ana Lopez', 'visit_date' => '2025-08-25', 'diagnosis' => 'Skin Allergy', 'status' => 'Referred'],
  ['id' => 4, 'patient' => 'Sophia Fernandez', 'doctor' => 'Dr. Luis Fernandez', 'visit_date' => '2025-08-20', 'diagnosis' => 'Back Pain', 'status' => 'Cancelled'],
];

$content = '
<div class="p-6 max-w-7xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Outpatient Records</span>
  </nav>

  <!-- Page Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Outpatient Records</h1>
    <button onclick="openAddModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow flex items-center gap-2">
      <i class="bx bx-plus text-xl"></i> New Outpatient Record
    </button>
  </div>

  <!-- Outpatient Records Table -->
  <div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="w-full text-sm text-left text-gray-600">
      <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
        <tr>
          <th class="px-6 py-3">Record ID</th>
          <th class="px-6 py-3">Patient</th>
          <th class="px-6 py-3">Doctor</th>
          <th class="px-6 py-3">Visit Date</th>
          <th class="px-6 py-3">Diagnosis</th>
          <th class="px-6 py-3">Status</th>
          <th class="px-6 py-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
';

foreach ($outpatients as $o) {
  $statusColor = match($o['status']) {
    'Ongoing'   => 'bg-yellow-100 text-yellow-700',
    'Completed' => 'bg-green-100 text-green-700',
    'Referred'  => 'bg-blue-100 text-blue-700',
    'Cancelled' => 'bg-red-100 text-red-700',
    default     => 'bg-gray-100 text-gray-700',
  };

  $content .= '
        <tr class="border-b hover:bg-gray-50">
          <td class="px-6 py-4 font-semibold text-gray-900">#'.$o['id'].'</td>
          <td class="px-6 py-4">'.$o['patient'].'</td>
          <td class="px-6 py-4">'.$o['doctor'].'</td>
          <td class="px-6 py-4">'.$o['visit_date'].'</td>
          <td class="px-6 py-4">'.$o['diagnosis'].'</td>
          <td class="px-6 py-4"><span class="px-3 py-1 rounded-full text-xs font-semibold '.$statusColor.'">'.$o['status'].'</span></td>
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

<!-- Add Outpatient Record Modal -->
<div id="addModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
    <h2 class="text-xl font-bold mb-4">New Outpatient Record</h2>
    <form class="space-y-4">
      <div>
        <label class="block text-sm font-medium">Patient Name</label>
        <input type="text" class="w-full border rounded-lg px-3 py-2" placeholder="Enter patient name">
      </div>
      <div>
        <label class="block text-sm font-medium">Doctor</label>
        <select class="w-full border rounded-lg px-3 py-2">
          <option>Dr. Maria Santos</option>
          <option>Dr. Carlos Reyes</option>
          <option>Dr. Ana Lopez</option>
          <option>Dr. Luis Fernandez</option>
        </select>
      </div>
      <div>
        <label class="block text-sm font-medium">Visit Date</label>
        <input type="date" class="w-full border rounded-lg px-3 py-2">
      </div>
      <div>
        <label class="block text-sm font-medium">Diagnosis</label>
        <textarea class="w-full border rounded-lg px-3 py-2" placeholder="Enter diagnosis"></textarea>
      </div>
      <div>
        <label class="block text-sm font-medium">Status</label>
        <select class="w-full border rounded-lg px-3 py-2">
          <option>Ongoing</option>
          <option>Completed</option>
          <option>Referred</option>
          <option>Cancelled</option>
        </select>
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
