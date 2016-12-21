<?php

namespace Model\Entity;

class User
{
	private $id; 					//primary key
	private $name;				//username
	private $pwd;					//user password
	private $email;				//user email
	private $isAdmin;			//boolean : is our user an admin ?
	private $watchlist;		//user watchlist
	private $votedMovies; //voted movies by user
	private $token;				//user unique and random token for password reset

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
     * Get the value of Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of Name
     *
     * @param mixed name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of Pwd
     *
     * @return mixed
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * Set the value of Pwd
     *
     * @param mixed pwd
     *
     * @return self
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }

    /**
     * Get the value of Email
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of Email
     *
     * @param mixed email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of Is Admin
     *
     * @return mixed
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * Set the value of Is Admin
     *
     * @param mixed isAdmin
     *
     * @return self
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * Get the value of Watchlist
     *
     * @return mixed
     */
    public function getWatchlist()
    {
        return $this->watchlist;
    }

    /**
     * Set the value of Watchlist
     *
     * @param mixed watchlist
     *
     * @return self
     */
    public function setWatchlist($watchlist)
    {
        $this->watchlist = $watchlist;

        return $this;
    }

    /**
     * Get the value of Voted Movies
     *
     * @return mixed
     */
    public function getVotedMovies()
    {
        return $this->votedMovies;
    }

    /**
     * Set the value of Voted Movies
     *
     * @param mixed votedMovies
     *
     * @return self
     */
    public function setVotedMovies($votedMovies)
    {
        $this->votedMovies = $votedMovies;

        return $this;
    }

    /**
     * Get the value of Token
     *
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of Token
     *
     * @param mixed token
     *
     * @return self
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

}
