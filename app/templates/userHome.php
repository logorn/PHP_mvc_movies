<!-- Page Heading -->
<?php if (empty($_SESSION['user'])) {
header("Location: home"); }?>

<div class="row">
    <div class="col-lg-12">
      <br>
        <h1 class="page-header">Welcome back, <?= $_SESSION['user']['username'] ?></h1>

        <p><h3>Your Watchlist :</h3></p>
        <table class="table table-hover table-condensed">
          <tr>
            <th>Movie Name</th>
            <th>Remove from watchlist</th>
          </tr>
        <?php if (!empty($watchlist)) {
          foreach ($watchlist as $movieId) {
          echo '<tr><td><a href="';
          echo BASE_URL . 'movie/detail?id=' . $movieId;
          echo '">';
          echo $watchlistName[$movieId]['title'] . "</a> </td>";
          echo '<td><a href="';
          echo BASE_URL . 'user?delWl=' . $movieId;
          echo '">Remove</a>';
          echo "</td></tr>";
          }
        }?>
        </table>

        <?php
        if($_SESSION['user']['role'] == 'admin') {
          echo '<a href="';
          echo BASE_URL . "admin";
          echo '"><hr><p><h3>Admin Page</h3></p></a>';
        }
        ?>



        <hr>
        <p><h3>Your votes :</h3></p>


        <hr>
    </div>
</div>
