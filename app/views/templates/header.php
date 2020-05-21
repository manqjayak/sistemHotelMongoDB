<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <!-- menggunakan absolute url -->
    <link rel="stylesheet" href="<?= BASEURL ?>public/css/css/bootstrap.css">
</head>

<body>

    <div class="bg-light">
        <div class="container ">
            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <a class="navbar-brand" href="<?= BASEURL ?>">MVC </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= BASEURL ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASEURL ?>contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASEURL ?>about">About</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>