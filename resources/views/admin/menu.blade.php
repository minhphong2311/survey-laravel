<ul class="sidebar-menu" data-widget="tree">
    <li class="{{ Request::is('admincp') ? 'active' : '' }}">
        <a href="{{ url('/admincp') }}">
            <i class="fa fa-home"></i> <span>Home</span>
        </a>
    </li>

    @if(Auth::user()->level == 'Superadmin')
    <li
        class="treeview {{ Request::is('admincp/client') || Request::is('admincp/survey') ? 'active menu-open' : '' }}">
        <a href="#">
            <i class="fa fa-file-text"></i> <span>Participants</span>
            <span class="pull-right-container"><i class="fa fa-angle-down pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ Request::is('admincp/client') ? 'active' : '' }}">
                <a href="{{ url('/admincp/client') }}">Pre-Survey</a>
            </li>
            <li class="{{ Request::is('admincp/survey') ? 'active' : '' }}">
                <a href="{{ url('/admincp/survey') }}">Survey Results</a>
            </li>
        </ul>
    </li>
    @endif

    {{-- <li class="{{ Request::is('admincp/client') ? 'active' : '' }}">
        <a href="{{ url('/admincp/client') }}">
            <i class="fa fa-file-text"></i> <span>Client</span>
        </a>
    </li> --}}

    {{-- <li class="{{ Request::is('admincp/question') ? 'active' : '' }}">
        <a href="{{ url('/admincp/question') }}">
            <i class="fa fa-question"></i> <span>Question</span>
        </a>
    </li>
    <li class="{{ Request::is('admincp/question-type') ? 'active' : '' }}">
        <a href="{{ url('/admincp/question-type') }}">
            <i class="fa fa-terminal"></i> <span>Question Type</span>
        </a>
    </li> --}}

    <li
        class="treeview {{ Request::is('admincp/manage-admin') || Request::is('admincp/manage-staff') ? 'active menu-open' : '' }}">
        <a href="#">
            <i class="fa fa-cog"></i> <span>Manage</span>
            <span class="pull-right-container"><i class="fa fa-angle-down pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ Request::is('admincp/manage-staff') ? 'active' : '' }}">
                <a href="{{ url('/admincp/manage-staff') }}">Manage Staff</a>
            </li>
            @if(Auth::user()->level == 'Superadmin')
            <li class="{{ Request::is('admincp/manage-admin') ? 'active' : '' }}">
                <a href="{{ url('/admincp/manage-admin') }}">Manage Admin</a>
            </li>
            @endif
        </ul>
    </li>

    <li>
        <a href="{{ url('/logout') }}" ><i class="fa fa-sign-out" aria-hidden="true"></i> <span>Logout</span></a>
    </li>


</ul>
