        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Fitur Fullscreen -->
                        <button class="btn ml-2" id="fullscreen-btn">
                            <i class="fas fa-expand"></i>
                        </button>

                        <script>
                            $(document).ready(function() {
                                var fullscreenBtn = $('#fullscreen-btn');
                                var isFullscreen = false;

                                fullscreenBtn.click(function() {
                                    if (!isFullscreen) {
                                        if (document.fullscreenEnabled) {
                                            document.documentElement.requestFullscreen();
                                            fullscreenBtn.html('<i class="fas fa-compress"></i>');
                                            isFullscreen = true;
                                        }
                                    } else {
                                        if (document.exitFullscreen) {
                                            document.exitFullscreen();
                                            fullscreenBtn.html('<i class="fas fa-expand"></i>');
                                            isFullscreen = false;
                                        }
                                    }
                                });

                                // Exit fullscreen on ESC key press
                                document.addEventListener('fullscreenchange', function() {
                                    if (!document.fullscreenElement) {
                                        fullscreenBtn.html('<i class="fas fa-expand"></i>');
                                        isFullscreen = false;
                                    } else {
                                        fullscreenBtn.html('<i class="fas fa-compress"></i>');
                                        isFullscreen = true;
                                    }
                                });

                                // Set initial fullscreen state on page load
                                if (document.fullscreenElement) {
                                    fullscreenBtn.html('<i class="fas fa-compress"></i>');
                                    isFullscreen = true;
                                }
                            });
                        </script>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="position-relative">
                                    <img class="img-profile rounded-circle ml-2" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                                    <div class="badge-circle" title="online"></div>
                                </div>
                                <span class="ml-3 d-none d-lg-inline text-dark small">Hi, <?= $user['name']; ?></span>
                                <span class="icon mr-3 ml-2">
                                    <i class="fas fa-<?= ($user['role_id'] == 1) ? 'crown text-warning'  : 'check-circle text-info'; ?>"></i>
                                </span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('user'); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    My Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?> " data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->