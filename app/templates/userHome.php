<!-- Page Heading -->

<div class="row">
    <div class="col-lg-12">
      <br>
        <h1 class="page-header">Welcome back, <?= $_SESSION['user']['username'] ?></h1>
<?php var_dump($_SESSION) ?>
        <p>Your Watchlist :</p>
<?= $watchlist  ?>
        <hr>
        <p>Your votes :</p>

        <hr>
    </div>
</div>
