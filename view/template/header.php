<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $controller->titulo_pagina; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
            crossorigin="anonymous"></script>
    <style>
        nav a{
            text-decoration:none;
            /* font-weight:bold; */
            color:#000 !important;
        }
        li a{
            /* font-weight:bold; */
            font-size:1.2rem;
            transition:all .3s ease-in-out !important;

        }
        li a:hover{
            transition:all .3s ease-in-out !important;
            /* text-decoration:underline !important; */
            /* border:1px solid #000; */
            /* border-radius:5px; */
            color:blue !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">I.S.F.D. Felix Atilio Cabrera</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-5">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=Carreras&action=lista">Carreras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=Materias&action=lista">Materias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=Unidades&action=lista">Unidades</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <header class="mb-5">
            <div class="p-5 text-center bg-light" style="margin-top: 20px;">
                <h1 class="mb-3"><?php echo $controller->titulo_pagina; ?></h1>
            </div>
        </header>
    

