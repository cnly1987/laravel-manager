<li class="header">主菜单</li>




<li id="tk-menu" class="{{ Request::is('product*','devsuite*','department*','server*') ? 'active' : '' }}" >
    <a href="#">
        <i class="fa fa-laptop "></i> <span>平台运维</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('product*') ? 'active' : '' }}">
            <a href="{!! url('product') !!}"><i class="fa fa-circle-o"></i><span>产品管理</span></a>
        </li>
        <li>
            <a class="tk" href="{{ url('department')  }}"><i class="fa fa-circle-o"></i><span class="tk">事业部管理</span></a>
        </li>
        <li class="{{ Request::is('devsuite*') ? 'active' : '' }}">
            <a class="tk" href="{{ url('devsuite')  }}"><i class="fa fa-circle-o"></i><span class="tk">Devsuite信息查询</span></a>
        </li>
        <li class="{{ Request::is('server*') ? 'active' : '' }}">
            <a class="tk" href="{{ url('server')  }}"><i class="fa fa-circle-o"></i><span class="tk">服务器信息管理</span></a>
        </li>
    </ul>
</li>

<li id="tk-menu" class="{{ Request::is('technicalsupports*') ? 'active' : '' }} " >
    <a href="#">
        <i class="fa fa-edit "></i> <span>客服工单</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li>
            <a class="tk"  href="{!! route('technicalsupports.index') !!}"><i class="fa fa-circle-o"></i><span class="tk">售后工单列表</span></a>
        </li>


    </ul>
</li>


<li  class=" {{ Request::is('graph*') ? 'active' : '' }} "  >
    <a href="#">
        <i class="fa fa-pie-chart"></i>
        <span>统计报表</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ url('graph/worksheet') }}"><i class="fa fa-pie-chart"></i>运维工单统计</a></li>
        <li><a href="{{ url('graph/ticket') }}"><i class="fa fa-pie-chart"></i> 售后工单统计</a></li>
    </ul>
</li>

<li class=" {{ Request::is('users*','roles','permissions*','role_permission*') ? 'active' : '' }}  ">
    <a href="#">
        <i class="fa fa-folder" ></i> <span>系统管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu menu-open" >
        <li class="{{ Request::is('users*') ? 'active' : '' }}">
            <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>用户管理</span></a>
        </li>

        <li class="{{ Request::is('roles*') ? 'active' : '' }}">
            <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>角色管理</span></a>
        </li>

        <li class="{{ Request::is('permissions*') ? 'active' : '' }}">
            <a href="{!! route('permissions.index') !!}"><i class="fa fa-edit"></i><span>权限管理</span></a>
        </li>

        <li class="{{ Request::is('role_permission*') ? 'active' : '' }}">
            <a href="{!! route('role_permission.index') !!}"><i class="fa fa-edit"></i><span>角色权限</span></a>
        </li>
    </ul>
</li>

<li id="tk-menu" class="{{ Request::is('appconfig*') ? 'active' : '' }}" >
    <a href="#">
        <i class="fa fa-th "></i> <span>系统配置</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('appconfig/server*') ? 'active' : '' }}">
            <a href="{{ url('appconfig/server') }}"><i class="fa fa-circle-o"></i><span>服务器配置</span></a>
        </li>
        <li class="{{ Request::is('appconfig/product*') ? 'active' : '' }}">
            <a href="{{ url('appconfig/product/catagory') }}"><i class="fa fa-circle-o"></i><span>产品配置</span></a>
        </li>


    </ul>
</li>

