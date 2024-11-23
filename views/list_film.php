<div class="film-container">
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h3>Daftar Film</h3>
    <a href="?c=Film&m=create_form" class="create-film-button">
      Tambah Film
    </a>
  </div>

  <div class="film-grid">
    <?php
    if ($films && $films->num_rows > 0) {
      while ($film = $films->fetch_object()) {
        echo "<div class='film-card'>";
        echo "<a href='?c=Film&m=detail&id_film=" . htmlspecialchars($film->id_film) . "'>";
        echo "<img src='" . htmlspecialchars($film->poster_image) . "' alt='" . htmlspecialchars($film->title) . "' class='film-image'>";
        echo "<h3>" . htmlspecialchars($film->title) . "</h3>";
        echo "</a>";

        $rating = isset($film->rating) ? (float) $film->rating : 0;
        echo "<div class='film-rating'>&#9733; " . $rating . "/10</div>";

        echo "<div class='film-actions'>";
        echo "<button class='edit-button' onclick=\"window.location.href='?c=Film&m=edit_form&id_film=" . htmlspecialchars($film->id_film) . "'\">Edit</button>";
        echo "<button class='delete-button' onclick=\"if(confirm('Are you sure you want to delete this film?')) window.location.href='?c=Film&m=delete&id_film=" . htmlspecialchars($film->id_film) . "';\">Delete</button>";
        echo "</div>";

        echo "</div>";
      }
    } else {
      echo "<p class='no-films'>Tidak ada film.</p>";
    }
    ?>
  </div>
</div>