<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('admin.index') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-search"></i> <span>Search Doctor</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('Search_Doctor') }}">Edit Search Doctor</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-users"></i> <span>Clinic and Speciality</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('admin.speciality.index') }}">All Speciality</a></li>
                        <li><a href="{{ route('admin.speciality.create') }}">Add New Speciality</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-user-plus"></i> <span>Doctors</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('admin.doctor.index') }}">All Doctors</a></li>
                        <li><a href="{{ route('admin.doctor.create') }}">Add New Featuers</a></li>
                        <li><a href="{{ route('doctor_description') }}">Doctor description</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-vector"></i> <span>Featuers</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('admin.featuer.index') }}">All Featuers</a></li>
                        <li><a href="{{ route('admin.featuer.create') }}">Add New Featuer</a></li>
                        <li><a href="{{ route('featuer_description') }}">Featuers description</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-file"></i> <span>Blogs</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('admin.blog.index') }}">All Blogs</a></li>
                        <li><a href="{{ route('admin.blog.create') }}">Add New Blog</a></li>
                        <li><a href="{{ route('blog_description') }}">Blog description</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-book"></i> <span>Education</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('admin.education.index') }}">All Education</a></li>
                        <li><a href="{{ route('admin.education.create') }}">Add New Education</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-bell"></i> <span>Experience</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('admin.experience.index') }}">All Experiences</a></li>
                        <li><a href="{{ route('admin.experience.create') }}">Add New Experience</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-medal"></i> <span>Awards</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('admin.award.index') }}">All Awards</a></li>
                        <li><a href="{{ route('admin.award.create') }}">Add New Award</a></li>
                    </ul>
                </li>


            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
