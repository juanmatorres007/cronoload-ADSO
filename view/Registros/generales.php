<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo) ?></title>
    <!-- Agrega aquí tus enlaces a CSS si es necesario -->
</head>
<body>
    <h1><?= htmlspecialchars($titulo) ?></h1>
    <form action="../routes/Registros/generalRegistros.php?tabla=<?= urlencode($tabla) ?>" method="POST">
        <?php foreach ($campos as $campo): ?>
            <div class="form-group">
                <label><?= $campo['label'] ?></label><br>
                <?php if ($campo['type'] === 'select'): ?>
                    <select name="<?= $campo['name'] ?>" <?= $campo['required'] ? 'required' : '' ?>>
                        <?php  switch ($tabla) {
                            case 'knowledge_area':
                                foreach ($campo['option'] as $option): ?>
                                    <option value="<?= htmlspecialchars($option['id_auto_sta'] ??'') ?>">
                                        <?= htmlspecialchars($option['name'] ?? $option['name_state'] ?? '') ?>
                                    </option>
                            <?php endforeach;
                            break;
                            case 'program':
                                foreach ($campo['option'] as $option): ?>
                                    <option value="<?= htmlspecialchars($option['id_auto_sta'] ?? $option['id_auto_proj'] ?? $option['id_auto_sta'] ?? '') ?>">
                                        <?= htmlspecialchars($option['name'] ?? $option['name_proj'] ?? $option['name_state'] ?? '') ?>
                                    </option>
                            <?php endforeach;
                            break;
                            case 'ficha':
                                foreach ($campo['option'] as $option): ?>
                                    <option value="<?= htmlspecialchars($option['id_auto_sta'] ?? $option['id_auto_proj'] ?? $option['id_auto_sta'] ?? '') ?>">
                                        <?= htmlspecialchars($option['name'] ?? $option['name_proj'] ?? $option['name_state'] ?? '') ?>
                                    </option>
                            <?php endforeach;
                            break;
                            case 'project':
                                foreach ($campo['option'] as $option): ?>
                                    <option value="<?= htmlspecialchars($option['id_auto_sta'] ?? $option['id_auto_know'] ?? $option['id_auto_know'] ?? '') ?>">
                                        <?= htmlspecialchars($option['name'] ?? $option['area_name_know'] ?? $option['name_state'] ?? '') ?>
                                    </option>
                            <?php endforeach;
                            break;
                            case 'genero':
                                foreach ($campo['option'] as $option): ?>
                                    <option value="<?= htmlspecialchars($option['id_auto_sta'] ??'') ?>">
                                        <?= htmlspecialchars($option['name'] ?? $option['name_state'] ?? '') ?>
                                    </option>
                            <?php endforeach;
                            break;
                            case 'phase':
                                foreach ($campo['option'] as $option): ?>
                                    <option value="<?= htmlspecialchars($option['id_auto_sta'] ?? $option['id_auto_proj'] ?? $option['id_auto_proj'] ?? '') ?>">
                                        <?= htmlspecialchars($option['name'] ?? $option['name_proj'] ?? $option['name_state'] ?? '') ?>
                                    </option>
                            <?php endforeach;
                            break;
                            case 'activity':
                                foreach ($campo['option'] as $option): ?>
                                    <option value="<?= htmlspecialchars($option['id_auto_sta'] ?? $option['id_auto_pha'] ?? $option['id_auto_pha'] ?? '') ?>">
                                        <?= htmlspecialchars($option['name'] ?? $option['name_pha'] ?? $option['name_state'] ?? '') ?>
                                    </option>
                            <?php endforeach;
                            break;
                            case 'competition':
                                foreach ($campo['option'] as $option): ?>
                                    <option value="<?= htmlspecialchars($option['id_auto_sta'] ?? $option['id_auto_acti'] ?? $option['id_auto_acti'] ?? '') ?>">
                                        <?= htmlspecialchars($option['name'] ?? $option['name_acti'] ?? $option['name_state'] ?? '') ?>
                                    </option>
                            <?php endforeach;
                            break;
                            case 'result':
                                foreach ($campo['option'] as $option): ?>
                                    <option value="<?= htmlspecialchars($option['id_auto_sta'] ?? $option['id_auto_comp'] ?? $option['id_auto_comp'] ?? '') ?>">
                                        <?= htmlspecialchars($option['name'] ?? $option['name_comp'] ?? $option['name_state'] ?? '') ?>
                                        <?= htmlspecialchars($option['name'] ?? $option['area_name_know'] ?? '') ?>
                                    </option>
                                <?php endforeach;
                                break;
                        }?>
                    </select>
                <?php else: ?>
                    <input type="<?= $campo['type'] ?>" name="<?= $campo['name'] ?>" <?= $campo['required'] ? 'required' : '' ?>>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

        <br><button type="submit">Guardar</button>
        <button type="button" onclick="window.location.href='../routes/contenido.php?dato=consulta_general'">Volver a Consultas</button>


    </form>
</body>
</html>
