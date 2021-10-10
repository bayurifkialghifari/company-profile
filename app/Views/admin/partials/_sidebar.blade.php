@php
    
    use App\Core\Request;

    $navigation = (isset($navigation)) ? $navigation : [];
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
                <li class="{{ $navigation[0] == 'Dashboard' ? 'active' : '' }}">
                    <a href="{{ base_url }}admin/dashboard">
                        <i class="menu-icon ti-layout-list-large-image"></i>
                        <span class="mm-text">Dashboard</span>
                    </a>
                </li>
                <li class="{{ $navigation[0] == 'Banner' ? 'active' : '' }}">
                    <a href="{{ base_url }}admin/banner">
                        <i class="menu-icon ti-layout-list-large-image"></i>
                        <span class="mm-text">Banner</span>
                    </a>
                </li>
                <li class="{{ $navigation[0] == 'Testimonial' ? 'active' : '' }}">
                    <a href="{{ base_url }}admin/testimonial">
                        <i class="menu-icon ti-layout-list-large-image"></i>
                        <span class="mm-text">Testimonial</span>
                    </a>
                </li>
                <li class="{{ $navigation[0] == 'Portofolio' ? 'active' : '' }}">
                    <a href="{{ base_url }}admin/portofolio">
                        <i class="menu-icon ti-layout-list-large-image"></i>
                        <span class="mm-text">Portofolio</span>
                    </a>
                </li>
                <li class="menu-dropdown {{ $navigation[0] == 'Pengaturan' ? 'active' : '' }}">
                    <a href="javascript:void(0)">
                        <i class="menu-icon ti-settings"></i>
                        <span>Pengaturan</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
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