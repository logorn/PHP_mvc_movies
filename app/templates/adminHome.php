<!-- Page Heading -->
<?php if ((empty($_SESSION['user']))OR (($_SESSION['user']['role'] != 'admin'))) {
header("Location: home"); }?>

<div class="row">
    <div class="col-lg-12">
      <br>
        <h1 class="page-header">Welcome back, <?= $_SESSION['user']['username'] ?></h1>
        <p><h3>Admin Page</h3></p>
        <hr>
        <?php var_dump($_POST) ?>
        <?php var_dump($_FILES) ?>
            <form method="POST" enctype="multipart/form-data">
              <legend>ADD A MOVIE</legend>
              <input type="hidden" name="csrf_token" value ="<?= $token ?>">
              <input type="hidden" name="addMovie" value ="OK">
              <table>
                <tr>
                  <td><label for="movieName">Name :</label></td>
                  <td><input type="text" name="movieName" id="movieName" value=""></td>
                </tr>
              <tr>
                <td><label for="movieYear">Year :</label></td>
                <td><input type="text" name="movieYear" id="movieYear" value=""></td>
              </tr>
              <tr>
                <td><label for="movieRuntime">Runtime :</label></td>
                <td><input type="text" name="movieRuntime" id="movieRuntime" value=""></td>
              </tr>
              <tr>
                <td><label for="movieGenre">Genre :</label></td>
                <td><input type="text" name="movieGenre" id="movieGenre" value=""></td>
              </tr>
              <tr>
                <td><label for="movieDirectors">Directors :</label></td>
                <td><input type="text" name="movieDirectors" id="movieDirectors" value=""></td>
              </tr>
              <tr>
                <td><label for="movieWriters">Writers :</label></td>
                <td><input type="text" name="movieWriters" id="movieWriters" value=""></td>
              </tr>
              <tr>
                <td><label for="moviePlot">Plot :</label></td>
                <td><input type="text" name="moviePlot" id="moviePlot" value=""></td>
              </tr>
              <tr>
                <td><label for="movieCast">Cast :</label></td>
                <td><input type="text" name="movieCast" id="movieCast" value=""></td>
              </tr>
              <tr>
                <td><label for="movieTrailerUrl">Trailer Url :</label></td>
                <td><input type="text" name="movieTrailerUrl" id="movieTrailerUrl" value=""></td>
              </tr>
              <tr>
                <td><label for="moviePoster">Image</label></td>
                <td><input type="file" id="moviePoster" name="moviePoster"></td>
              </tr>
              </table>
              <div>
                <p><?php if ($error != '') echo '<div class="alert alert-danger"><strong>Error !</strong> ' . $error . '</div>'; ?></p>
              </div>
              <div>
                <button type="submit">Ok !</button>
              </div>
            </form>
            <hr>
          <table class="table table-hover table-condensed">
            <legend>EDIT A MOVIE</legend>
            <tr>
              <th>Movie Name</th>
              <th>Options</th>
            </tr>
          <?php  foreach ($movies as $movie) {
            echo '<tr><td><a href="';
            echo BASE_URL . 'movie/detail?id=' . $movie->getId();
            echo '">';
            echo $movie->getTitle() . "</a> </td>";

            echo '<td><a href="';
            echo BASE_URL . 'admin?updateMovie=' . $movie->getId();
            echo '">Update</a> ';


            echo ' <a href="';
            echo BASE_URL . 'admin?delMovie=' . $movie->getId();
            echo '">Remove</a>';
            echo "</td>";

            echo "</tr>";
            }
          ?>
          </table>

          <!-- Pagination -->
          <div class="row text-center">
              <div class="">
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
                            if (!empty ($_GET['genre'])) {
                              echo "&genre=";
                              echo $_GET['genre'];
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

    </div>
</div>
