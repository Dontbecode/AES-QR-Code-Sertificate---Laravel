<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <button style="display: block;line-height: 20px;    color: #9A9A9A;padding: 10px 15px;margin: 10px 3px;position: relative;background: none;border: none;" onclick="keluar()">
                        <p>Log out</p>
                    </button>
                </li>
                <li class="separator hidden-lg"></li>
            </ul>
        </div>
    </div>
</nav>
<script>
function keluar() {
let text;
if (confirm("Yakin Logout ?") == true) {
window.location.href = "/logout";
}
}
</script>