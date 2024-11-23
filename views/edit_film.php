<div class="insert-film-container">
    <form enctype="multipart/form-data" action="?c=Film&m=update" method="post">
        <input type="hidden" name="id_film" value="<?php echo $film->id_film; ?>">

        <label for="title">Judul Film:</label>
        <input type="text" id="title" name="title" value="<?php echo $film->title; ?>" required>

        <label for="director">Sutradara:</label>
        <input type="text" id="director" name="director" value="<?php echo $film->director; ?>" required>

        <label for="release_year">Rilis Tahun:</label>
        <input type="number" id="release_year" name="release_year" value="<?php echo $film->release_year; ?>" required>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" value="<?php echo $film->genre; ?>" required>

        <label for="duration">Durasi (menit):</label>
        <input type="number" id="duration" name="duration" value="<?php echo $film->duration; ?>" required>

        <label for="synopsis">Sinopsis:</label>
        <textarea id="synopsis" name="synopsis" required><?php echo $film->synopsis; ?></textarea>

        <label for="cast">Pemeran:</label>
        <input type="text" id="cast" name="cast" value="<?php echo $film->cast; ?>" required>

        <label for="review">Review:</label>
        <textarea id="review" name="review" required><?php echo $film->review; ?></textarea>

        <label for="rating">Rating:</label>
        <input type="number" step="0.1" id="rating" name="rating" value="<?php echo $film->rating; ?>" required>

        <label for="trailer_url">Trailer URL:</label>
        <input type="url" id="trailer_url" name="trailer_url" value="<?php echo $film->trailer_url; ?>">

        <label for="poster_image">Poster URL:</label>
        <input name="uploadedfile" type="file" /> <br>

        <?php if ($film): ?>
            <label>Poster Gambar:</label>
            <?php if (!empty($film->poster_image)): ?>
                <img src="<?php echo $film->poster_image; ?>" alt="Poster Film" style="width: 200px; height: auto;">
            <?php else: ?>
                <p>Tidak ada gambar poster tersedia.</p>
            <?php endif; ?>
        <?php endif; ?>

        <input type="submit" value="Submit">
    </form>
</div>