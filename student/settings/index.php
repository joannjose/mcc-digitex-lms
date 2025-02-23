<!-- Page Header -->
<div class="block" id="page-header">
    <div class="px-4 pt-4">
        <h3 class="mb-3 fw-bold">
            <div class="d-flex align-items-center">
                <span class="material-icons">settings</span>
                <span class="ms-3">Settings</span>
            </div>
        </h3>
        <h6 class="mb-3">Current Academic year: <span class="fw-bold">2023-2024</span></h6>
    </div>
    <nav class="block2">
        <ol class="breadcrumb px-4 py-2 m-0">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="">A.Y. 2023-2024</a></li>
            <li class="breadcrumb-item"><a class="text-decoration-none" href="">Settings</a></li>
            <li class="breadcrumb-item active" aria-current="page" id="setSubPage">General</li>
        </ol>
    </nav>
</div>
<div class="block">
    <ul class="d-flex flex-row list-unstyled align-items-center gap-3 m-2 subnav">
        <li class="subnav_active sn_link">
            <a class="nav-link" data-page="general">
                General
            </a>
        </li>
        <li class="subnav_select sn_link">
            <a class="nav-link" data-page="security">
                Security and Login
            </a>
        </li>
        <li class="subnav_select sn_link">
            <a class="nav-link" data-page="appearance">
                Appearance
            </a>
        </li>
        <li class="subnav_select sn_link">
            <a class="nav-link" data-page="archive">
                Archive
            </a>
        </li>
    </ul>
</div>
<!-- Page Content -->
<div class="block p-4" id="pageContent">
    
</div>

<script>
$(document).ready(function(){
    $.ajax({
        type: 'GET',
        url: '../admin/navAdmin.json',
        dataType: 'html',
    }).done(function(response) {
        var data = JSON.parse(response)
        $('#pageContent').load(data[0]['settings'].general);
    });

    $('.sn_link').click(function() {
        var page = $(this).find('a').attr('data-page');
        $('.sn_link').addClass('subnav_select');
        $('.sn_link').removeClass('subnav_active');

        $(this).addClass('subnav_active');
        $(this).removeClass('subnav_select');
        $.ajax({
            type: 'GET',
            url: '../admin/navAdmin.json',
            dataType: 'html',
        }).done(function(response) {
            var data = JSON.parse(response)
            switch(page) {
                case 'general':
                    $('#pageContent').load(data[0].settings.general);
                    break;
                case 'security':
                    $('#pageContent').load(data[0].settings.security);
                    break;
                case 'appearance':
                    $('#pageContent').load(data[0].settings.appearance);
                    break;
                case 'archive':
                    $('#pageContent').load(data[0].settings.archive);
                    break;
                default:
                    $('#pageContent').load(data[0].settings.general);
            }
            $('#setSubPage').text(page.charAt(0).toUpperCase() + page.slice(1));
        });
    });
});
</script>