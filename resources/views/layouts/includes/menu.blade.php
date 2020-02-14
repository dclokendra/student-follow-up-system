<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/backend/dist/img/lokendra.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Inquiry Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('inquiry.create')}}"><i class="fa fa-plus"></i>Create</a></li>
                    <li><a href="{{route('inquiry.index')}}"><i class="fa fa-circle-o"></i> Index</a></li>
                </ul>
            </li>
            //followup
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-reply-all"></i>
                    <span>Follow Up Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('followup.create')}}"><i class="fa fa-plus"></i>Create</a></li>
                    <li><a href="{{route('followup.index')}}"><i class="fa fa-circle-o"></i> Index</a></li>
                </ul>
            </li>
            //exam
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text-o"></i>
                    <span>Exam Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('exam.create')}}"><i class="fa fa-plus"></i>Create</a></li>
                    <li><a href="{{route('exam.index')}}"><i class="fa fa-circle-o"></i> Index</a></li>
                </ul>
            </li>
            //result
            <li class="treeview">
                <a href="#">
                    <i class="fa  fa-file-pdf-o"></i>
                    <span>Result Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('result.create')}}"><i class="fa fa-plus"></i>Create</a></li>
                    <li><a href="{{route('result.index')}}"><i class="fa fa-circle-o"></i> Index</a></li>
                </ul>
            </li>

            //student
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-graduation-cap"></i>
                    <span>Student Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('student.create')}}"><i class="fa fa-plus"></i>Create</a></li>
                    <li><a href="{{route('student.index')}}"><i class="fa fa-circle-o"></i> Index</a></li>
                </ul>
            </li>
{{--            //batchclassStudent--}}
{{--            <li class="treeview">--}}
{{--                <a href="#">--}}
{{--                    <i class="fa fa-graduation-cap"></i>--}}
{{--                    <span>Assign Class</span>--}}
{{--                    <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--                </a>--}}
{{--                <ul class="treeview-menu">--}}
{{--                    <li><a href="{{route('batchclass.index')}}"><i class="fa fa-plus"></i>Index</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
            //basic setup
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Basic Setup</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('class.index')}}"><i class="fa fa-circle-o"></i> Class</a></li>
                    <li><a href="{{route('batch.index')}}"><i class="fa fa-circle-o"></i> Batch</a></li>
                    <li><a href="{{route('examtype.index')}}"><i class="fa fa-circle-o"></i> Exam Type</a></li>
                    <li><a href="{{route('parent.index')}}"><i class="fa fa-circle-o"></i> Parent</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

