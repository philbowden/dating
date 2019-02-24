<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="/328/dating/css/bootstrap.min.css">
    <link href="css/styles.css" rel="stylesheet"/>
</head>
<body>
<header>
    <ul class="navbar bg-dark navbar-dark navbar-expand-sm">
        <section class="container">
            <div class="navbar-nav">
                <li class="nav-item"><a class = "nav-link" href="http://pbowden.greenriverdev.com/328/dating/">My Dating Site</a></li>
            </div>
        </section>
    </ul>
</header>
<form method="post" action="#">
    <div class="container border">
        <h1>Profile</h1>
        <hr>
        <div class="row">
            <section class="col-6">
                <div class="form-text form-row">
                    <label class="form-group-label"><strong>Email</strong>
                        <input class="form-control" type="text" name="email" value="<?= ($email) ?>">
                    </label>
                </div>
                <div class="form-text form-row">
                    <label class="form-group-label"><strong>State</strong>
                        <input class="form-control" type="text" name="state" value="<?= ($state) ?>">
                    </label>
                </div>
                <div class="form-text form-row">
                    <label class="form-group-label"><strong>Seeking</strong><br>
                        <input type="radio" name="sgender" value="Seeking Male">Male
                        <input type="radio" name="sgender" value="Seeking Female">Female
                    </label>
                </div>
                <div class="form-text form-row">
                    <label>
                        <strong>Height Preference</strong>
                    </label>
                    <div class="form-text form-row">
                        <label class="form-group-label"><strong>Feet</strong>
                            <input class="form-control" type="number" name="sfeet" value="<?= ($sfeet) ?>">
                        </label>
                        <label class="form-group-label"><strong>Inches</strong>
                            <input class="form-control" type="number" name="sinches" value="<?= ($sinches) ?>">
                        </label>
                    </div>
                </div>
            </section>
            <div class="col-6">
                <label class="form-group-label"><strong>Biography</strong><br>
                    <textarea type="text" cols="35" rows="5" name ="bio" value="<?= ($bio) ?>"></textarea>
                </label>
            </div>
        </div>
        <!--row-->
        <div id="btn" class="container text-md-right pb-2">
            <button class="btn-primary btn-sm rounded" type="submit">Next ></button>
        </div>
    </div><!--main div container-->
</form>
</body>
</html>