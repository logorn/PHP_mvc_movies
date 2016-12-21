<?php

namespace Model\Entity;

class Genre
{
	private $id;
	private $genre;
	private $listeGenres=[];


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
     * Get the value of Genres
     *
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of Genres
     *
     * @param mixed genres
     *
     * @return self
     */
    public function setGenres($genre)
    {
        $this->genre = $genre;

        return $this;
    }

		public function getListeGenres()
    {
        return $this->listeGenres;
    }

    /**
     * Set the value of Genres
     *
     * @param mixed genres
     *
     * @return self
     */
    public function setListeGenres($genre)
    {
        $this->listeGenres = $genre;

        return $this;
    }


}
