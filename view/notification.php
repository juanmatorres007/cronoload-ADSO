 <?php foreach ($notifications as $row) : ?>
     <div class="notification">

         <div class="card">
             <div class="header">
                 <span class="icon">
                     <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                         <path clip-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" fill-rule="evenodd"></path>
                     </svg>
                 </span>
                 <p class="alert"><?php echo htmlspecialchars($row['user_not']); ?><br></p>
                 <small><p><?php echo htmlspecialchars($row['created_on']); ?><br></p></small>
             </div>

             <p class="message">
                 <?php echo htmlspecialchars($row['notification']); ?><br><br>
             </p>

             <div class="files">
                 <?php if (!empty($row['file_not'])) : ?>
                     <a href="<?php echo htmlspecialchars($row['file_not']); ?>" target="_blank"><img src="../img/iconoArchivo.png" alt=""></a>
                 <?php endif; ?>
                 <?php echo htmlspecialchars($row['file_not']); ?>
             </div>
         </div>


         <p>



         </p>
     </div>
    
 <?php endforeach; ?>
