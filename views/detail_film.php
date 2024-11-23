<div class="film-detail-container">
    <div class="back-button">
        <button onclick="location.href='?c=Film'">&laquo; Kembali</button>
    </div>
    <div class="film-info">
        <h1><?php echo htmlspecialchars($film->title); ?></h1>
        <p><strong>Sutradara:</strong> <?php echo htmlspecialchars($film->director); ?></p>
        <p><strong>Rilis Tahun:</strong> <?php echo htmlspecialchars($film->release_year); ?></p>
        <p><strong>Genre:</strong> <?php echo htmlspecialchars($film->genre); ?></p>
        <p><strong>Durasi:</strong> <?php echo htmlspecialchars($film->duration); ?> menit</p>
        <p><strong>Sinopsis:</strong> <?php echo htmlspecialchars($film->synopsis); ?></p>
        <p><strong>Pemeran:</strong> <?php echo htmlspecialchars($film->cast); ?></p>
        <p><strong>Review:</strong> <?php echo htmlspecialchars($film->review); ?></p>
        <p><strong>Rating:</strong>
            <?php echo htmlspecialchars($film->rating); ?>
            <span class="star">&#9733;</span>
        </p>

        <?php if (!empty($film->trailer_url)): ?>
            <p><strong>Trailer:</strong></p>
            <?php
            function convertYouTubeUrlToEmbed($url)
            {
                if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
                    return "https://www.youtube.com/embed/" . $matches[1];
                } elseif (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $url, $matches)) {
                    return "https://www.youtube.com/embed/" . $matches[1];
                } else {
                    return $url;
                }
            }

            $embedUrl = convertYouTubeUrlToEmbed($film->trailer_url);
            ?>
            <iframe width="560" height="315" src="<?php echo htmlspecialchars($embedUrl); ?>" frameborder="0"
                allowfullscreen></iframe>
        <?php endif; ?>
    </div>
    <div class="film-poster">
        <img src="<?php echo htmlspecialchars($film->poster_image); ?>"
            alt="<?php echo htmlspecialchars($film->title); ?>">
    </div>
</div>