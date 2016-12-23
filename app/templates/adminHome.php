<!-- Page Heading -->
<?php if ((empty($_SESSION['user']))OR (($_SESSION['user']['role'] != 'admin'))) {
header("Location: home"); }?>

<div class="row">
    <div class="col-lg-12">
      <br>
        <h1 class="page-header">Welcome back, <?= $_SESSION['user']['username'] ?></h1>
        <p><h3>Admin Page</h3></p>
        <hr>
            <form method="POST">
              <legend>ADD A MOVIE</legend>
              <input type="hidden" name="csrf_token" value ="<?= $token ?>">
              <div>
                <label for="movieName">Name :</label>
                <input type="text" name="movieName" id="movieName" value="">
              </div>
              <div>
                <label for="movieYear">Year :</label>
                <input type="text" name="movieYear" id="movieYear" value="">
              </div>
              <div>
                <label for="movieRuntime">Runtime :</label>
                <input type="text" name="movieRuntime" id="movieRuntime" value="">
              </div>
              <div>
                <label for="movieGenre">Genre :</label>
                <input type="text" name="movieGenre" id="movieGenre" value="">
              </div>
              <div>
                <label for="movieDirectors">Directors :</label>
                <input type="text" name="movieDirectors" id="movieDirectors" value="">
              </div>
              <div>
                <label for="movieWriters">Writers :</label>
                <input type="text" name="movieWriters" id="movieWriters" value="">
              </div>
              <div>
                <label for="moviePlot">Plot :</label>
                <input type="text" name="moviePlot" id="moviePlot" value="">
              </div>
              <div>
                <label for="movieCast">Cast :</label>
                <input type="text" name="movieCast" id="movieCast" value="">
              </div>

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