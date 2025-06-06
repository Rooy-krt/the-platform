<div class="col-md-3 mt-5">
   <!-- Search Widget -->
<!-- <h4 class="widget-title mb-5">Don't <span>Miss</span></h4> -->

   <div class="card mb-4 border-0">
      <h5 class="card-header border-0 bg-white">Search</h5>
      <div class="card-body">
         <form name="search" action="search.php" method="post">
            <div class="input-group">
               <input type="text" name="searchtitle" class="form-control rounded-0" placeholder="Search for..." required>
               <span class="input-group-btn">
               <button class="btn btn-secondary rounded-0" type="submit"><i class="fa fa-search"></i></button>
               </span>
         </form>
         </div>
      </div>
   </div>
   
   <!-- Side Widget -->
   <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Trending News</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <?php 
               $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostImage,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId  order by viewCounter desc limit 4");
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
 
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Follow Us</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <a href="https://www.facebook.com/theplatformke/" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;">
                            <i class="fab fa-facebook-f text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">1673 followers</span>
                        </a>
                        <a href="https://twitter.com/ThePlatformKe" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;">
                            <i class="fab fa-twitter text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium"> follow us on x</span>
                        </a>
                        <a href="https://instagram.com/ThePlatformKe" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;">
                            <i class="fab fa-instagram text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium"> follow us on instagram</span>
                        </a>
                        <!-- Other social follow links go here -->
                    </div>
                </div>
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
                <script>
                    // JavaScript to open PDF with animated viewer
                    const pdfLink = document.getElementById('read-now');

                    pdfLink.addEventListener('click', function (event) {
                        event.preventDefault();
                        const pdfUrl = this.getAttribute('href');
                        openAnimatedPDFViewer(pdfUrl);
                    });

                    // Function to open PDF with animated viewer
                    function openAnimatedPDFViewer(pdfUrl) {
                        const pdfContainer = document.getElementById('pdf-container');
                        const pdfElement = document.getElementById('pdf');

                        pdfElement.setAttribute('src', pdfUrl);
                        pdfContainer.style.display = 'block';
                    }
                </script>
                  </div>
</div>
