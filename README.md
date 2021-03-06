# mvc-movies (School Exercise)


PHP Website displaying Movies informations from an SQL database using MVC.

Rules :
- English only.
- Based on a MVC PHP website sample (https://github.com/gsylvestre/mvc-base).
- Must respect instructions (in french) given in brief-client.txt file.
- Must start from a specific database "movies_db.sql" (which can be modified).

(WARNING : To test this site, use "new_movies_db.sql", see "Installation")

Dependencies (see also "Installation") :
- "abeautifulsite/simpleimage"
- "ircmaxell/random-lib"

# IMPORTANT

This code is far from being perfect and secured. It is still a work in progress.
The point is just to learn to code in PHP MVC.
Please do not use this to make a real website without, at least, enhancing the security.

# Features

Visitor :
- Consult a list of movies and obtain the details of a selected movie.
- Search a movie by word-key, genre and date.
- Register an account (Username/Password/Email).
- Connect.

Member :
- All the features of a Visitor, plus :
- Disconnect.
- Rate a movie. (NOT YET IMPLEMENTED)
- Display a Watchlist.
- Add/Delete a movie to a Watchlist.
- Share a movie URL by e-mail.

Admin :
- All the features of a Visitor and a Member, plus :
- Create a movie.
- Delete a movie.
- Edit movie's informations. (NOT YET IMPLEMENTED)

# Installation

- Clone this repository in the folder of your choice
- Import the modified SQL database (new_movies_db.sql)
- Setup the "abeautifulsite" dependency in command line :
```
composer require abeautifulsite/simpleimage
```
- Setup the "random-lib" dependency in command line :
```
composer require ircmaxell/random-lib
```
- Edit the app/config/config.php file (Parameters BASE_URL & Database connexion infos !)
- ???
- Enjoy !

PS : Default administrator's username & password are : "admin" & "password".

# Special thanks :

- gsylvestre for the MVC PHP website sample (https://github.com/gsylvestre/mvc-base)
- startbootstrap.com for the free template (https://startbootstrap.com/template-overviews/4-col-portfolio/)
- ircmaxell for random-lib (https://github.com/ircmaxell/RandomLib)
- claviska for simpleimage (https://github.com/claviska/SimpleImage)


romwaldtff
