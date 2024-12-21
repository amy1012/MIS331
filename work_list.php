<?php
require_once 'php/db.php';
require_once 'php/functions.php';

$datas = get_publish_works();
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <title>NSBlog</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>"/>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
<div style="height: 40px;"></div>
<?php
include_once 'menu.php';
?>
<div class="highspace"></div>
<div class="wltitle">ALL POSTS</div>
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-md-4">
            <?php if (!empty($datas)): ?>
            <?php foreach ($datas as $row): ?>
            <?php
            //處理 摘要
            $abstract = strip_tags($row['title']);
            $abstract = mb_substr($abstract, 0, 30, "UTF-8");
            ?>
            <div class="cardBox col-md-4">
                <div class="card mb-4 shadow-sm">
                <?php if ($row['image_path']): ?>
                    <a href="work.php?i=<?php echo $row['id']; ?>">
                        <img src='<?php echo $row['image_path']; ?>' class="bd-placeholder-img card-img-top"
                                         width="100%" role="img" aria-label="Placeholder: Thumbnail" style="object-fit: cover;">
                    </a>
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['title']; ?></h5>      
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <h3 class="text-center">No Works Yet</h3>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
include_once 'footer.php';
?>
</body>
</html>
