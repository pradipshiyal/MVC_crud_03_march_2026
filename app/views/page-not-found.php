<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>404 - Page Not Found</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    height:100vh;
    display:flex;
    /* align-items:center; */
    justify-content:center;
    background:#f8f9fa;
}

.error-container{
    text-align:center;
    margin-top: 129px;
}

.error-code{
    font-size:120px;
    font-weight:bold;
    color:#dc3545;
}

.error-text{
    font-size:24px;
    margin-bottom:20px;
}

.error-desc{
    color:gray;
    margin-bottom:30px;
}

</style>

</head>

<body>

<div class="container">
    <div class="error-container">
        <div class="error-code"> 404 </div>
        <div class="error-text"> Page Not Found </div>
        <div class="error-desc"> The page you are looking for might have been removed or does not exist. </div>
        <a href="<?= BASE_URL ?>" class="btn btn-primary px-4"> Back to Home </a>
        <div class="error-desc mt-2"> Dev: <?= $data ?? ""; ?></div>
    </div>
</div>

</body>
</html>