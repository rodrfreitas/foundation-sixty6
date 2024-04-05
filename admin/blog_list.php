<!DOCTYPE html>
<html lang="en">
  <?php
  session_start();
  
  if(!$_SESSION['username']) {
    header('Location: login_form.php');
  }
  
  require_once('../includes/connect.php');
  
  // Fetch blogs from the database
  $stmt_blogs = $connection->prepare('SELECT id,title FROM blogs ORDER BY id ASC');
  $stmt_blogs->execute();
  
  // Fetch authors from the database
  $stmt_authors = $connection->prepare('SELECT id, name FROM authors ORDER BY id ASC');
  $stmt_authors->execute();
  ?>
  
  <head>
    <meta charset="UTF-8" />
    <!-- in mobile set initial zoom level of page to 100%, set site size to equal device width not a larger canvas that is shrunk down-->
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <title>Admin Dashboard | Blogs</title>
    <!-- Link to reset or normalize before main.css
    only choose one -->
    <title>Foundation Sixty6 | Unlock the door to possibility</title>
    <!-- ++++++++++++++ FAVICON ++++++++++++++++-->
    <link rel="shortcut icon" href="../images/favicon.png" type="images/x-icon" />
    <!-- ++++++++++++++ ICON LIBRARY ++++++++++++++++-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="" />
    <!-- ++++++++++++++ CSS INCLUDES ++++++++++++++++-->
    <link rel="stylesheet" href="../css/normalize.css" />
    <link rel="stylesheet" href="../css/grid.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- ++++++++++++++ GREENSOCK ++++++++++++++++-->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.0/ScrollTrigger.min.js"></script>
    <script defer src="../js/gsap.min.js"></script>
    <script defer src="../js/DrawSVGPlugin.min.js"></script>
    <script defer src="../js/scrolltrigger.js"></script>
    <!-- ++++++++++++++ PLYR ++++++++++++++++-->
    <script defer src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
    <!-- ++++++++++++++ Charts JS ++++++++++++++++-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
    <script defer src="../js/charts.js"></script>
    <!-- ++++++++++++++ ScrollReveal JS ++++++++++++++++-->
    <script defer src="../js/scrollreveal.min.js"></script>
    <!-- ++++++++++++++ VUEJS ++++++++++++++++-->
    <script defer src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <!-- ++++++++++++++ VUEJS ROUTER ++++++++++++++++-->
    <script defer src="https://unpkg.com/vue-router@4.0.15/dist/vue-router.global.js"></script>
    <!-- ++++++++++++++ MAIN JS ++++++++++++++++-->
    <script type="module" defer src="../js/main.js"></script>
    <!-- main library -->
    <script async src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <!-- ScrollTrigger plugin -->
    <script async src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <!-- Text plugin -->
    <script async src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/TextPlugin.min.js"></script>
    <!-- our main js file -->
    <script defer type="module" src="../js/main.js"></script>
  </head>
  
  <h1 class="hidden">Welcome to Admin Dashboard page</h1>
  
  <div id="sticky-nav-con-admin">
    <header id="main-header" class="grid-con">
      <div class="col-start-1 col-end-2 m-col-start-2 m-col-end-3" id="admin-logo">
        <a href="../index.html"
          ><img src="../images/fs6-logo-white.svg"  
        /></a>
      </div>
      
      <div class="col-start-4 col-end-5 m-col-start-10 m-col-end-12 logOut">
        <a href="logout.php">Log out</a>
      </div>
    </header>
  </div>
  <body id="body-project-list">
    <section class="grid-con admin-dashboard">
      <div class="col-span-full m-col-start-2 m-col-end-5 dashBoard-dark">
        <h2>
          Hello,
          <?php echo $_SESSION['username']; ?>
        </h2>
        <p>My Dashboard</p>
        
        <ul>
          <li><a href="event_list.php">Events</a></li>
          <li><a href="blog_list.php">Blogs</a></li>
          <li><a href="#">Profile</a></li>
          <li><a href="#">Change Password</a></li>
        </ul>
      </div>
      
      <div class="col-span-full m-col-start-5 m-col-end-12 list-Projects">
        
        <div class="add-project-div">
          <h3 class="newProject"><a href="#lightbox"><span>+&nbsp;</span> Add a New Blog</a></h3><br>
          
        </div>
        <div class="project-section">
          <div class="projectName">
            <h3>Blog List</h3><br>
            <?php
            $rows = $stmt_blogs->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                echo '<p class="project-list">' . $row['title'] . '</p>';
            }
            ?>
          </div>
          <div class="actionsList">
            <h3 class="actions">Actions</h3><br>
            <?php
            foreach ($rows as $row) {
                echo '<p>' .
                    '<a class="edit" href="edit_blog_form.php?id=' . $row['id'] . '"><i class="fa fa-edit"></i>Update</a>' .
                    '<span class="separator"> | </span>' . 
                    '<a class="delete" href="delete_blog.php?id=' . $row['id'] . '"><i class="fa fa-trash"></i>Delete</a>' .
                    '</p>';
            }
            ?>
          </div>
          
        </div>
      </div>
      
    </section>
    
    <section class="lightbox" id="lightbox">
      <h2 class="hidden">Lightbox section for pop-up</h2>
      <a href="" class="lightbox_close"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
      <div>
        <h3>Add a New Blog</h3>
        <form class="projectLightbox" action="add_blog.php" method="post" enctype="multipart/form-data">
          <label for="title">Title: </label>
          <input name="title" type="text" required /><br /><br />
          
          <label for="thumb">Thumbnail:</label>
          <input type="file" name="thumb" id="uploaded">
          <input type="submit" value="upload"><br><br />
          
          <label for="content">content: </label>
          <textarea name="content"></textarea><br />
          
          <label for="published_date">Published Date: </label>
          <input type="date" name="published_date" required /><br /><br />
          
          <label for="author_id">Author: </label>
          <select name="author_id" required>
            <?php
            $authors = $stmt_authors->fetchAll(PDO::FETCH_ASSOC);
            foreach ($authors as $author) {
                echo '<option value="' . $author['id'] . '">' . $author['name'] . '</option>';
            }
            ?>
          </select><br /><br />
          
          <input name="submit" type="submit" value="Add" />
        </form>
      </div>
    </section>
    
  </body>
</html>
