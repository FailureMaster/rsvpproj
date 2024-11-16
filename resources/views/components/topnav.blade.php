<div class="top d-flex justify-content-between align-items-center">
    <div class="left">
        <button id="on" class="btn btn-info"><i class="fa fa-bars"></i></button>
        <button id="off" class="btn btn-info hide"><i class="fa fa-align-left"></i></button>
        <button class="btn btn-info hidden-xs-down"><i class="fa fa-home"></i> Back Home</button>
    </div>
    <div class="right">
        <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                mohamed
            </button>
            <div class="dropdown-menu" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('admin.logout') }}">Log out</a>
            </div>
        </div>
    </div>
</div>