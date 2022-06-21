<!--- Sidemenu -->
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li>
            <a href="{{route("admin.dashboard")}}" >
                <i class="fas fa-home"></i>
                <span> الرئيسية </span>
            </a>

        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="typcn typcn-cog-outline"></i>
                <span> المسئولين </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("admins.index")}}">عرض الكل</a></li>
                <li><a href="{{route("admins.create")}}">اضافة مسؤل جديد</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-user-edit "></i>
                <span> الاساتذة </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("teachers.index")}}">عرض الكل</a></li>
                <li><a href="{{route("teachers.create")}}">اضافة استاذ جديد</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-user-graduate"></i>
                <span> الطلاب </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("users.index")}}">عرض الكل</a></li>
                <li><a href="{{route("users.create")}}">اضافة طالب جديد</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-code-branch"></i>
                <span> المجموعات </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("groups.index")}}">عرض الكل</a></li>
                <li><a href="{{route("groups.create")}}">اضافة مجموعة جديد</a></li>
            </ul>
        </li>

    </ul>
</div>
<!-- Sidebar -->
