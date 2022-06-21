<!--- Sidemenu -->
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-user-graduate"></i>
                <span> الطلاب </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("teacherUsers.index")}}">عرض الكل</a></li>
                <li><a href="{{route("teacherUsers.create")}}">اضافة طالب جديد</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-code-branch"></i>
                <span> المجموعات </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("groupss.index")}}">عرض الكل</a></li>
                {{-- <li><a href="{{route("groups.create")}}">اضافة مجموعة جديد</a></li> --}}
            </ul>
        </li>

    </ul>
</div>
<!-- Sidebar -->
