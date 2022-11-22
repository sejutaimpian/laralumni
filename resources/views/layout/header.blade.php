<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="/aset/{{ $profile->logo }}" type="image/x-icon">
    <link rel="stylesheet" href="/library/bootstrap-icons/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="library/bootstrap/dist/css/bootstrap.css"> -->
    <!-- Datatables -->
    <?php if (session('role')) : ?>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <script src="/js/script.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <?php endif; ?>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body class="bg-light" id="body">