<!-- Page Heading -->

<div class="row">
    <div class="col-lg-12">
      <br>
        <h1 class="page-header">Most popular movies</h1>
    </div>
</div>
<!-- /.row -->
<div class="row">
<form class="col-xs-2" action="index.php" method="post">
  <label for="idselect">Find a movie by genre : </label>
    <select class="form-control" name="genre" id="idselect">

      <?php foreach ($genres as $key): ?>
      <option value="<?= $key ?>"><?= $key ?></option>
      <?php endforeach; ?>

    </select>
    <button type="submit">Search</button>
</form>

<form class="col-xs-5" action="index.php" method="post">
  <label for="idselect">Find a movie using a key word : </label>
      <input type="text" name="keyword" class="form-control" id="keyword" value="" placeholder="Type a keyword">
    <button type="submit">Search</button>
</form>
</div>

<section>
<?php //var_dump($_POST) ?>


<?php foreach ($movies as $movie): ?>

    <div id="img">
        <a href="<?= BASE_URL ?>movie/detail?id=<?= $movie->getId() ?>">
            <img id=poster src="<?= BASE_URL . "public/img/posters/" . $movie->getImdbId() . ".jpg" ?>" alt="<?= $movie->getTitle() ?>" title="<?= $movie->getTitle() ?>">
        </a>
    </div>

<?php endforeach; ?>
</section>
<hr>

<!-- Pagination -->
<div class="row text-center">
    <div class="col-lg-10">
        <ul class="pagination">

            <?php if($currentPage != 1) {
              echo '<li><a href="';
              echo "?page=";
              echo $currentPage-1;
              echo '">&laquo;</a>  </li>';
              }

               $nbPages = ceil($moviesCount/8);
               $ii = 1;
                for ($ii; $ii <= $nbPages; $ii++) {
                  echo '<li ';
                  if ($ii == $currentPage) {
                    echo 'class="active"';
                  }
                  echo '><a href="';
                  echo "?page=";
                  echo $ii;
                  if (!empty ($_POST['genre'])) {
                    echo "&genre=";
                    echo $_POST['genre'];
                  }
                  if (!empty ($_GET['genre'])) {
                    echo "&genre=";
                    echo $_GET['genre'];
                  }
                  if (!empty ($_POST['keyword'])) {
                    echo "&keyword=";
                    echo $_POST['keyword'];
                  }
                  if (!empty ($_GET['keyword'])) {
                    echo "&keyword=";
                    echo $_GET['keyword'];
                  }
                  echo '">';
                  echo $ii;

                  echo '</a></li>';
              }

              if($currentPage != $nbPages) {
                echo '<li><a href="';
                echo "?page=";
                echo $currentPage+1;
                echo '">&raquo;</a>  </li>';
                //class="active" pour page active
              }
              ?>
            </li>
        </ul>
    </div>
</div>
<!-- /.row -->
