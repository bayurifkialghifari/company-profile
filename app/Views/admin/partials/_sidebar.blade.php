@php
    
    use App\Core\Request;

@endphp
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar-->
    <section class="sidebar">
        <div id="menu" role="navigation">
            <div class="nav_profile">
                <div class="media profile-left">
                    <a class="pull-left profile-thumb" href="#">
                        <img src="{{ base_url }}assets/admin/img/authors/avatar1.jpg" class="img-circle" alt="User Image">
                    </a>
                    <div class="content-profile">
                        <h4 class="media-heading" style="margin-top: 20px">
                            {{ Request::sess('nama') }}
                        </h4>
                    </div>
                </div>
            </div>
            <ul class="navigation">
                <li>
                    <a href="{{ base_url }}admin/dashboard">
                        <i class="menu-icon ti-layout-list-large-image"></i>
                        <span class="mm-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ base_url }}admin/website">
                        <i class="menu-icon ti-tag"></i>
                        <span>Website</span>
                        <span class="fa tag"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ base_url }}admin/pages">
                        <i class="menu-icon ti-link"></i>
                        <span>Halaman</span>
                        <span class="fa tag"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ base_url }}admin/metas">
                        <i class="menu-icon ti-book"></i>
                        <span>Meta</span>
                        <span class="fa tag"></span>
                    </a>
                </li>
            </ul>
            <!-- / .navigation -->
        </div>
        <!-- menu -->
    </section>
    <!-- /.sidebar -->
</aside>
{{-- <li class="menu-dropdown"> --}}
{{-- <ul class="sub-menu">
    <li>
        <a href="{{ base_url }}assets/admin/javascript:void(0)">
            <i class="fa fa-fw ti-receipt"></i> Features
            <span class="fa arrow"></span>
        </a>
    </li>
</ul> --}}