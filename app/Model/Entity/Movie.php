<?php

namespace Model\Entity;

class Movie
{
	private $id; 					//primary key
  private $imdbId;      //same as poster name (ex : "tt0032.jpg")
  private $title;       //eg : "Terminator"
  private $year;        //eg : "2017"
  private $cast;        //eg : "Arnold Schwarzenegger"
  private $directors;   //eg : "Alan Taylor"
  private $writers;     //eg : "Laeta Kalogriss"
  private $plot;        //eg : "I'll be back. Again. And Again. And Again."
  private $rating;      //eg : "7.0"
  private $votes;       //eg : "46031"
  private $runtime;     //eg : "126 min"
  private $trailerUrl;  //eg : "http://terminatorthetrailer/"
  private $dateCreated; //eg : "2015-07-14 19:17:29"
  private $dateModified;//eg : "2015-07-14 20:32:01" (Last time modified)
  private $genre;				//eg : "Thriller, Action, Horror..."

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Imdb Id
     *
     * @return mixed
     */
    public function getImdbId()
    {
        return $this->imdbId;
    }

    /**
     * Set the value of Imdb Id
     *
     * @param mixed imdbId
     *
     * @return self
     */
    public function setImdbId($imdbId)
    {
        $this->imdbId = $imdbId;

        return $this;
    }

    /**
     * Get the value of Title
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of Title
     *
     * @param mixed title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of Year
     *
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of Year
     *
     * @param mixed year
     *
     * @return self
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the value of Cast
     *
     * @return mixed
     */
    public function getCast()
    {
        return $this->cast;
    }

    /**
     * Set the value of Cast
     *
     * @param mixed cast
     *
     * @return self
     */
    public function setCast($cast)
    {
        $this->cast = $cast;

        return $this;
    }

    /**
     * Get the value of Directors
     *
     * @return mixed
     */
    public function getDirectors()
    {
        return $this->directors;
    }

    /**
     * Set the value of Directors
     *
     * @param mixed directors
     *
     * @return self
     */
    public function setDirectors($directors)
    {
        $this->directors = $directors;

        return $this;
    }

    /**
     * Get the value of Writers
     *
     * @return mixed
     */
    public function getWriters()
    {
        return $this->writers;
    }

    /**
     * Set the value of Writers
     *
     * @param mixed writers
     *
     * @return self
     */
    public function setWriters($writers)
    {
        $this->writers = $writers;

        return $this;
    }

    /**
     * Get the value of Plot
     *
     * @return mixed
     */
    public function getPlot()
    {
        return $this->plot;
    }

    /**
     * Set the value of Plot
     *
     * @param mixed plot
     *
     * @return self
     */
    public function setPlot($plot)
    {
        $this->plot = $plot;

        return $this;
    }

    /**
     * Get the value of Rating
     *
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set the value of Rating
     *
     * @param mixed rating
     *
     * @return self
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get the value of Votes
     *
     * @return mixed
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * Set the value of Votes
     *
     * @param mixed votes
     *
     * @return self
     */
    public function setVotes($votes)
    {
        $this->votes = $votes;

        return $this;
    }

    /**
     * Get the value of Runtime
     *
     * @return mixed
     */
    public function getRuntime()
    {
        return $this->runtime;
    }

    /**
     * Set the value of Runtime
     *
     * @param mixed runtime
     *
     * @return self
     */
    public function setRuntime($runtime)
    {
        $this->runtime = $runtime;

        return $this;
    }

    /**
     * Get the value of Trailer Url
     *
     * @return mixed
     */
    public function getTrailerUrl()
    {
        return $this->trailerUrl;
    }

    /**
     * Set the value of Trailer Url
     *
     * @param mixed trailerUrl
     *
     * @return self
     */
    public function setTrailerUrl($trailerUrl)
    {
        $this->trailerUrl = $trailerUrl;

        return $this;
    }

    /**
     * Get the value of Date Created
     *
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set the value of Date Created
     *
     * @param mixed dateCreated
     *
     * @return self
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get the value of Date Modified
     *
     * @return mixed
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * Set the value of Date Modified
     *
     * @param mixed dateModified
     *
     * @return self
     */
    public function setDateModified($dateModified)
    {
        $this->dateModified = $dateModified;

        return $this;
    }

		public function getGenre()
    {
        return $this->genre;
    }

		public function getGenreDisplay()
    {
			$array = explode(",", $this->genre);
			$result = '';
			foreach ($array as $key) {
				$result .= " ".$key;
			}
      return $result;
    }

    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

}
?>
