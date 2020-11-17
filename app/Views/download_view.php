     <div class="px-2">
     <table class="table table-bordered mt-0" id="users-list">
       <thead>
          <tr>
             <th>Name</th>                       
             <th>Size</th>             
             <th>MSHARE</th>             
             <th>Google Drive</th>             
          </tr>
       </thead>
       <tbody>
       <?php $loopCounter = 1 ?>

          <?php //$count = count($unityassetlink) ?>
          <?php //echo $count."4545"; ?>
         <?php //if($count > 1): ?>

          <?php //foreach($unityassetlink as $link): ?>
            <?php foreach($unityassetlink as $link): ?>
            <tr>
               <td class="py-1 align-middle">
                <a href="<?php echo $link['myassetsdb_link_mshare'];?>" target="_blank" ><?php echo $link['name'];?></a>
                </td>

               <td class="py-1 align-middle"> <?php echo number_to_size($link['filesize_byte']);?>
               </td>
               
               <td class="py-1">
              <a href="<?php echo $link['myassetsdb_link_mshare'];?>" class="btn btn-primary btn-sm" target="_blank" ><img class="pt-1" src="mshare.png" alt="mshare logo" width="50" height="15"> Download</a>
              </td>
              <td class="py-1"> <span class="btn btn-warning">Comming Soon</span> </td>

            </tr> 
            <?php $loopCounter++; ?>
            <?php endforeach; ?>         
       </tbody>
     </table>
     </div>