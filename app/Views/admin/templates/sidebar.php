<?php $uri = service('uri'); ?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
        <div class="sidebar-brand-icon ">
            <img src="<?= base_url() ?>/icon/favicon.png" width="40" height="40" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">You Need</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($uri->getSegment(2) == '' ? 'active' : '') ?>">
        <a class="nav-link" href="<?= base_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manage
    </div>

    <!-- Nav Item - Users -->
    <?php if (in_groups('superadmin')) : ?>
        <li class="nav-item <?= ($uri->getSegment(2) == 'users' ? 'active' : '') ?>">
            <a class="nav-link" href="<?= base_url('admin/users') ?>">
                <i class="fas fa-users"></i>
                <span>All Users</span>
            </a>
        </li>
    <?php endif; ?>

    <!--  Nav Item - Files -->
    <li class="nav-item <?= ($uri->getSegment(2) == 'files' ? 'active' : '') ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#files">
            <i class="fas fa-folder"></i>
            <span>Files</span>
        </a>
        <div id="files" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php if (($uri->getSegment(2) == 'files')) {
                ?>
                    <a class="collapse-item <?= ($uri->getSegment(3) === 'paparan') ? 'active' : '' ?>" href="<?= base_url('admin/files/paparan') ?>">Paparan</a>
                    <a class="collapse-item <?= ($uri->getSegment(3) === 'dokumentasi') ? 'active' : '' ?>" href=" <?= base_url('admin/files/dokumentasi') ?>">Dokumentasi</a>
                    <a class="collapse-item <?= ($uri->getSegment(3) === 'attendes') ? 'active' : '' ?>" href="<?= base_url('admin/files/attendes') ?>">Daftar Hadir</a>
                    <a class="collapse-item" href="cards.html">Notulensi</a>
                <?php
                } else { ?>
                    <a class="collapse-item" href="<?= base_url('admin/files/paparan') ?>">Paparan</a>
                    <a class="collapse-item" href="<?= base_url('admin/files/dokumentasi') ?>">Dokumentasi</a>
                    <a class="collapse-item" href="<?= base_url('admin/files/attendes') ?>">Daftar Hadir</a>
                    <a class="collapse-item" href="cards.html">Notulensi</a>
                <?php } ?>

            </div>
        </div>
    </li>

    <!--  Nav Item - Meeting -->
    <li class="nav-item <?= ($uri->getSegment(2) == 'meeting' ? 'active' : '') ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#meeting">
            <i class="fas fa-clock"></i>
            <span>Meetings</span>
        </a>
        <div id="meeting" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php if (($uri->getSegment(2) == 'meeting')) {
                ?>
                    <a class="collapse-item <?= ($uri->getSegment(3) == '' ? 'active' : '') ?>" href="<?= base_url('admin/meeting') ?>">List of Meeting</a>
                    <a class="collapse-item <?= ($uri->getSegment(3) == 'reminder' ? 'active' : '') ?>" href="<?= base_url('admin/meeting/reminder') ?>">Meeting Reminder</a>
                <?php
                } else { ?>
                    <a class="collapse-item" href="<?= base_url('admin/meeting') ?>">List of Meeting</a>
                    <a class="collapse-item" href="<?= base_url('admin/meeting/reminder') ?>">Meeting Reminder</a>
                <?php } ?>
            </div>
        </div>
    </li>

    <!--  Nav Item - Meeting -->
    <li class="nav-item <?= ($uri->getSegment(2) == 'bidang' ? 'active' : '') ?>">
        <a class="nav-link" href="<?= base_url('admin/bidang') ?>">
            <i class="fas fa-sitemap"></i>
            <span>Bidang</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Profile
    </div>

    <!-- Nav Item - My Profile -->
    <li class="nav-item <?= ($uri->getSegment(2) == 'profiles' ? 'active' : '') ?>">
        <a class="nav-link" href="#">
            <i class="fas fa-user"></i>
            <span>My Profile</span></a>
    </li>

    <!-- Nav Item - Return Home -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user') ?>">
            <i class="fas fa-home"></i>
            <span>Return to Home Page</span></a>
    </li>

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a href="<?= base_url('logout') ?>" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->