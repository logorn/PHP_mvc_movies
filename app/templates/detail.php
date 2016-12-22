<br><br>
<div class="row">
  <div class="col-sm-4">
      <h2><?= $movie->getTitle() ?></h2>
      <img src="<?= BASE_URL . "public/img/posters/" . $movie->getImdbId() . ".jpg" ?>" alt="<?= $movie->getTitle() ?>" title="<?= $movie->getTitle() ?>">
    </div>
  <div class="col-sm-8"><br><br>

    <?php

    $watchlist = explode("-", $_SESSION['user']['watchlist']);
    if (!empty($_SESSION['user'] && !in_array($movie->getId(),$watchlist))) {
      echo '<a href="';
      echo BASE_URL . 'user?addWl=' . $movie->getId();
      echo '">';
      echo "Add to my watchlist";
      echo "</a>  ";
    }
  ?>

    <p><small><div>Added : <?= $movie->getDateCreated() ?></div></small></p>
    <p><small><div>Last edited : <?= $movie->getDateModified() ?></div></small></p>

    <p>Year : <?= $movie->getYear() ?></p>
    <p>Runtime : <?= $movie->getRuntime() ?></p>

    <p>Genre : <?= $movie->getGenreDisplay() ?></p>

    <p>Rating : <?= $movie->getRating() ?></p>
    <p>Votes : <?= $movie->getVotes() ?></p>

    <p>Directors : <?= $movie->getDirectors() ?></p>
    <p>Writers : <?= $movie->getWriters() ?></p>

    <p><a href="<?= $movie->getTrailerUrl() ?>">Click here to watch the trailer</a></p>

    <p>Plot : <?= $movie->getPlot() ?></p>

    <p>Cast : <?= $movie->getCast() ?></p>

  </div>
</div>
