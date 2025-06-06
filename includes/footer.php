    <!-- Footer Start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <?php 
$pagetype='contactus';
$query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{

?>

                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
                <p style="color: #888;"><?php echo $row['Description'];?></p>

                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
                <?php } ?>

                <div class="d-flex justify-content-start" >
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2"href="https://www.twitter.com/theplatformke/"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://www.facebook.com/theplatformke/"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://www.instagram.com/theplatformke/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
                <div class="mb-3">
                <?php 
$query = mysqli_query($con, "SELECT tblposts.id as pid, tblposts.PostTitle as posttitle, tblposts.PostImage, tblcategory.CategoryName as category, tblcategory.id as cid, tblsubcategory.Subcategory as subcategory, tblposts.PostDetails as postdetails, tblposts.PostingDate as postingdate, tblposts.PostUrl as url FROM tblposts LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId LEFT JOIN tblsubcategory ON tblsubcategory.SubCategoryId = tblposts.SubCategoryId WHERE tblposts.Is_Active = 1 ORDER BY tblposts.id DESC LIMIT 2");
    
while ($row = mysqli_fetch_array($query)) {
    $postDetails = strip_tags($row['postdetails']); // Strip HTML tags from post details
    $first20Words = implode(' ', array_slice(explode(' ', $postDetails), 0, 20));
?>
    <div class="mb-2">
        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="category.php?catid=<?php echo htmlentities($row['cid'])?>" style="color:#fff"><?php echo htmlentities($row['category']);?></a>
        <a class="text-body " href=""><small><?php echo htmlentities($row['postingdate']);?></small></a>
    </div>
    <a class="small text-body text-uppercase font-weight-medium"> <?php echo htmlentities($first20Words);?> </a>
<?php 
}
?>
                </div>
                </div>
            <div class="col-lg-3 col-md-6 mb-5">
    <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
    <ul class="m-n1">
        <?php $query=mysqli_query($con,"select id,CategoryName from tblcategory");
           while($row=mysqli_fetch_array($query))
           {
           ?>
           <li class="mb-2">
               <a href="category.php?catid=<?php echo htmlentities($row['id'])?>" style="color: #888;"><?php echo htmlentities($row['CategoryName']);?></a>
           </li>
        <?php } ?>
    </ul>
</div>
<div class="col-lg-3 col-md-6 mb-5">
            <div class="text-center">
                <img src="images/logo.png" alt="Logo" width="350">
            </div>
        </div>

            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center" style="color: #888;">&copy; <a href="#">The Platform Magazine</a>. All Rights Reserved. 

		
		<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
		Powered by <a href="https://Krtechnologies.co.ke">KRTechnologies</a></p>
        <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>

    </div>
    <!-- Footer End -->


    <!-- Back to Top -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        
    // Add Random Snowflakes Dynamically with JavaScript
    document.addEventListener('DOMContentLoaded', () => {
        const snowflakesContainer = document.querySelector('.snowflakes');
        for (let i = 0; i < 50; i++) {
            let snowflake = document.createElement('div');
            snowflake.classList.add('snowflake');
            snowflake.innerHTML = '❄️';
            snowflake.style.left = Math.random() * 100 + 'vw';
            snowflake.style.animationDuration = (Math.random() * 5 + 5) + 's';
            snowflake.style.animationDelay = Math.random() * 5 + 's';
            snowflakesContainer.appendChild(snowflake);
        }
    });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll(".ad-slide");
    let current = 0;

    if (slides.length === 0) return;

    slides[current].style.display = "block";

    setInterval(() => {
      slides[current].style.display = "none";
      current = (current + 1) % slides.length;
      slides[current].style.display = "block";
    }, 3000);
  });
</script>

</body>

</html>