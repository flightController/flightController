<div id="header">
        <div id="logo">
            <a href="/home"><img src="../../../images/logo.png" alt="SkyTracker" width="628" height="200" /></a>
        </div>
    </div>


    <form class="form-horizontal" role="form" id="login" action="login.php" method="post" accept-charset="UTF-8" name="loginform">
        <input type="hidden" name="submitted" id="submitted" value="1"/>
        <div class="row">
        <div class="form-group">
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-4">
                <input class="form-control" type="text" id="username" name="username" max-length="50" placeholder="Benutzername" required/>
            </div>
            <div class="col-md-4">&nbsp;</div>
        </div>
        </div>


        <div class="row">
        <div class="form-group">
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-4">
                <input class="form-control" type="password" id="password" name="password" placeholder="Passwort" max-length="50" required/>
            </div>
            <div class="col-md-4">&nbsp;</div>
        </div>
        </div>


        <div class="row">
            <div class="form-group">
                <div class="col-md-5">&nbsp;</div>
                <div class="col-md-2 checkbox">
                    <input type="checkbox" id="remember" name="remember"> Login speichern</>
                </div>
                <div class="col-md-5">&nbsp;</div>
            </div>
        </div>


        <div class="row">
            <div class="form-group">
                <div class="col-md-4">&nbsp;</div>
                <div class="col-md-4 checkbox">
                    <button type="submit" class="btn btn-primary btn-block">Anmelden</button>
            </span>
                </div>
                <div class="col-md-4">&nbsp;</div>
            </div>
        </div>
    </form>

