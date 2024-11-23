<?php
class FilmModel extends Model
{
     public function getAll()
     {
          $sql = 'SELECT * FROM films ORDER BY id_film DESC';
          return $this->mysqli->query($sql);
     }

     public function insert($title, $director, $release_year, $genre, $duration, $synopsis, $cast, $rating, $review, $poster_image, $trailer_url)
     {
          $stmt = $this->mysqli->prepare(
               "INSERT INTO films (title, director, release_year, genre, duration, synopsis, cast, rating, review, poster_image, trailer_url) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
          );

          $stmt->bind_param(
               "sssisssssss",
               $title,
               $director,
               $release_year,
               $genre,
               $duration,
               $synopsis,
               $cast,
               $rating,
               $review,
               $poster_image,
               $trailer_url
          );

          $stmt->execute();
     }

     public function getById($id_film)
     {
          $stmt = $this->mysqli->prepare("SELECT * FROM films WHERE id_film = ?");
          $stmt->bind_param("i", $id_film);
          $stmt->execute();
          return $stmt->get_result();
     }

     public function update($id_film, $title, $director, $release_year, $genre, $duration, $synopsis, $cast, $rating, $review, $poster_image, $trailer_url)
     {
          if ($poster_image === null) {
               $stmt = $this->mysqli->prepare(
                    "UPDATE films SET 
                title = ?, 
                director = ?, 
                release_year = ?, 
                genre = ?, 
                duration = ?, 
                synopsis = ?, 
                cast = ?, 
                rating = ?, 
                review = ?, 
                trailer_url = ? 
            WHERE id_film = ?"
               );

               $stmt->bind_param(
                    "sssissssssi",
                    $title,
                    $director,
                    $release_year,
                    $genre,
                    $duration,
                    $synopsis,
                    $cast,
                    $rating,
                    $review,
                    $trailer_url,
                    $id_film
               );
          } else {
               $stmt = $this->mysqli->prepare(
                    "UPDATE films SET 
                title = ?, 
                director = ?, 
                release_year = ?, 
                genre = ?, 
                duration = ?, 
                synopsis = ?, 
                cast = ?, 
                rating = ?, 
                review = ?, 
                poster_image = ?, 
                trailer_url = ? 
            WHERE id_film = ?"
               );

               $stmt->bind_param(
                    "sssisssssssi",
                    $title,
                    $director,
                    $release_year,
                    $genre,
                    $duration,
                    $synopsis,
                    $cast,
                    $rating,
                    $review,
                    $poster_image,
                    $trailer_url,
                    $id_film
               );
          }

          $stmt->execute();
     }

     public function delete($id_film)
     {
          $imagePath = null;
          $stmt = $this->mysqli->prepare("SELECT poster_image FROM films WHERE id_film = ?");
          $stmt->bind_param("i", $id_film);
          $stmt->execute();
          $stmt->bind_result($imagePath);
          $stmt->fetch();
          $stmt->close();

          $stmt = $this->mysqli->prepare("DELETE FROM films WHERE id_film = ?");
          $stmt->bind_param("i", $id_film);

          if ($stmt->execute()) {
               if ($imagePath && file_exists($imagePath) && $imagePath !== "images/default_poster.jpg")
                    unlink($imagePath);

               header("Location: ?c=Film");
          } else
               header("Location: ?c=Film");

          $stmt->close();
     }
}
