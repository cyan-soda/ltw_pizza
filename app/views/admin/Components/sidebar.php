<!-- side bar -->
<div class="sidebar col-2 p-0">
    <div id="sidebar-wrapper" style="background-color: #006a31;">
        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
            <i class="fa-solid fa-pizza-slice"></i> WELCOME
        </div>
        <div class="list-group list-group-flush my-3">
            <a href="index.php"
                class="list-group-item list-group-item-action bg-transparent second-text <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
            </a>
            <a href="manage-branch.php"
                class="list-group-item list-group-item-action bg-transparent second-text <?php echo basename($_SERVER['PHP_SELF']) == 'manage-product.php' ? 'active' : ''; ?>">
                <i class="fas fa-project-diagram"></i>Quản lý Chi nhánh
            </a>
            <!-- <a href="manage-order.php"
                class="list-group-item list-group-item-action bg-transparent second-text <?php echo basename($_SERVER['PHP_SELF']) == 'manage-order.php' ? 'active' : ''; ?>">
                <i class="fas fa-paperclip me-2"></i>Quản lý Đơn hàng
            </a> -->
            <a href="manage-employee.php"
                class="list-group-item list-group-item-action bg-transparent second-text <?php echo basename($_SERVER['PHP_SELF']) == 'manage-employee.php' ? 'active' : ''; ?>">
                <i
                class="fa-solid fa-user-plus"></i> Quản lý Nhân viên
            </a>
            <a href="manage-customer.php"
                class="list-group-item list-group-item-action bg-transparent second-text <?php echo basename($_SERVER['PHP_SELF']) == 'manage-customer.php' ? 'active' : ''; ?>">
                <i class="fa-solid fa-users"></i> Quản lý Khách Hàng
            </a>
            <a href="manage-report.php"
                class="list-group-item list-group-item-action bg-transparent second-text <?php echo basename($_SERVER['PHP_SELF']) == 'manage-report.php' ? 'active' : ''; ?>">
                <i class="fa-solid fa-chart-column"></i> Quản lý Đơn hàng
            </a>
            <a href="manage-news.php"
                class="list-group-item list-group-item-action bg-transparent second-text <?php echo basename($_SERVER['PHP_SELF']) == 'manage-news.php' ? 'active' : ''; ?>">
                <i class="fa-solid fa-ticket"></i> Tin Tức và Khuyến Mãi
            </a>
        </div>
    </div>
</div>