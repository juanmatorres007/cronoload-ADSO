<h3><strong>Imagen subida recientemente: </strong></h3>

<?php

foreach ($get_img as $row):{  
echo "<img src='$row[name_img]' alt='Imagen' width='500' height='500'>";
}
endforeach;