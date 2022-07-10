<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.html"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-users"></i> <span>Clinic and Speciality</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('admin.speciality.index') }}">All Speciality</a></li>
                        <li><a href="{{ route('admin.speciality.create') }}">Add New Speciality</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
