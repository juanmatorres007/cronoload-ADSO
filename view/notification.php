
    <?php foreach ($notifications as $row): ?>
        <div class="notification">
            <p>
                <?php echo htmlspecialchars($row['user_not']); ?><br>
                <?php echo htmlspecialchars($row['created_on']); ?><br>
                <?php echo htmlspecialchars($row['notification']); ?><br><br><br>
                <?php if (!empty($row['file_not'])): ?>
                    <a href="<?php echo htmlspecialchars($row['file_not']); ?>" download>Descargar archivo adjunto</a><br>
                    <a href="<?php echo htmlspecialchars($row['file_not']); ?>" target="_blank">Ver archivo adjunto</a>
                <?php endif; ?>
            </p>
        </div>
    <?php endforeach; ?>
