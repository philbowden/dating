


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal Info</title>
    <link rel="stylesheet" href="/328/dating/css/bootstrap.min.css">
    <link href="/328/dating/css/personalStyles.css" rel="stylesheet"/>
</head>
<body>
<header>
    <section class="navbar-nav bg-light pl-3  navbar-expand-sm">
        <a class ="nav-link text-black-50" href="http://pbowden.greenriverdev.com/328/dating/views/">My Dating Site</a>
    </section>
</header>
<form class="form-group" method="post" action="#">
    <div class="container border">
        <h1>Personal Information</h1>
        <hr>
        <div class="row">
            <section class="col-8">
                <div class="form-text form-row">
                    <label class="form-control-label" ><strong>First Name</strong>
                        <input id="fname" class="form-control" type="text" name="fname" value="">
                    </label>
                </div>
                <div class="form-text form-row">
                    <label class="form-control-label" ><strong>Last Name</strong>
                        <input class="form-control" type="text" name="lname" value="">
                    </label>
                </div>
                <div class="form-text form-row">
                    <label class="form-control-label" ><strong>Age</strong>
                        <input class="form-control" type="number" name="age" value="">
                    </label>
                </div>
                <div class="form-text form-row">
                    <label class="form-control-label" ><strong>Phone Number</strong>
                        <input class="form-control" type="tel" name="phone" value="">
                    </label>
                </div>
                <div class="form-text form-row">
                    <label class="form-text" ><strong>Gender<br></strong>
                        <input class="form-group" type="radio" name="gender">Male
                        <input class="form-group" type="radio" name="gender">Female
                    </label>
                </div>
                <fieldset>
                    <legend>
                        Height
                    </legend>
                    <div class="form-text form-row">
                        <label class="form-control-label" ><strong>Feet</strong>
                            <input class="form-control p-3" type="number" name="feet" value="">
                        </label>
                        <label class="form-control-label" ><strong>Inches</strong>
                            <input class="form-control" type="number" name="inches" value="">
                        </label>
                    </div>
                </fieldset>

            </section><!--column left-->
            <div class="col-4 text-center">
                <section id="paragraph" class="bg-secondary-light">
                    <blockquote class="blockquote mt-3">
                        <strong>Note</strong>: All information entered is protected by our <span class="text-primary">privacy policy</span>.
                        Profile information can only be viewed by others with your permission.
                    </blockquote>
                </section><!--column right-->
            </div>

        </div><!--row-->

        <div id="btn" class="container text-md-right pb-2">
            <button class="btn-primary btn-sm rounded" type="submit">Next ></button>
        </div>
    </div><!--main div-->
</form>

</body>
</html>