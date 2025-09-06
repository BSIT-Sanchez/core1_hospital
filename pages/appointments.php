<?php
include '../layout/adminLayout.php';

// Sample appointment data (replace with DB queries later)
$appointments = [
  ['id' => 1, 'patient' => 'John Doe', 'doctor' => 'Dr. Maria Santos', 'date' => '2025-09-06', 'time' => '09:30 AM', 'status' => 'Confirmed'],
  ['id' => 2, 'patient' => 'Jane Smith', 'doctor' => 'Dr. Carlos Reyes', 'date' => '2025-09-07', 'time' => '11:00 AM', 'status' => 'Pending'],
  ['id' => 3, 'patient' => 'Michael Cruz', 'doctor' => 'Dr. Ana Lopez', 'date' => '2025-09-07', 'time' => '02:15 PM', 'status' => 'Cancelled'],
  ['id' => 4, 'patient' => 'Sarah Kim', 'doctor' => 'Dr. Luis Fernandez', 'date' => '2025-09-08', 'time' => '01:00 PM', 'status' => 'Confirmed'],
];

$content = '
<div class="p-6 max-w-7xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Appointments</span>
  </nav>

  <!-- Page Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Appointments</h1>
    <button onclick="openAddModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow flex items-center gap-2">
      <i class="bx bx-calendar-plus text-xl"></i> Schedule Appointment
    </button>
  </div>

  <!-- Appointment Table -->
  <div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="w-full text-sm text-left text-gray-600">
      <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
        <tr>
          <th class="px-6 py-3">Patient</th>
          <th class="px-6 py-3">Doctor</th>
          <th class="px-6 py-3">Date</th>
          <th class="px-6 py-3">Time</th>
          <th class="px-6 py-3">Status</th>
          <th class="px-6 py-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
';

foreach ($appointments as $appt) {
  $statusClass = match($appt['status']) {
    'Confirmed' => 'bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs',
    'Pending'   => 'bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs',
    'Cancelled' => 'bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs',
    default     => 'bg-gray-100 text-gray-700 px-2 py-1 rounded-full text-xs'
  };

  $content .= '
        <tr class="border-b hover:bg-gray-50">
          <td class="px-6 py-4 font-medium text-gray-900">'.$appt['patient'].'</td>
          <td class="px-6 py-4">'.$appt['doctor'].'</td>
          <td class="px-6 py-4">'.$appt['date'].'</td>
          <td class="px-6 py-4">'.$appt['time'].'</td>
          <td class="px-6 py-4"><span class="'.$statusClass.'">'.$appt['status'].'</span></td>
          <td class="px-6 py-4 text-center space-x-2">
            <button class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded"><i class="bx bx-show"></i></button>
            <button class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded"><i class="bx bx-edit"></i></button>
            <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded"><i class="bx bx-x"></i></button>
          </td>
        </tr>
  ';
}

$content .= '
      </tbody>
    </table>
  </div>
</div>

<!-- Add Appointment Modal -->
<div id="addModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
    <h2 class="text-xl font-bold mb-4">Schedule Appointment</h2>
    <form class="space-y-4">
      <div>
        <label class="block text-sm font-medium">Patient Name</label>
        <input type="text" class="w-full border rounded-lg px-3 py-2" placeholder="Enter patient name">
      </div>
      <div>
        <label class="block text-sm font-medium">Doctor</label>
        <input type="text" class="w-full border rounded-lg px-3 py-2" placeholder="Enter doctor name">
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium">Date</label>
          <input type="date" class="w-full border rounded-lg px-3 py-2">
        </div>
        <div>
          <label class="block text-sm font-medium">Time</label>
          <input type="time" class="w-full border rounded-lg px-3 py-2">
        </div>
      </div>
      <div>
        <label class="block text-sm font-medium">Status</label>
        <select class="w-full border rounded-lg px-3 py-2">
          <option>Pending</option>
          <option>Confirmed</option>
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
