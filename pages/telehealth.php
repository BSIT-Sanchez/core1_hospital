<?php
include '../layout/adminLayout.php';

// Sample telehealth sessions (replace with DB queries)
$sessions = [
  ['id' => 1, 'patient' => 'Juan Dela Cruz', 'doctor' => 'Dr. Maria Santos', 'specialty' => 'Cardiology', 'status' => 'Scheduled', 'date' => '2025-09-05 10:00 AM'],
  ['id' => 2, 'patient' => 'Ana Reyes', 'doctor' => 'Dr. Carlos Reyes', 'specialty' => 'Pediatrics', 'status' => 'Ongoing', 'date' => '2025-09-05 11:00 AM'],
  ['id' => 3, 'patient' => 'Mark Lopez', 'doctor' => 'Dr. Ana Lopez', 'specialty' => 'Dermatology', 'status' => 'Completed', 'date' => '2025-09-04 03:00 PM'],
  ['id' => 4, 'patient' => 'Sophia Fernandez', 'doctor' => 'Dr. Luis Fernandez', 'specialty' => 'Orthopedics', 'status' => 'Cancelled', 'date' => '2025-09-03 02:00 PM'],
];

$content = '
<div class="p-6 max-w-7xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Telehealth</span>
  </nav>

  <!-- Page Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Telehealth Consultations</h1>
    <button onclick="openAddModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow flex items-center gap-2">
      <i class="bx bx-video-plus text-xl"></i> New Telehealth Session
    </button>
  </div>

  <!-- Telehealth Table -->
  <div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="w-full text-sm text-left text-gray-600">
      <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
        <tr>
          <th class="px-6 py-3">Session ID</th>
          <th class="px-6 py-3">Patient</th>
          <th class="px-6 py-3">Doctor</th>
          <th class="px-6 py-3">Specialty</th>
          <th class="px-6 py-3">Date & Time</th>
          <th class="px-6 py-3">Status</th>
          <th class="px-6 py-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
';

foreach ($sessions as $s) {
  $statusColor = match($s['status']) {
    'Scheduled' => 'bg-yellow-100 text-yellow-700',
    'Ongoing'   => 'bg-blue-100 text-blue-700',
    'Completed' => 'bg-green-100 text-green-700',
    'Cancelled' => 'bg-red-100 text-red-700',
    default     => 'bg-gray-100 text-gray-700',
  };

  $content .= '
        <tr class="border-b hover:bg-gray-50">
          <td class="px-6 py-4 font-semibold text-gray-900">#'.$s['id'].'</td>
          <td class="px-6 py-4">'.$s['patient'].'</td>
          <td class="px-6 py-4">'.$s['doctor'].'</td>
          <td class="px-6 py-4">'.$s['specialty'].'</td>
          <td class="px-6 py-4">'.$s['date'].'</td>
          <td class="px-6 py-4"><span class="px-3 py-1 rounded-full text-xs font-semibold '.$statusColor.'">'.$s['status'].'</span></td>
          <td class="px-6 py-4 text-center space-x-2">
            <button class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded" title="Start Session"><i class="bx bx-video"></i></button>
            <button class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded" title="Reschedule"><i class="bx bx-calendar-edit"></i></button>
            <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded" title="Cancel"><i class="bx bx-x"></i></button>
          </td>
        </tr>
  ';
}

$content .= '
      </tbody>
    </table>
  </div>
</div>

<!-- Add Session Modal -->
<div id="addModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
    <h2 class="text-xl font-bold mb-4">New Telehealth Session</h2>
    <form class="space-y-4">
      <div>
        <label class="block text-sm font-medium">Patient Name</label>
        <input type="text" class="w-full border rounded-lg px-3 py-2" placeholder="Enter patient name">
      </div>
      <div>
        <label class="block text-sm font-medium">Doctor</label>
        <select class="w-full border rounded-lg px-3 py-2">
          <option>Dr. Maria Santos - Cardiology</option>
          <option>Dr. Carlos Reyes - Pediatrics</option>
          <option>Dr. Ana Lopez - Dermatology</option>
          <option>Dr. Luis Fernandez - Orthopedics</option>
        </select>
      </div>
      <div>
        <label class="block text-sm font-medium">Date & Time</label>
        <input type="datetime-local" class="w-full border rounded-lg px-3 py-2">
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
