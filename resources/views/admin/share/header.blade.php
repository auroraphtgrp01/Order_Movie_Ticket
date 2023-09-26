<header>
    <div class="topbar d-flex align-items-center" id="header">
        <nav class="navbar navbar-expand">
            <div class="topbar-logo-header">
                <div class>
                    <img src="/assets_admin/images/logo-icon.png"
                        style="width: 150px;" class="logo-icon" alt="logo icon">
                </div>
            </div>
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
            <div class="search-bar flex-grow-1">
                <div class="position-relative search-bar-box">
                    <input type="text" class="form-control search-control"
                        placeholder="Type to search..."> <span
                        class="position-absolute top-50 search-show translate-middle-y"><i
                            class='bx bx-search'></i></span>
                    <span
                        class="position-absolute top-50 search-close translate-middle-y"><i
                            class='bx bx-x'></i></span>
                </div>
            </div>

            <div class="user-box dropdown me-4"
                style="border-right: 1px solid #f0f0f0;">
                <a
                    class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret"
                    href="#"
                    role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img src="/assets_admin/images/avatars/avatar-2.png"
                        class="user-img" alt="user avatar">
                    <div class="user-info ps-3 me-3">
                        @php
                        $user = Auth::guard('admin')->user();
                        $username = $user->username;
                        @endphp
                        <p class="user-name mb-0">{{ $username }}</p>
                        <p class="designattion mb-0">Administration</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                </ul>
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon">
                        <a class="nav-link" href="#"> <i class='bx bx-search'></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <button v-on:click="logout()"
                            class="btn btn-info text-center align-middle text-white"
                            style="background-color: #557A7B; border: none;">
                            <i
                                class="fa-solid fa-right-from-bracket"
                                style="font-size: 0.8rem; transform: translateY(-2px);"></i>
                            <b>Logout</b></button>
                        <div class="dropdown-menu dropdown-menu-end">

                        </div>
                    </li>
                    <li hidden class="nav-item dropdown dropdown-large">
                        <a
                            class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                            href="#"
                            role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="alert-count">7</span>
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">

                            <div class="header-notifications-list">
                            </div>

                        </div>
                    </li>
                    <li hidden class="nav-item dropdown dropdown-large">
                        <div hidden class="dropdown-menu dropdown-menu-end">
                            <div class="header-message-list"></div>

                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
@include('admin.share.js')
<script>

</script>
