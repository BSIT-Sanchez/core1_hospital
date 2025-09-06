<?php
include '../layout/adminLayout.php';

// Sample ward roster data (replace with DB queries)
$roster = [
  ['ward' => 'General Ward', 'staff' => 'Dr. John Doe', 'role' => 'Physician', 'shift' => 'Day'],
  ['ward' => 'General Ward', 'staff' => 'Nurse Jane Smith', 'role' => 'Nurse', 'shift' => 'Night'],
  ['ward' => 'ICU', 'staff' => 'Dr. Alice Brown', 'role' => 'Intensivist', 'shift' => 'Day'],
  ['ward' => 'ICU', 'staff' => 'Nurse Michael Johnson', 'role' => 'Nurse', 'shift' => 'Night'],
  ['ward' => 'Private Room', 'staff' => 'Dr. Emily Davis', 'role' => 'Attending Physician', 'shift' => 'Day'],
];

// Summary stats
$totalStaff = count($roster);
$dayShift = count(array_filter($roster, fn($r) => $r['shift'] === 'Day'));
$nightShift = $totalStaff - $dayShift;

$wardRosterContent = '
<div class="p-6 max-w-7xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Ward Roster</span>
  </nav>

  <!-- Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Ward Roster</h1>
    <button onclick="openModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
      <i class="bx bx-plus mr-1"></i> Assign Staff
    </button>
  </div>

  <!-- Roster Summary -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white shadow rounded-xl p-6 text-center">
      <h2 class="text-3xl font-bold text-gray-800">'.$totalStaff.'</h2>
      <p class="text-gray-600">Total Staff Assigned</p>
    </div>
    <div class="bg-blue-100 shadow rounded-xl p-6 text-center">
      <h2 class="text-3xl font-bold text-blue-700">'.$dayShift.'</h2>
      <p class="text-gray-600">Day Shift</p>
    </div>
    <div class="bg-purple-100 shadow rounded-xl p-6 text-center">
      <h2 class="text-3xl font-bold text-purple-700">'.$nightShift.'</h2>
      <p class="text-gray-600">Night Shift</p>
    </div>
  </div>

  <!-- Roster Table -->
  <div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="w-full text-sm text-left text-gray-600">
      <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
        <tr>
          <th class="px-6 py-3">Ward</th>
          <th class="px-6 py-3">Staff</th>
          <th class="px-6 py-3">Role</th>
          <th class="px-6 py-3">Shift</th>
          <th class="px-6 py-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
';

foreach ($roster as $entry) {
  $shiftColor = $entry['shift'] === 'Day' ? 'text-blue-600' : 'text-purple-600';

  $wardRosterContent .= '
    <tr class="border-b hover:bg-gray-50">
      <td class="px-6 py-4">'.$entry['ward'].'</td>
      <td class="px-6 py-4 font-medium text-gray-900">'.$entry['staff'].'</td>
      <td class="px-6 py-4">'.$entry['role'].'</td>
      <td class="px-6 py-4 '.$shiftColor.' font-semibold">'.$entry['shift'].'</td>
      <td class="px-6 py-4 text-center space-x-2">
        <button class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded"><i class="bx bx-edit"></i></button>
        <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded"><i class="bx bx-trash"></i></button>
      </td>
    </tr>
  ';
}

$wardRosterContent .= '
      </tbody>
    </table>
  </div>
</div>

<!-- Assign Staff Modal -->
<div id="rosterModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Assign Staff to Ward</h2>
    <form class="space-y-4">
      <div>
        <label class="block text-gray-700">Ward</label>
        <select class="w-full px-3 py-2 border rounded-lg" required>
          <option>General Ward</option>
          <option>ICU</option>
          <option>Private Room</option>
        </select>
      </div>
      <div>
        <label class="block text-gray-700">Staff Name</label>
        <input type="text" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter staff name" required>
      </div>
      <div>
        <label class="block text-gray-700">Role</label>
        <input type="text" class="w-full px-3 py-2 border rounded-lg" placeholder="e.g., Nurse, Physician" required>
      </div>
      <div>
        <label class="block text-gray-700">Shift</label>
        <select class="w-full px-3 py-2 border rounded-lg" required>
          <option>Day</option>
          <option>Night</option>
        </select>
      </div>
      <div class="flex justify-end space-x-2 pt-4">
        <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Save</button>
      </div>
    </form>
  </div>
</div>

<script>
  function openModal() {
    document.getElementById("rosterModal").classList.remove("hidden");
  }
  function closeModal() {
    document.getElementById("rosterModal").classList.add("hidden");
  }
</script>
';

adminLayout($wardRosterContent);
?>
