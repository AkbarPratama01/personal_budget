 <!-- Sidebar -->
 <nav class="navbar-vertical navbar">
   <div class="nav-scroller">
     <!-- Brand logo -->
     <a class="navbar-brand" href="index.php">
       <img src="../../public/images/brand/logo/logo.svg" alt="" />
     </a>
     <!-- Navbar nav -->
     <ul class="navbar-nav flex-column" id="sideNavbar">
       <li class="nav-item">
         <a class="nav-link has-arrow active" href="index.php">
           <i data-feather="home" class="nav-icon icon-xs me-2"></i> Dashboard
         </a>

       </li>


       <!-- Nav item -->
       <li class="nav-item">
         <a class="nav-link has-arrow collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#navPages"
           aria-expanded="false" aria-controls="navPages">
           <i data-feather="layers" class="nav-icon icon-xs me-2">
           </i> Menu
         </a>

         <div id="navPages" class="collapse show" data-bs-parent="#sideNavbar">
           <ul class="nav flex-column">
             <li class="nav-item">
               <a class="nav-link" href="wallet.php">
                 Dompet
               </a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="wishlist.php">
                 Wishlist
               </a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="incomes.php">
                 Pemasukkan
               </a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="expenses.php">
                 Pengeluaran
               </a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="report.php">
                 Laporan
               </a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="profile.php">
                 Profile
               </a>
             </li>
           </ul>
         </div>

       </li>
     </ul>

   </div>
 </nav>