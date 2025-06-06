<?php 
   session_start();
   include('includes/config.php');
   
       ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>The Platform | Home Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="The platform" name="keywords">
    <meta content="By KRTechnologies" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css1/style.css" rel="stylesheet">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4560887592069782"
     crossorigin="anonymous"></script>
<style>
@media (min-width: 768px) {
  .responsive-img {
    width: 100%;
    height: 100%;
    object-fit: contain !important;
  }
  .main-carousel .owl-item img {
    transition: transform 0.5s ease;
  }
  .main-carousel .owl-item:hover img {
    transform: scale(1.05);
  }
    .main-carousel {
    margin-top: 60px;  
  }
}
</style>

</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-KHNQPF46R0"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-KHNQPF46R0');
</script>

<body>

<?php include('includes/header.php');?>



<!-- Main News Slider Start -->
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-7 px-0">
      <div class="owl-carousel main-carousel position-relative">
        <?php 
        $queries = [
          "SELECT tblposts.id as pid, tblposts.PostTitle as posttitle, tblposts.PostImage, tblcategory.CategoryName as category, tblposts.PostDetails as postdetails, tblposts.PostingDate as postingdate FROM tblposts LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId WHERE tblposts.Is_Active = 1 ORDER BY tblposts.id DESC LIMIT 1",
          "SELECT tblposts.id as pid, tblposts.PostTitle as posttitle, tblposts.PostImage, tblcategory.CategoryName as category, tblposts.PostDetails as postdetails, tblposts.PostingDate as postingdate FROM tblposts LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId WHERE tblposts.Is_Active = 1 ORDER BY tblposts.id DESC LIMIT 1 OFFSET 1",
          "SELECT tblposts.id as pid, tblposts.PostTitle as posttitle, tblposts.PostImage, tblcategory.CategoryName as category, tblposts.PostDetails as postdetails, tblposts.PostingDate as postingdate FROM tblposts LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId WHERE tblposts.Is_Active = 1 ORDER BY tblposts.id DESC LIMIT 1 OFFSET 2"
        ];

        foreach ($queries as $query) {
          $result = mysqli_query($con, $query);
          if ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="position-relative overflow-hidden" style="height: 600px;">
              <img class="img-fluid w-100 h-100"
                src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                alt="<?php echo htmlentities($row['posttitle']); ?>"
                style="object-fit: cover;">
              <div class="overlay d-flex flex-column justify-content-end p-4"
                style="background: rgba(0,0,0,0.4);">
                <div class="mb-2">
                  <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                    href="#"><?php echo htmlentities($row['category']); ?></a>
                  <a class="text-white-50" href="#"><small><?php echo htmlentities($row['postingdate']); ?></small></a>
                </div>
                <a class="h2 text-white text-uppercase font-weight-bold"
                  href="news-details.php?nid=<?php echo htmlentities($row['pid']); ?>"><?php echo htmlentities($row['posttitle']); ?></a>
              </div>
            </div>
            <?php
          }
        }
        ?>
      </div>
    </div>

    <div class="col-lg-5 px-0" style="margin-top: 60px;">
      <div class="row mx-0">
        <?php 
        $queries = [
          "SELECT tblposts.id as pid, tblposts.PostTitle as posttitle, tblposts.PostImage, tblcategory.CategoryName as category, tblposts.PostDetails as postdetails, tblposts.PostingDate as postingdate FROM tblposts LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId WHERE tblposts.Is_Active = 1 ORDER BY tblposts.id DESC LIMIT 1",
          "SELECT tblposts.id as pid, tblposts.PostTitle as posttitle, tblposts.PostImage, tblcategory.CategoryName as category, tblposts.PostDetails as postdetails, tblposts.PostingDate as postingdate FROM tblposts LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId WHERE tblposts.Is_Active = 1 ORDER BY tblposts.id DESC LIMIT 1 OFFSET 2",
          "SELECT tblposts.id as pid, tblposts.PostTitle as posttitle, tblposts.PostImage, tblcategory.CategoryName as category, tblposts.PostDetails as postdetails, tblposts.PostingDate as postingdate FROM tblposts LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId WHERE tblposts.Is_Active = 1 ORDER BY tblposts.id DESC LIMIT 1 OFFSET 3",
          "SELECT tblposts.id as pid, tblposts.PostTitle as posttitle, tblposts.PostImage, tblcategory.CategoryName as category, tblposts.PostDetails as postdetails, tblposts.PostingDate as postingdate FROM tblposts LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId WHERE tblposts.Is_Active = 1 ORDER BY tblposts.id DESC LIMIT 1 OFFSET 4"
        ];

        foreach ($queries as $query) {
          $result = mysqli_query($con, $query);
          if ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="col-md-6 px-0">
              <div class="position-relative overflow-hidden" style="height: 300px;">
                <img class="img-fluid w-100 h-100"
                  src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                  alt="<?php echo htmlentities($row['posttitle']); ?>"
                  style="object-fit: cover;">
                <div class="overlay d-flex flex-column justify-content-end p-3"
                  style="background: rgba(0,0,0,0.4);">
                  <div class="mb-1">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                      href="#"><?php echo htmlentities($row['category']); ?></a>
                    <a class="text-white-50" href="#"><small><?php echo htmlentities($row['postingdate']); ?></small></a>
                  </div>
                  <a class="h6 text-white text-uppercase font-weight-semi-bold"
                    href="news-details.php?nid=<?php echo htmlentities($row['pid']); ?>"><?php echo htmlentities($row['posttitle']); ?></a>
                </div>
              </div>
            </div>
            <?php
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>
<!-- Main News Slider End -->

    <!-- Breaking News Start --
    <div class="container-fluid bg-dark py-3 mb-3">
        <div class="container">
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">Breaking News</div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                            style="width: calc(100% - 170px); padding-right: 90px;">
                            <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit. Proin interdum lacus eget ante tincidunt, sed faucibus nisl sodales</a></div>
                            <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit. Proin interdum lacus eget ante tincidunt, sed faucibus nisl sodales</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->
     <!-- ADs banner -->
<div class="container-fluid pt-5 mb-3">
  <div class="container">
    <div class="col-lg-12 mb-3">
      <div id="ad-slideshow">
        <?php     
        $adQuery = mysqli_query($con, "SELECT * FROM ad ORDER BY created_at DESC LIMIT 3");
        while ($ad = mysqli_fetch_array($adQuery)) {
        ?>
          <a href="<?php echo htmlentities($ad['url']); ?>" target="_blank" class="ad-slide" style="display: none;">
            <img src="<?php echo htmlentities($ad['image_path']); ?>" alt="Advertisement" class="img-fluid">
          </a>
        <?php 
        }
        ?>
      </div>
    </div>
  </div>
<!-- Featured News Slider Start 
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Featured News</h4>
        </div>
        <div class="owl-carousel news-carousel carousel-item-4 position-relative">
            <?php 
            $query = mysqli_query($con, "SELECT tblposts.id as pid, tblposts.PostTitle as posttitle, tblposts.PostImage, tblcategory.CategoryName as category, tblcategory.id as cid, tblsubcategory.Subcategory as subcategory, tblposts.PostDetails as postdetails, tblposts.PostingDate as postingdate, tblposts.PostUrl as url FROM tblposts LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId LEFT JOIN tblsubcategory ON tblsubcategory.SubCategoryId = tblposts.SubCategoryId WHERE tblposts.Is_Active = 1 ORDER BY tblposts.id DESC LIMIT 6");
            
            if ($query) {
                while ($row = mysqli_fetch_array($query)) {
                    $postDetails = strip_tags($row['postdetails']); // Strip HTML tags from post details
                    $first20Words = implode(' ', array_slice(explode(' ', $postDetails), 0, 20));
            ?>
            <div class="position-relative overflow-hidden" style="height: 300px;">
                <img class="img-fluid h-100" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>" style="object-fit: cover;">
                <div class="overlay">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="category.php?catid=<?php echo htmlentities($row['cid'])?>" style="color:#fff"><?php echo htmlentities($row['category']);?></a>
                        <a class="text-white" href=""><small><?php echo htmlentities($row['postingdate']);?></small></a>
                    </div>
                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a>
                </div>
            </div>
            <?php 
                }
            }
            ?>
        </div>
    </div>
</div>
-->



        
   <!-- News With Sidebar Start -->
   <div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">Latest News</h4>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                        </div>
                    </div>
                  
                    <?php 
$query = mysqli_query($con, "SELECT tblposts.id as pid, tblposts.PostTitle as posttitle, tblposts.PostImage, tblcategory.CategoryName as category, tblcategory.id as cid, tblsubcategory.Subcategory as subcategory, tblposts.PostDetails as postdetails, tblposts.PostingDate as postingdate, tblposts.PostUrl as url FROM tblposts LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId LEFT JOIN tblsubcategory ON tblsubcategory.SubCategoryId = tblposts.SubCategoryId WHERE tblposts.Is_Active = 1 ORDER BY tblposts.id DESC LIMIT 8");

$postCount = 0;
while ($row = mysqli_fetch_array($query)) {
    $postCount++;
    $postDetails = strip_tags($row['postdetails']);
    $first20Words = implode(' ', array_slice(explode(' ', $postDetails), 0, 20));
?>

<div class="col-lg-6">
    <div class="position-relative mb-3">
        <img class="img-fluid w-100" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>" style="object-fit: cover;">
        <div class="bg-white border border-top-0 p-4">
            <div class="mb-2">
                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="category.php?catid=<?php echo htmlentities($row['cid'])?>" style="color:#fff"><?php echo htmlentities($row['category']);?></a>
                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" style="color:#fff"><?php echo htmlentities($row['subcategory']);?></a>
                <a class="text-body" href=""><small><?php echo htmlentities($row['postingdate']);?></small></a>
            </div>
            <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a>
            <p class="m-0"><?php echo htmlentities($first20Words);?>...</p>
        </div>
    </div>
</div>

<?php 
    // Show ad after the 4th post
    if ($postCount == 4) {
        // Fetch ad from the ads table
        $ad1Query = mysqli_query($con, "SELECT * FROM ad1 ORDER BY created_at DESC LIMIT 1");
        
        // Check if an ad exists in the database
        if ($ad1 = mysqli_fetch_array($ad1Query)) {
?>
<div class="col-12 mb-3">
        <a href="<?php echo htmlentities($ad1['url']); ?>" target="_blank">
            <img src="<?php echo htmlentities($ad1['image_path']); ?>" alt="Advertisement" class="img-fluid">
        </a>
    </div>
<?php 
        }
    }
}
?>

                        
                    </div>
                </div>
          
            
            <?php include('includes/sidebar.php');?>

        </div>
    </div>
            </div>

</div>
</div>
<?php include('includes/footer.php');?>

                


