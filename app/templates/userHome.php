<!-- Page Heading -->
<?php if (empty($_SESSION['user'])) {
header("Location: home"); }?>

<div class="row">
    <div class="col-lg-12">
      <br>
        <h1 class="page-header">Welcome back, <?= $_SESSION['user']['username'] ?></h1>

        <p><h3>Your Watchlist :</h3></p>
        <?php if (!empty($watchlist)) {
          foreach ($watchlist as $movieId) {
          echo '<p><a href="';
          echo BASE_URL . 'movie/detail?id=' . $movieId;
          echo '">';
          echo $watchlistName[$movieId]['title'] . "</a></p>";
          }
        }?>

        <hr>
        <p><h3>Your votes :</h3></p>

        <hr>
    </div>
</div>
