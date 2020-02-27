
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
      <img src="<?=base_url()?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="<?=base_url()?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="#" class="d-block">ADMINISTRATOR</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="<?=site_url('Randomphone')?>" class="nav-link">
            <i class="fa fa-phone" aria-hidden="true"></i>
              <p>Random</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('Page')?>" class="nav-link active">
            <i class="fa fa-phone-square" aria-hidden="true"></i>
              <p>Phone Number</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <script>
    $(document).ready(function(){
      $('a.nav.link').on('click', function(e) {
        e.preventDefault();
        var selector = $(this).parent().find('a.nav-link.active').removeClass('active');;
        var url = window.location.href;
        var target = url.split('/');
        $(selector).each(function(){
            if($(this).find('a').attr('href')===('/'+target[target.length-1])){
              $(selector).removeClass('active');
              $(this).removeClass('active').addClass('active');
            }
        });

      });
    });
  </script>