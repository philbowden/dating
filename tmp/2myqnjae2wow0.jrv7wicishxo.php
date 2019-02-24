<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Summary</title>
    <link rel="stylesheet" href="/328/dating/css/bootstrap.min.css">
    <link href="/328/dating/css/personalStyles.css" rel="stylesheet"/>
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
<h1>Summary</h1>
<div class="container border">
    <div class="row">
        <section class="col-6">
            <div id="name" class="form-row border">
                <p>Name: <?= ($SESSION['fname']) ?>&nbsp;<?= ($SESSION['lname']) ?></p>
            </div>
            <div id="gender" class="form-row border">
                <p>Gender: <?= ($SESSION['gender']) ?></p>
            </div>
            <div id="age" class="form-row border">
                <p>Age: <?= ($SESSION['age']) ?></p>
            </div>
            <div id="phone" class="form-row border">
                <p>Phone: <?= ($SESSION['phone']) ?></p>
            </div>
            <div id="email" class="form-row border">
                <p>Email: <?= ($SESSION['email']) ?></p>
            </div>
            <div id="state" class="form-row border">
                <p>State: <?= ($SESSION['state']) ?></p>
            </div>
            <div id="seeking" class="form-row border">
                <p>Seeking: <?= ($SESSION['sgender']) ?></p>
            </div>
            <div id="interests" class="form-row border">
                Interests:
                <p><?= ($interestString) ?></p>
            </div>
        </section>
        <section class="col-6">
            <img class="img-fluid" src="images/profile.PNG" alt="profile" width="60%">
            <h2>Biography</h2>
            <blockquote><p><?= ($SESSION['bio']) ?></p></blockquote>
            <div class="container mt-3 text-center">
                <a class="btn-primary btn-lg m-2 rounded text-center"
                   role="button">
                    Contact Me!
                </a>
            </div>
        </section>

    </div>
</div>
</body>
</html>