<!-- Page Heading -->
<?php if (empty($_SESSION['user'])) {
header("Location: home"); }?>

<div class="row">
    <div class="col-lg-12">
      <br>
        <h1 class="page-header">Welcome back, <?= $_SESSION['user']['username'] ?></h1>

        <?php var_dump($_SESSION) ?>
        <?php var_dump($watchlistName) ?>
        <p><h3>Your Watchlist :</h3></p>
        <?php foreach ($watchlist as $movieId) {
        echo $watchlistName[$movieId]['title'] . "<br>";
        echo BASE_URL . 'movie/detail?id=' . $movieId . "<br>";
        }?>

        <hr>
        <p><h3>Your votes :</h3></p>

        <hr>
    </div>
</div>
