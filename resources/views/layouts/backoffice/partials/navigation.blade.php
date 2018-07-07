<!-- Sidebar user panel -->
<div class="user-panel">
    <div class="pull-left image">
        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <p>
            <a href="{{ route('admin.logout') }}" class="btn btn-danger btn-xs">Logout</a>
        </p>
    </div>
</div>
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
    <li class="header">เมนูหลัก</li>
    <li>
        <a href="{{ route('dashboard.index') }}">
            <i class="fa fa-dashboard"></i> <span>ข้อมูลทั่วไป</span>
        </a>
    </li>

    <li>
        <a href="{{ route('user.index') }}">
            <i class="fa fa-user"></i> <span>สมาชิก</span>
        </a>
    </li>

    <li>
        <a href="{{ route('event.index') }}">
            <i class="fa fa-gamepad"></i> <span>อีเว้นท์</span>
        </a>
    </li>

    <li>
        <a href="{{ route('news.index') }}">
            <i class="fa fa-newspaper-o"></i> <span>ข่าวสาร</span>
        </a>
    </li>

    <li>
        <a href="{{ route('category.index') }}">
            <i class="fa fa-bars"></i></i> <span>หมวดหมู่</span>
        </a>
    </li>

    <li>
        <a href="{{ route('farm.index') }}">
            <i class="fa fa-dot-circle-o"></i> <span>ฟาร์ม</span>
        </a>
    </li>

    <li>
        <a href="{{ route('strain.index') }}">
            <i class="fa fa-deviantart"></i> <span>สายพันธุ์</span>
        </a>
    </li>

    <li>
        <a href="{{ route('store.index') }}">
            <i class="fa fa-stop"></i> <span>ที่เก็บปลา</span>
        </a>
    </li>

    <li>
        <a href="{{ route('product.index') }}">
            <i class="fa fa-product-hunt"></i> <span>สินค้า</span>
        </a>
    </li>


    <li>
        <a href="{{ route('koi.index') }}">
            <i class="fa fa-archive"></i> <span>ปลา</span>
        </a>
    </li>

    <li>
        <a href="{{ route('order.index') }}">
            <i class="fa fa-first-order"></i> <span>สั่งซื้อ</span>
        </a>
    </li>

    <li>
        <a href="{{ route('hall-of-fame.index') }}">
            <i class="fa fa-trophy"></i> <span>หอเกียรติยศ</span>
        </a>
    </li>

    <li>
        <a href="{{ route('banner.index') }}">
            <i class="fa fa-buysellads"></i> <span>Banner</span>
        </a>
    </li>

    <li>
        <a href="{{ route('manage.index') }}">
            <i class="fa fa-users"></i> <span>Admin</span>
        </a>
    </li>
</ul>