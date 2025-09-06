<?php
function adminLayout($children) {
    $currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">


<style>
    
/* Scrollbar hidden for sidebar */
.sidebar::-webkit-scrollbar { display: none; }

/* Dropdown hidden by default */
.has-dropdown > .dropdown { display: none; }
.has-dropdown.active > .dropdown { display: flex; flex-direction: column; }

/* Smooth transitions */
.sidebar, .main-content { transition: all 0.3s ease; }

/* Hide scrollbar for all browsers */
.nav-list::-webkit-scrollbar {
  display: none; /* Chrome, Safari, Opera */
}
.nav-list {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;     /* Firefox */
}

</style>
</head>
<body class="flex h-screen bg-gray-100">

<div id="sidebar" class="sidebar fixed top-0 left-0 h-full bg-gradient-to-tr from-blue-500 to-cyan-400 w-64 md:w-72 transform -translate-x-full md:translate-x-0 transition-transform border-r border-gray-200 flex flex-col z-50 ">
  <div class="flex items-center justify-between p-4 border-b border-gray-200">
    <div class="flex items-center gap-2 justify-center">
    <!-- Logo image -->
    <img src="../images/logo.svg" alt="Hospital Logo" class="h-10 w-10 object-contain">
    <!-- Text -->
    <span class="font-bold text-xl hidden md:inline text-white">MediPortal</span>
   </div>


    <button id="sidebarClose" class="md:hidden text-white"><i class='bx bx-x text-3xl'></i></button>
  </div>

  <ul class="nav-list flex-1 mt-4 px-2 overflow-y-auto" style="max-height: 80vh;">
    <?php 
$modules = [
    [
        'title' => 'Dashboard',
        'icon'  => 'bx bx-home',
        'link'  => 'dashboard.php',
        'subs'  => []
    ],
    [
        'title' => 'Patient Registration',
        'icon'  => 'bx bx-user-plus',
        'subs'  => [
            ['title' => 'New Patient Intake', 'link' => 'patient_registration.php'],
            ['title' => 'Patient Records', 'link' => 'patient_records.php'],
            ['title' => 'ID & Verification', 'link' => 'patient_verification.php'],
            ['title' => 'Insurance Information', 'link' => 'patient_insurance.php'],
        ]
    ],
    [
        'title' => 'Appointments & Scheduling',
        'icon'  => 'bx bx-calendar',
        'subs'  => [
            ['title' => 'Book Appointment', 'link' => 'appointments.php'],
            ['title' => 'Doctor Schedules', 'link' => 'doctor_schedules.php'],
            ['title' => 'Reschedule / Cancel', 'link' => 'appointment_management.php'],
            ['title' => 'Queue Management', 'link' => 'queue_management.php'],
        ]
    ],
    [
        'title' => 'Telehealth & Outpatient Care',
        'icon'  => 'bx bx-video',
        'subs'  => [
            ['title' => 'Virtual Consultations', 'link' => 'telehealth.php'],
            ['title' => 'Outpatient Records', 'link' => 'outpatient_records.php'],
            ['title' => 'Prescription Management', 'link' => 'prescriptions.php'],
            ['title' => 'Follow-Up Tracking', 'link' => 'followups.php'],
        ]
    ],
    [
        'title' => 'Inpatient & Bed Management',
        'icon'  => 'bx bx-bed',
        'subs'  => [
            ['title' => 'Admission Requests', 'link' => 'admissions.php'],
            ['title' => 'Bed Allocation', 'link' => 'bed_management.php'],
            ['title' => 'Ward Roster', 'link' => 'ward_roster.php'],
            ['title' => 'Discharge Planning', 'link' => 'discharge.php'],
        ]
    ],
    [
        'title' => 'Emergency & Triage',
        'icon'  => 'bx bx-plus-medical',
        'subs'  => [
            ['title' => 'ER Triage', 'link' => 'triage.php'],
            ['title' => 'Critical Cases', 'link' => 'critical_cases.php'],
            ['title' => 'Emergency Queue', 'link' => 'emergency_queue.php'],
            ['title' => 'Ambulance Dispatch', 'link' => 'ambulance.php'],
        ]
    ],
    [
        'title' => 'Analytics & Reports',
        'icon'  => 'bx bx-bar-chart-alt-2',
        'subs'  => [
            ['title' => 'Patient Statistics', 'link' => 'patient_stats.php'],
            ['title' => 'Service Utilization', 'link' => 'service_reports.php'],
            ['title' => 'Operational Metrics', 'link' => 'operations_metrics.php'],
        ]
    ]
];





    foreach($modules as $mod):
      // Check if 'link' key exists to avoid the "Undefined array key" warning
      $isCurrentPage = isset($mod['link']) && ($currentPage == $mod['link']);
      $hasActiveSub = false;
      if (!empty($mod['subs'])) {
          foreach ($mod['subs'] as $sub) {
              if ($currentPage == $sub['link']) {
                  $hasActiveSub = true;
                  break;
              }
          }
      }
    ?>
      <?php if(empty($mod['subs'])): ?>
        <li>
         <a href="<?= $mod['link'] ?>" 
          class="flex items-center gap-4 p-3 rounded-lg text-white/90 hover:text-white hover:bg-white/10 transition-colors duration-200 <?= $isCurrentPage ? 'bg-white/20 text-white mb-2' : '' ?>">
            <i class='bx <?= $mod['icon'] ?> text-2xl'></i>
            <span class="links_name md:inline text-[16px]"><?= $mod['title'] ?></span>
        </a>

        </li>
      <?php else: ?>
        <li class="has-dropdown <?= $hasActiveSub ? 'active' : '' ?>">
          <button class="flex items-center gap-4 w-full p-3 rounded-lg text-lg font-medium text-white/90 hover:text-white hover:bg-white/10<?= $hasActiveSub ? 'bg-white/20 text-white mb-2' : '' ?>">
            <i class='bx <?= $mod['icon'] ?> text-2xl text-white'></i>
            <span class="links_name md:inline text-[16px]"><?= $mod['title'] ?></span>
            <i class='bx bx-chevron-down ml-auto text-xl transition-transform transform <?= $hasActiveSub ? 'rotate-180' : '' ?>'></i>
          </button>
          <div class="dropdown flex-col pl-12 space-y-2 mt-2">
            <?php foreach($mod['subs'] as $sub): ?>
              <a href="<?= $sub['link'] ?>" class="flex items-center gap-3 p-2 rounded-lg text-white/90 hover:text-white <?php if($currentPage==$sub['link']) echo 'bg-white/20 text-white'; ?>">
                <i class='bx bx-right-arrow-alt text-[12px]'></i><?= $sub['title'] ?>
              </a>
            <?php endforeach; ?>
          </div>
        </li>
      <?php endif; ?>
    <?php endforeach; ?>
  </ul>

  
</div>

<div id="mainContent" class="main-content flex-1 w-full ml-0 md:ml-72 p-4 transition-all">

  <!-- Header Section -->
  <header class="bg-white shadow rounded sticky top-0 z-30 w-full">
    <div class="flex justify-between items-center p-4 mb-4 w-full">

      <!-- Left: Sidebar Toggle -->
      <div class="flex items-center gap-3">
        <button id="sidebarOpen" class="md:hidden text-gray-600">
          <i class='bx bx-menu text-3xl'></i>
        </button>

        <!-- Search Bar -->
        <div class="flex-1 min-w-0">
          <div class="relative w-full">
            <input type="text" placeholder="Search..." 
                   class="w-full pl-3 pr-10 py-2 border rounded focus:ring-2 focus:ring-indigo-500">
            <i class='bx bx-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400'></i>
          </div>
        </div>
      </div>

      <!-- Right: Notifications + Profile -->
      <div class="flex items-center gap-3 md:gap-6">

        <!-- Notifications -->
        <div class="relative">
          <button id="notifBtn" class="relative text-gray-600 text-2xl">
            <i class='bx bx-bell'></i>
            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs px-1 rounded-full">3</span>
          </button>

          <div id="notifModal" class="hidden absolute right-0 mt-2 w-64 bg-white shadow rounded border border-gray-200 z-50">
            <div class="p-3 border-b font-semibold">Notifications</div>
            <ul>
              <li class="px-3 py-2 hover:bg-gray-100 cursor-pointer">New applicant submitted resume</li>
              <li class="px-3 py-2 hover:bg-gray-100 cursor-pointer">Interview scheduled today</li>
              <li class="px-3 py-2 hover:bg-gray-100 cursor-pointer">System update available</li>
            </ul>
            <div class="text-center p-2 border-t text-sm text-gray-500 cursor-pointer hover:bg-gray-100">View All</div>
          </div>
        </div>

        <!-- Profile Icon with Initials -->
        <div class="relative">
          <button id="profileBtn" class="flex items-center focus:outline-none">
            <div class="w-10 h-10 rounded-full bg-slate-700 flex items-center justify-center text-white font-bold text-lg">
              LS
            </div>
          </button>

          <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white shadow rounded border border-gray-200 z-50">
           <ul>
            <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
              <a href="profile.php" class="block w-full">My Profile</a>
            </li>
          
           <li 
              class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-red-600"
              onclick="window.location.href='http://localhost/core2-hospital/'">
              Logout
            </li>

          </ul>

          </div>
        </div>

      </div>
    </div>
  </header>

  <!-- Main Content Body -->
  <div class="w-full overflow-y-auto">
    <?php echo $children; ?>
  </div>

</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.js"></script>
<script>
// Sidebar open/close
const sidebar = document.getElementById('sidebar');
const mainContent = document.getElementById('mainContent');
const sidebarOpenBtn = document.getElementById('sidebarOpen');
const sidebarCloseBtn = document.getElementById('sidebarClose');

sidebarOpenBtn?.addEventListener('click', () => {
    sidebar.classList.remove('-translate-x-full');
    const overlay = document.createElement('div');
    overlay.id = 'sidebar-overlay';
    overlay.className = 'fixed inset-0 bg-black opacity-50 z-40 md:hidden';
    document.body.appendChild(overlay);

    overlay.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        overlay.remove();
    });
});

