    <!-- main menu-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- main menu header-->
      <!--div class="main-menu-header">
        <input type="text" placeholder="Search" class="menu-search form-control round"/>
      </div-->
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
           <li class="nav-item">
            <a href="<?php echo base_url(); ?>home/dashboard"  class="<?php echo ($activeTab == "dashboard") ? "active" : ""; ?>">
              <i class="icon-dashboard"></i><span data-i18n="nav.dash.main" class="menu-title">Dashboard</span>
            </a>
            
          </li> 
          <?php if($this->session->userdata('AdminId')==1){ ?>
            
        <li class="nav-item <?php echo ($activeTab == "AddAdmin"|| $activeTab == "Adminlist") ? "open" : ""; ?>">
            <a class="<?php echo ($activeTab == "AddAdmin" || $activeTab == "Adminlist") ? "active" : ""; ?>">
              <i class="icon-user"></i><span data-i18n="nav.dash.main" class="menu-title">Admin</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>Admin/AddAdmin" data-i18n="nav.dash.main" class="menu-item  <?php echo ($activeTab == "AddAdmin") ? "active" : ""; ?>" ><i class="icon-plus"></i> Add Admin</a>
              </li>
              <li>
              <li>
                <a href="<?php echo base_url(); ?>Admin/Adminlist" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "Adminlist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Admin</a>
              </li>
            </ul>
          </li> 
          <?php } ?>  


          <li class="nav-item <?php echo($activeTab == "aboutusadd"||$activeTab =="aboutuslist") ? "open" : ""; ?>">
            <a class="<?php echo ($activeTab == "aboutusadd" || $activeTab == "aboutuslist") ? "active" : ""; ?>">
              <i class="icon-tasks"></i><span data-i18n="nav.dash.main" class="menu-title">About Us</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>About/Aboutadd" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "aboutusadd") ? "active" : ""; ?>"><i class="icon-plus"></i> Add About</a>
              </li>
              <li>
              <li>
                <a href="<?php echo base_url(); ?>About/Aboutlist" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "aboutuslist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of About </a>
              </li>
            </ul>
          </li> 

          <li class="nav-item <?php echo($activeTab == "contactadd"||$activeTab =="contactlist") ? "open" : ""; ?>">
            <a class="<?php echo ($activeTab == "contactadd" || $activeTab == "contactlist") ? "active" : ""; ?>">
              <i class="icon-tasks"></i><span data-i18n="nav.dash.main" class="menu-title">Contact Us</span>
            </a>
            <ul class="menu-content">
              <!-- <li>
                <a href="<?php// echo base_url(); ?>About/Aboutadd" data-i18n="nav.dash.main" class="menu-item <?php //echo ($activeTab == "aboutusadd") ? "active" : ""; ?>"><i class="icon-plus"></i> Add About</a>
              </li> -->
              <li>
                <a href="<?php echo base_url(); ?>Contact/Contactlist" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "acontactlist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Contact </a>
              </li>
            </ul>
          </li> 

          <li class="nav-item <?php echo($activeTab == "testimonialadd"||$activeTab =="testimoniallist") ? "open" : ""; ?>">
            <a class="<?php echo ($activeTab == "testimonialadd" || $activeTab == "testimoniallist") ? "active" : ""; ?>">
              <i class="icon-tasks"></i><span data-i18n="nav.dash.main" class="menu-title">Testimonial</span>
            </a>
            <ul class="menu-content">
              <li>
                  <a href="<?php echo base_url(); ?>Testimonial/Testimonialadd" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "testimonialadd") ? "active" : ""; ?>"><i class="icon-plus"></i> Add Testimonial</a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>Testimonial/Testimoniallist" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "testimoniallist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Testimonial </a>
              </li>
            </ul>
          </li> 

          <li class="nav-item <?php echo $activeTab =="sitesettinglist" ? "open" : ""; ?>">
            <a class="<?php echo  $activeTab == "sitesettinglist" ? "active" : ""; ?>">
              <i class="icon-tasks"></i><span data-i18n="nav.dash.main" class="menu-title">Site Setting</span>
            </a>
            <ul class="menu-content">
             
              <li>
                <a href="<?php echo base_url(); ?>Home/Sitesetting" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "sitesettinglist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Sitesetting </a>
              </li>
            </ul>
          </li> 
         
         
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->