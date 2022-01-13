<?php
include('config.php');

$sql = "SELECT id, text_value FROM n_inputs";
$result = mysqli_query($conn, $sql);
?>
<table class="table table-bordered">
    <tbody>
<?php
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
      ?>
      
        <tr>
            <td><?= $row['id'];?></td>
            <td><?= $row['text_value'];?></td>
        </tr>

    <?php
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
    </tbody>
</div>
