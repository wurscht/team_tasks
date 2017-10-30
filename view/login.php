<h1 class="h_subpage">Login</h1>
<div class="container home_text">
    <article class="hreview open special col-xs-6 col-xs-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">Please enter the password</div>
            <div class="panel-body">
                <form class="form-horizontal" action="/login/check" method="post">
                    <input id="login" name="password" required="required" type="password" placeholder="Password" class="form-control input-md">
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="send">&nbsp;</label>
                        <div class="col-md-4">
                            <input id="send" name="send" type="submit" class="btn btn-primary btn_login" value="send" >
                        </div>
                    </div>
                    <?php if (isset($_GET['login']) && $_GET['login'] == "fail") { ?>
                        <p>Your password was incorrect. Please try again.</p>
                    <?php } ?>
                </form>
            </div>
        </div>
    </article>
</div>