<?php
include 'includes/header.php'; 
include 'models/emailitem.php';

 $EmailItems = new EmailItems();
 $EmailList = $EmailItems->LoadList();

?>

<h2>List of Collected Emails</h2>
<hr>
<?php if (empty($EmailList)): ?>
  <p class="lead mt-3">No items collected yet</p>
  <?php else : ?>
    <table style="width:80%">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Note</th>  
         <th>Created</th>
    </tr>
        <?php foreach ($EmailList as $item): ?>
                <?php if (!empty($item['PersonName'])): ?>
                        <tr>
                        <td><?php echo $item['PersonName'] ?></td>
                        <td><?php echo $item['PersonEmail'] ?></td>
                        <td><?php echo $item['PersonMobile'] ?></td>
                        <td><?php echo $item['PersonNote'] ?></td>
                        <td><?php echo $item['DateCreated'] ?></td>
                        </tr>
                <?php endif; ?>
        <?php endforeach; ?>
<?php endif; ?>




