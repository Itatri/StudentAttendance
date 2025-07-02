<div class="col-12 col-lg-2 sidebar p-0">
    <ul class="nav flex-column py-4 px-2 admin-sidebar-list">
        <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center" aria-current="page" href="/admin">
                <i class="fas fa-user-cog me-2"></i> Quản lí tài khoản
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->is('admin/hocsinh*') ? 'active' : '' }} d-flex align-items-center" href="/admin/hocsinh">
                <i class="fas fa-users me-2"></i> Quản lý học viên
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->is('admin/giaovien*') ? 'active' : '' }} d-flex align-items-center" href="/admin/giaovien">
                <i class="fas fa-chalkboard-teacher me-2"></i> Quản lý giáo viên
            </a>
        </li>
    </ul>
</div> 