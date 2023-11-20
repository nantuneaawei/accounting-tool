<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#" data-page="index" id="index">{{ $nickname }},您好</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline my-2 my-lg-0">
        </form>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#" data-page="index" id="index">支出</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-page="in" id="in">收入</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-page="record" id="record">財務分析</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" role="button" id="logout_btn">登出</a>
            </li>
        </ul>
    </div>
</nav>
@vite('resources/js/a.js')
