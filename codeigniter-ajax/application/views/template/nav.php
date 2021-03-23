<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?=($_nav_active == 'home') ? 'active' : ''?>">
                <a class="nav-link change-page" href="javascript:;" data-link="<?=base_url()?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?=($_nav_active == 'page1') ? 'active' : ''?>">
                <a class="nav-link change-page" href="javascript:;" data-link="<?=base_url()?>page-1">Page 1</a>
            </li>
            <li class="nav-item <?=($_nav_active == 'page2') ? 'active' : ''?>">
                <a class="nav-link change-page" href="javascript:;" data-link="<?=base_url()?>page-2">Page 2</a>
            </li>
        </ul>
    </div>
</nav>