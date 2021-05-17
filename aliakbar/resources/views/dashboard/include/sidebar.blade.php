<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
      <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">		
        <li class="@if($category_name == "Dashboard") active @endif">
          <a href="{{ url('/dashboard') }}">
            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
			    <span>Dashboard</span>
          </a>
        </li>
        <?php 
        if(Auth::user()->level_user_id == 1 ){
        ?>
        <li class="header">Pengaturan Aplikasi</li>
            <li class="treeview">
              <a href="#">
                <i class="icon-Chat-check"><span class="path1"></span><span class="path2"></span></i>
                <span>Settings</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">

                <li class="@if($category_name == "Pengaturan") active @endif">
                  <a href="{{ url('/dashboard/pengaturan') }}">
                      <i class="fa fa-cog" aria-hidden="true"></i>
                      <span>Pengaturan</span>
                  </a>
                </li>

                <li class="@if($category_name == "Level User") active @endif">
                  <a href="{{ url('/dashboard/level-user') }}">
                      <i class="fa fa-user-plus" aria-hidden="true"></i>
                      <span>Level User</span>
                  </a>
                </li>
        
                <li class="@if($category_name == "User") active @endif">
                  <a href="{{ url('/dashboard/user') }}">
                      <i class="fa fa-users" aria-hidden="true"></i>
                      <span>User</span>
                  </a>
                </li>


              </ul>
            </li>
            <?php } ?>
            <?php 
            if(Auth::user()->level_user_id == 1 ){
            ?>

            <li class="header">Data Dinas</li>
            <li class="treeview">
              <a href="#">
                <i class="icon-Layout-grid"><span class="path1"></span><span class="path2"></span></i>
                <span>Data Master</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">

              <li class="@if($category_name == "Slider") active @endif">
                <a href="{{ url('/dashboard/slider') }}">
                    <i class="fa fa-file-image-o" aria-hidden="true"></i>
                    <span>Gambar Slider</span>
                </a>
              </li>

              <li class="@if($category_name == "Faq") active @endif">
                <a href="{{ url('/dashboard/faq') }}">
                    <i class="fa fa-file-image-o" aria-hidden="true"></i>
                    <span>FAQ's</span>
                </a>
              </li>

              </ul>
            </li>
            <?php } ?>

        <?php 
        if(Auth::user()->level_user_id == 2 || Auth::user()->level_user_id == 1 ){
        ?>

        <li class="header">Pengaduan Diterima</li>
        
        <li class="@if($category_name == "Pengaduan Diterima") active @endif">
              <a href="{{ url('/dashboard/pengaduan-diterima') }}">
                  <i class="fa fa-list" aria-hidden="true"></i>
                  <span>Daftar Pengaduan Diterima</span>
                  {{-- <span class="badge badge-success">{{ $usulanbaruadmin }}</span> --}}
              </a>
        </li>
        
        <?php }

        if(Auth::user()->level_user_id == 3){
        ?>
        <li class="header">Pengaduan</li>
        
        <li class="@if($category_name == "Pengaduan") active @endif">
              <a href="{{ url('/dashboard/pengaduan') }}">
                  <i class="fa fa-list" aria-hidden="true"></i>
                  <span>Daftar Pengaduan</span>
                  {{-- <span class="badge badge-success">{{ $usulanbaru }}</span> --}}
              </a>
        </li>

        <?php
        }
        ?>
      </ul>
    </section>
  </aside>