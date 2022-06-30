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
                     <span class="font-weight-bold mb-2">David Grey. gH</span>
                     <span class="text-secondary text-small">Project Manager</span>
                 </div>
                 <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="index.html">
                 <span class="menu-title">Dashboard</span>
                 <i class="mdi mdi-home menu-icon"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                 <span class="menu-title">Employees</span>
                 <i class="menu-arrow"></i>
                 <i class="mdi mdi-crosshairs-gps menu-icon"></i>
             </a>
             <div class="collapse" id="ui-basic">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="add-employee.php">Add new
                             Employee</a></li>
                     <li class="nav-item"> <a class="nav-link" href="manage-employees.php">Manage
                             Employees</a>
                     </li>
                 </ul>
             </div>
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
                 <span class="menu-title">Inventory</span>
                 <i class="menu-arrow"></i>
                 <i class="mdi mdi-format-list-bulleted"></i>
             </a>
             <div class="collapse" id="ui-basic-invent">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="add-inventory.php">Add new
                             Inventory</a></li>
                     <li class="nav-item"> <a class="nav-link" href="manage-employees.php">Manage
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
             <a class="nav-link" href="pages/icons/mdi.html">
                 <span class="menu-title">Icons</span>
                 <i class="mdi mdi-contacts menu-icon"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="pages/forms/basic_elements.html">
                 <span class="menu-title">Forms</span>
                 <i class="mdi mdi-format-list-bulleted menu-icon"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="pages/charts/chartjs.html">
                 <span class="menu-title">Charts</span>
                 <i class="mdi mdi-chart-bar menu-icon"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="pages/tables/basic-table.html">
                 <span class="menu-title">Tables</span>
                 <i class="mdi mdi-table-large menu-icon"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false"
                 aria-controls="general-pages">
                 <span class="menu-title">Sample Pages</span>
                 <i class="menu-arrow"></i>
                 <i class="mdi mdi-medical-bag menu-icon"></i>
             </a>
             <div class="collapse" id="general-pages">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank
                             Page </a></li>
                     <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a>
                     </li>
                     <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register
                         </a></li>
                     <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                     </li>
                     <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item sidebar-actions">
             <span class="nav-link">
                 <div class="border-bottom">
                     <h6 class="font-weight-normal mb-3">Projects</h6>
                 </div>
                 <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
                 <div class="mt-4">
                     <div class="border-bottom">
                         <p class="text-secondary">Categories</p>
                     </div>
                     <ul class="gradient-bullet-list mt-4">
                         <li>Free</li>
                         <li>Pro</li>
                     </ul>
                 </div>
             </span>
         </li>
     </ul>
 </nav>
 <!-- partial -->