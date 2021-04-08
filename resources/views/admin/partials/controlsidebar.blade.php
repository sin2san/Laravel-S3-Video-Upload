<aside class="control-sidebar control-sidebar-dark">
    <div class="tab-content">
        <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Website Options</h3>
            <ul class='control-sidebar-menu'>
                <li>
                    <a href="{{ url('/') }}" target="_blank">
                        <i class="menu-icon fa fa-globe bg-green"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Visit Site</h4>
                            <p>{{ str_limit(url('/'), 25) }}</p>
                        </div>
                    </a>
                </li>

                @role('admin')
                <li>
                    <a href="{{ url('video/add') }}" target="_blank">
                        <i class="menu-icon fa fa-video-camera bg-aqua"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Add Video</h4>
                            <p>Add video to the feed</p>
                        </div>
                    </a>
                </li>
                @endrole

                @role('admin')
                <li>
                    <a href="{{ url('admin/options') }}">
                        <i class="menu-icon fa fa-wrench bg-red"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Option</h4>
                            <p>Manage website settings</p>
                        </div>
                    </a>
                </li>
                @endrole

                @role('admin')
                <li>
                    <a href="{{ url('admin/cache/flush') }}">
                        <i class="menu-icon fa fa-refresh bg-orange"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Clear Cache</h4>
                            <p>Clear the cache data</p>
                        </div>
                    </a>
                </li>
                @endrole
            </ul>
        </div>
    </div>
</aside>
<div class='control-sidebar-bg'></div>