sidebarCloseBtn?.addEventListener('click', () => {
    sidebar.classList.add('-translate-x-full');
    document.getElementById('sidebar-overlay')?.remove();
});

// Dropdowns
document.querySelectorAll('.has-dropdown > button').forEach(btn => {
    btn.addEventListener('click', () => {
        const parentLi = btn.parentElement;
        const dropdown = parentLi.querySelector('.dropdown');
        const icon = btn.querySelector('.bx-chevron-down');

        const isOpen = parentLi.classList.contains('active');

        document.querySelectorAll('.has-dropdown.active').forEach(openDropdown => {
            if (openDropdown !== parentLi) {
                openDropdown.classList.remove('active');
                openDropdown.querySelector('.bx-chevron-down').classList.remove('rotate-180');
            }
        });

        if (isOpen) {
            parentLi.classList.remove('active');
            icon.classList.remove('rotate-180');
        } else {
            parentLi.classList.add('active');
            icon.classList.add('rotate-180');
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
  const notifBtn = document.getElementById("notifBtn");
  const notifModal = document.getElementById("notifModal");
  const profileBtn = document.getElementById("profileBtn");
  const profileDropdown = document.getElementById("profileDropdown");

  // Toggle Notifications
  notifBtn.addEventListener("click", function (e) {
    e.stopPropagation();
    notifModal.classList.toggle("hidden");
    profileDropdown.classList.add("hidden"); // Hide profile dropdown when notif opens
  });

  // Toggle Profile Dropdown
  profileBtn.addEventListener("click", function (e) {
    e.stopPropagation();
    profileDropdown.classList.toggle("hidden");
    notifModal.classList.add("hidden"); // Hide notif when profile opens
  });

  // Close dropdowns when clicking outside
  document.addEventListener("click", function () {
    notifModal.classList.add("hidden");
    profileDropdown.classList.add("hidden");
  });
});


// Logout
async function logoutUser() {
    try {
        const res = await fetch('http://localhost/hr1-ecommerce/api/logout.php', { method: 'POST' });
        const data = await res.json();
        Toastify({ text: data.message || 'Logged out', duration: 3000 }).showToast();
        if (data.status === 'success') {
            setTimeout(() => window.location.href = 'http://localhost/hr1-ecommerce/login.php', 1000);
        }
    } catch (e) {
        console.error(e);
    }
}
document.getElementById('log_out')?.addEventListener('click', logoutUser);
</script>

</body>
</html>
<?php
}
?>