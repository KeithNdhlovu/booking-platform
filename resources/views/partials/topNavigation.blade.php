<!-- Search Bar -->
<div class="search-bar hide-on-print">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar hide-on-print">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{ url('/dashboard') }}">{{ config('app.name', Lang::get('titles.app')) }}</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
        </div>
    </div>
</nav>
<!-- #Top Bar -->