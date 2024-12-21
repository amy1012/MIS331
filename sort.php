<?php
// sort.php
require_once 'php/functions.php';
include('php/db.php');

$sortType = $_POST['sortType'];
$keyword = $_SESSION['link']->escape_string($_POST['keyword']);

$query = $_SESSION['link']->query("
  SELECT * FROM `works` 
  WHERE title LIKE '%{$keyword}%' 
    OR intro LIKE '%{$keyword}%' 
    OR content LIKE '%{$keyword}%' 
    OR travel_tips1 LIKE '%{$keyword}%' 
    OR travel_tips2 LIKE '%{$keyword}%'
  ORDER BY id $sortType
");

if ($query->num_rows) {
  while ($r = $query->fetch_object()) {
    $Id = $r->id;
    ?>
    <a href="work.php?i=<?php echo $Id; ?>">
      <div class="result">
        <div class="resultTitleBox">
          <div class="resultTitle"><?php echo strip_tags(html_entity_decode($r->title)); ?></div>
          <div class="resultnum"><?php echo date('Y-m-d', strtotime($r->upload_date)); ?></div>
          <div class="resultCont"><?php echo strip_tags(html_entity_decode($r->content)); ?></div>
        </div>
        <div class="imgContainer">
          <img src="<?php echo $r->image_path; ?>" class="resultImg">
        </div>
      </div>
    </a>
    <?php
  }
}
?>

