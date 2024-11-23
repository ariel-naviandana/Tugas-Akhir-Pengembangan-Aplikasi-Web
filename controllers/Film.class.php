<?php
class Film extends Controller
{
   public function index()
   {
      $filmModel = $this->loadModel('FilmModel');
      $films = $filmModel->getAll();
      $this->loadView('list_film', ['films' => $films]);
   }

   public function detail(): void
   {
      $id_film = $_GET['id_film'];

      if (!$id_film)
         header('Location: ?c=Film');

      $filmModel = $this->loadModel('FilmModel');
      $film = $filmModel->getById($id_film);

      if (!$film->num_rows)
         header('Location: ?c=Film');

      $this->loadView('detail_film', ['film' => $film->fetch_object()]);
   }

   private function handlePosterUpload(): ?string
   {
      if (isset($_FILES['uploadedfile']) && $_FILES['uploadedfile']['error'] !== UPLOAD_ERR_NO_FILE) {
         $target_path = "images/";
         $target_path = $target_path . basename($_FILES['uploadedfile']['name']);

         if ($_FILES['uploadedfile']['error'] !== UPLOAD_ERR_OK) {
            echo "<script>alert('File upload error: " . $_FILES['uploadedfile']['error'] . "');</script>";
            echo "<script>window.location.href = '?c=Film';</script>";
         }

         if (!move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
            echo "<script>alert('There was an error uploading the file, please try again!');</script>";
            echo "<script>window.location.href = '?c=Film';</script>";
         }

         return $target_path;
      }

      return null;
   }

   public function create_form()
   {
      $this->loadView('insert_film');
   }

   public function create(): void
   {
      $filmModel = $this->loadModel('FilmModel');
      $title = addslashes($_POST['title']);
      $director = addslashes($_POST['director']);
      $release_year = addslashes($_POST['release_year']);
      $genre = addslashes($_POST['genre']);
      $duration = addslashes($_POST['duration']);
      $synopsis = addslashes($_POST['synopsis']);
      $cast = addslashes($_POST['cast']);
      $rating = addslashes($_POST['rating']);
      $review = addslashes($_POST['review']);
      $trailer_url = addslashes($_POST['trailer_url']);

      $poster_image = $this->handlePosterUpload();
      if ($poster_image === null) {
         $poster_image = 'images/default_poster.jpg';
      }

      $filmModel->insert($title, $director, $release_year, $genre, $duration, $synopsis, $cast, $rating, $review, $poster_image, $trailer_url);
      header('Location: ?c=Film');
   }

   public function edit_form(): void
   {
      $id_film = $_GET['id_film'];

      if (!$id_film)
         header('Location: ?c=Film');

      $filmModel = $this->loadModel('FilmModel');
      $film = $filmModel->getById($id_film);

      if (!$film->num_rows)
         header('Location: ?c=Film');

      $this->loadView('edit_film', ['film' => $film->fetch_object()]);
   }

   public function update()
   {
      $filmModel = $this->loadModel('FilmModel');

      $id_film = $_POST['id_film'];
      $title = addslashes($_POST['title']);
      $director = addslashes($_POST['director']);
      $release_year = addslashes($_POST['release_year']);
      $genre = addslashes($_POST['genre']);
      $duration = addslashes($_POST['duration']);
      $synopsis = addslashes($_POST['synopsis']);
      $cast = addslashes($_POST['cast']);
      $rating = addslashes($_POST['rating']);
      $review = addslashes($_POST['review']);
      $trailer_url = addslashes($_POST['trailer_url']);

      $poster_image = $this->handlePosterUpload();

      $filmModel->update($id_film, $title, $director, $release_year, $genre, $duration, $synopsis, $cast, $rating, $review, $poster_image, $trailer_url);
      header('Location: ?c=Film');
   }

   public function delete()
   {
      $id_film = $_GET['id_film'];

      $filmModel = $this->loadModel('FilmModel');
      $filmModel->delete($id_film);

      header('location:?c=Film');
   }
}
