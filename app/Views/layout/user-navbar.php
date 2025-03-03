<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>

<div id="main-wrapper">
    <!--**********************************
            Nav header start
        ***********************************-->
    <div class="nav-header nav-custome" style="background-color: #C4C4C4;">
        <a href="/user/home" class="brand-logo">
            <img class="logo-abbr" style="width: 100%;" src="https://gunadarma.ac.id/assets/images/logosmall.png" alt="">
            <img class="brand-title" src="<?= base_url('asset/img/Logo-web.png'); ?>" alt="">
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
            Nav header end
        ***********************************-->

    <!--**********************************
            Header startF
        ***********************************-->
    <div class="header" style="background-color: #C4C4C4; height: 90px;">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">                       
                    </div>
                    <ul  class="navbar-nav header-right col-lg-6 d-flex justify-content-end">                     
                        <li class="nav-item">
                            <div class="nav-name-account" >
                                <h4 style="padding: 0;margin:0;"><?= session()->get('nama_user'); ?></h4>
                                <h5 style="padding: 0;margin:0;text-align: right; color:white ">Penerima Beasiswa</h5>             
                            </div>
                        </li>
                        
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                <?php if (session()->get('pp') == null) : ?>
                                <img id="profile-img-nav" src="<?= base_url('asset/img/person-icon.png'); ?>" style="height: 50px; width: 50px;" alt="" />
                                <?php elseif (session()->get('pp') !== null) : ?>
                                <img id="profile-img-nav" src="<?= base_url('asset/img/database/picture/' . session()->get('pp')); ?>" style="height: 50px; width: 50px;" alt="" />
                                <?php endif; ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="/user/profile" class="dropdown-item ai-icon">
                                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span class="ml-2">Profile </span>
                                </a>
                                <!-- <a href="email-inbox.html" class="dropdown-item ai-icon">
                                    <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                        </path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                    <span class="ml-2">Inbox </span>
                                </a> -->
                                <a href="/user/logout" class="dropdown-item ai-icon">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    <span class="ml-2">Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--**********************************
            Header end ti-comment-alt
        ***********************************-->