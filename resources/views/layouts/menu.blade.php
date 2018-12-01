
<li class="treeview active menu-open">
    <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Menu</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">

        <li class="{{ Request::is('affections') ? 'active' : '' }}">
            <a href="{!! route('affections.index') !!}"><i class="fa fa-edit"></i><span>Affections</span></a>
        </li>
    </ul>
</li>