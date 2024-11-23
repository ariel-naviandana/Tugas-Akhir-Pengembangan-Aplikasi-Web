<div class="insert-film-container">
  <form enctype="multipart/form-data" action="?c=Film&m=create" method="post">
    <label for="title">Judul Film:</label>
    <input type="text" id="title" name="title" required>

    <label for="director">Sutradara:</label>
    <input type="text" id="director" name="director" required>

    <label for="release_year">Rilis Tahun:</label>
    <input type="number" id="release_year" name="release_year" required>

    <label for="genre">Genre:</label>
    <input type="text" id="genre" name="genre" required>

    <label for="duration">Durasi (menit):</label>
    <input type="number" id="duration" name="duration" required>

    <label for="synopsis">Sinopsis:</label>
    <textarea id="synopsis" name="synopsis" required></textarea>

    <label for="cast">Pemeran:</label>
    <input type="text" id="cast" name="cast" required>

    <label for="review">Review:</label>
    <textarea id="review" name="review" required></textarea>

    <label for="rating">Rating:</label>
    <input type="number" step="0.1" id="rating" name="rating" required>

    <label for="trailer_url">Trailer URL:</label>
    <input type="url" id="trailer_url" name="trailer_url">

    <label for="poster_image">Poster URL:</label>
    <input name="uploadedfile" type="file" /> <br>

    <input type="submit" value="Film">
  </form>
</div>