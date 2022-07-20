 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
         <li class="nav-item nav-profile">
             <a href="#" class="nav-link">
                 <div class="nav-profile-image">
                     <img src="assets/images/faces/face1.jpg" alt="profile">
                     <span class="login-status online"></span>
                     <!--change to offline or busy as needed-->
                 </div>
                 <div class="nav-profile-text d-flex flex-column">
                     <span class="font-weight-bold mb-2"><?php echo $globalmembername; ?></span>
                     <span class="text-secondary text-small">Employee</span>
                 </div>
                 <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="dashboard.php">
                 <span class="menu-title">Dashboard</span>
                 <i class="mdi mdi-home menu-icon"></i>
             </a>
         </li>

         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#ui-basic-tanks" aria-expanded="false"
                 aria-controls="ui-basic-tanks">
                 <span class="menu-title">Fuel Tanks</span>
                 <i class="menu-arrow"></i>
                 <i class="mdi mdi-battery"></i>
             </a>
             <div class="collapse" id="ui-basic-tanks">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="add-fueltank.php">Add new
                             Fuel Tank</a></li>
                     <li class="nav-item"> <a class="nav-link" href="manage-employees.php">Manage
                             Employees</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#ui-basic-invent" aria-expanded="false"
                 aria-controls="ui-basic-invent">
                 <span class="menu-title">Stations</span>
                 <i class="menu-arrow"></i>
                 <i class="mdi mdi-format-list-bulleted"></i>
             </a>
             <div class="collapse" id="ui-basic-invent">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="add-station.php">Add new
                             Station</a></li>
                     <li class="nav-item"> <a class="nav-link" href="manage-stations.php">Manage
                             Inventories</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#ui-basic-supplier" aria-expanded="false"
                 aria-controls="ui-basic-supplier">
                 <span class="menu-title">Suppliers</span>
                 <i class="menu-arrow"></i>
                 <i class="mdi mdi-format-list-bulleted"></i>
             </a>
             <div class="collapse" id="ui-basic-supplier">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="add-supplier.php">Add new
                             Supplier</a></li>
                     <li class="nav-item"> <a class="nav-link" href="manage-suppliers.php">Manage
                             Suppliers</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#ui-basic-supplies" aria-expanded="false"
                 aria-controls="ui-basic-supplies">
                 <span class="menu-title">Supplies</span>
                 <i class="menu-arrow"></i>
                 <i class="mdi mdi-format-list-bulleted"></i>
             </a>
             <div class="collapse" id="ui-basic-supplies">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="add-supply.php">Add new
                             Supply</a></li>
                     <li class="nav-item"> <a class="nav-link" href="manage-employees.php">Manage
                             Drivers</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="add-admin.php">
                 <span class="menu-title">Add Admin</span>
                 <i class="mdi mdi-contacts menu-icon"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="manage-admins.php">
                 <span class="menu-title">Manage Admins</span>
                 <i class="mdi mdi-format-list-bulleted menu-icon"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="manage-account.php">
                 <span class="menu-title">Manage Account</span>
                 <i class="mdi mdi-format-list-bulleted menu-icon"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="manage-username.php">
                 <span class="menu-title">Update Username</span>
                 <i class="mdi mdi-format-list-bulleted menu-icon"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="logout.php">
                 <span class="menu-title">Log Out</span>
                 <i class="mdi mdi-format-list-bulleted menu-icon"></i>
             </a>
         </li>


     </ul>
 </nav>
 <!-- partial -->