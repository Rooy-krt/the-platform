<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
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
</head>
<body>
<div class="col-lg-4">
    
    <!-- Social Follow Start -->
    <?php

// Fetch social links
$socialQuery = "SELECT * FROM social_links";
$socialResult = mysqli_query($con, $socialQuery);

// Fetch media embed URL
$mediaQuery = "SELECT embed_url FROM media_links WHERE type = 'YouTube' LIMIT 1";
$mediaResult = mysqli_query($con, $mediaQuery);
$youtube = mysqli_fetch_assoc($mediaResult);
?>

<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Follow Us</h4>
    </div>
    <div class="bg-white border border-top-0 p-3">
        <?php if ($youtube): ?>
            <iframe width="330" height="400" src="<?= htmlspecialchars($youtube['embed_url']) ?>"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
            </iframe>
        <?php endif; ?>

        <?php while($row = mysqli_fetch_assoc($socialResult)): ?>
            <a href="<?= htmlspecialchars($row['url']) ?>" class="d-block w-100 text-white text-decoration-none mb-3"
                style="background: <?= htmlspecialchars($row['bg_color']) ?>;">
                <i class="<?= htmlspecialchars($row['icon_class']) ?> text-center py-4 mr-3"
                   style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium"><?= htmlspecialchars($row['label']) ?></span>
            </a>
        <?php endwhile; ?>
    </div>
</div>


    <!-- Advertisement Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
        </div>
        <div class="bg-white text-center border border-top-0 p-3">
            <div id="ad-container">
				</div>
        </div>
    </div>
    <!-- Advertisement End -->

    <!-- Trending News Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Trending News</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            <?php 
                $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostImage,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId order by viewCounter asc limit 11");
                while ($row=mysqli_fetch_array($query)) {
            ?>
            <li class="d-flex mb-2 align-items-center">
                <img class="mr-2 rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>" width="50px" height="50px">
                <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="text-dark font-weight-bold"><?php echo htmlentities($row['posttitle']);?></a>
            </li>
            <?php } ?>
            <!-- Other trending news items go here -->
        </div>
    </div>
    <!-- Trending News End -->

    <div id="google_translate_element"></div>

    <!-- Latest Magazine Start -->
    <?php
    // Include config file

    // Query to fetch the latest magazine details from the database
    $sql = "SELECT cover_image, pdf_link FROM tblmagazine ORDER BY magazine_issue_year DESC, magazine_issue_month DESC LIMIT 1";
    $result = mysqli_query($con, $sql);

    // Check if the query was successful
    if ($result) {
        // Check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
            // Fetch the latest magazine details
            $latest_magazine = mysqli_fetch_assoc($result);
            $cover_image = $latest_magazine['cover_image'];
            $pdf_link = $latest_magazine['pdf_link'];
        } else {
            // No magazine found
            $cover_image = ""; // Provide a default value or handle accordingly
            $pdf_link = ""; // Provide a default value or handle accordingly
        }
    } else {
        // Query failed
        $cover_image = ""; // Provide a default value or handle accordingly
        $pdf_link = ""; // Provide a default value or handle accordingly
    }
    ?>

    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Latest Magazine</h4>
        </div>
        <div class="bg-white text-center border border-top-0 p-3">
            <?php if (!empty($cover_image) && !empty($pdf_link)) : ?>
                <div id="magazine-content">
					
                
                    <iframe allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe" src="https://heyzine.com/flip-book/6647aa9374.html" style="border: 1px solid lightgray; width: 100%; height: 400px;"></iframe>
                     <a id="read-now" href="https://heyzine.com/flip-book/6647aa9374.html">Read Now</a>
                    <br>
                    
                    <a href="admin/<?php echo $pdf_link; ?>" download>Download for Later</a>
                </div>
            <?php else : ?>
                <p>No magazine available at the moment.</p>
            <?php endif; ?>
        </div>
    </div>

    <script>
        // JavaScript to replace the image with the flipbook iframe
        const readNowLink = document.getElementById('read-now');
        const magazineContent = document.getElementById('magazine-content');

        readNowLink.addEventListener('click', function(event) {
            event.preventDefault();
            const iframe = document.createElement('iframe');

            <iframe allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe" src="https://heyzine.com/flip-book/18d9e562c9.html" style="border: 1px solid lightgray; width: 100%; height: 400px;"></iframe>                                                              
 magazineContent.innerHTML = '';
            magazineContent.appendChild(iframe);
        });
    </script>
    <!-- Latest Magazine End -->

    <!-- Newsletter Start -->
    <!-- Include your newsletter section here -->
    <!-- Newsletter End -->

    <!-- Tags Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            <div class="d-flex flex-wrap m-n1">
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Politics</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Corporate</a>
                <!-- Other tags go here -->
            </div>
        </div>
    </div>
    <!-- Tags End -->
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let ads = [];
        let currentAdIndex = 0;
        const adContainer = document.getElementById('ad-container');

        <?php
        // Fetch ads from the database
        $adQuery = mysqli_query($con, "SELECT ad_image, ad_link FROM ads");
        while ($adRow = mysqli_fetch_assoc($adQuery)) {
            echo "ads.push({image: 'admin/{$adRow['ad_image']}', link: '{$adRow['ad_link']}'});";
        }
        ?>

        function showNextAd() {
            if (ads.length > 0) {
                const ad = ads[currentAdIndex];
                adContainer.innerHTML = `<a href="${ad.link}"><img class="img-fluid" src="${ad.image}" alt="Advertisement"></a>`;
                currentAdIndex = (currentAdIndex + 1) % ads.length;
            }
        }

        // Show the first ad immediately
        showNextAd();
        // Set interval to flip ads every 2 seconds
        setInterval(showNextAd, 2000);
    });
</script>
</body>
</html>
