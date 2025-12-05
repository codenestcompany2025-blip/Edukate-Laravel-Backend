 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
             aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-chalkboard-teacher"></i>
             <span>Instructors</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ route('admin.instructors.index') }}">All Instructors</a>
                 <a class="collapse-item" href="{{ route('admin.instructors.create') }}">Add Instructors</a>
             </div>
         </div>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
             aria-expanded="true" aria-controls="collapseUtilities">
             <i class="fas fa-folder-open"></i>
             <span>Categories</span>
         </a>
         <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ route('admin.categories.index') }}">All Categories</a>
                 <a class="collapse-item" href="{{ route('admin.categories.create') }}">Add Categories</a>
             </div>
         </div>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
             aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-graduation-cap"></i>
             <span>Courses</span>
         </a>
         <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ route('admin.courses.index') }}">All Courses</a>
                 <a class="collapse-item" href="{{ route('admin.courses.create') }}">Add Courses</a>
             </div>
         </div>
     </li>


     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage"
             aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-user-graduate"></i>
             <span>Students</span>
         </a>
         <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ route('admin.students.index') }}">All Students</a>
                 <a class="collapse-item" href="{{ route('admin.students.create') }}">Add Students</a>
             </div>
         </div>
     </li>

      <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudentCourse"
             aria-expanded="true" aria-controls="collapseStudentCourse">
             <i class="fas fa-graduation-cap"></i>
             <span>Student Courses</span>
         </a>
         <div id="collapseStudentCourse" class="collapse" aria-labelledby="headingStudentCourse" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ route('admin.student_courses.index') }}">All Students - Courses</a>
                 <a class="collapse-item" href="{{ route('admin.student_courses.create') }}">Add Student - Course</a>
             </div>
         </div>
     </li>

       <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTestimonials"
             aria-expanded="true" aria-controls="collapseTestimonials">
             <i class="fas fa-comment"></i>
             <span>Testimonial</span>
         </a>
         <div id="collapseTestimonials" class="collapse" aria-labelledby="headingTestimonials" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ route('admin.testimonials.index') }}">All Testimonials</a>
                 <a class="collapse-item" href="{{ route('admin.testimonials.create') }}">Add Testimonial</a>
             </div>
         </div>
     </li>
 </ul>
 <!-- End of Sidebar -->
