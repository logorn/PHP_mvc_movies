
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
      <br>
        <h1 class="page-header">Most popular movies</h1>
        <h2><small>By number of votes</small></h2>
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
      <input type="text" name="keyword" class="form-control" id="keyword" value="" placeholder="Saisissez un nom">
    <button type="submit">Search</button>
</form>
</div>

<?php var_dump($_POST) ?>

<section>
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
    <div class="col-lg-12">
        <ul class="pagination">
            <li>
                <a href="#">&laquo;</a>
            </li>
            <li class="active">
                <a href="#">1</a>
            </li>
            <li>
                <a href="#">2</a>
            </li>
            <li>
                <a href="#">3</a>
            </li>
            <li>
                <a href="#">4</a>
            </li>
            <li>
                <a href="#">5</a>
            </li>
            <li>
                <a href="#">&raquo;</a>
            </li>
        </ul>
    </div>
</div>
<!-- /.row -->
