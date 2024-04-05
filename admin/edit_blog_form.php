<!DOCTYPE html>
<html lang="en">
<?php
require_once('../includes/connect.php');
$query = 'SELECT * FROM blogs WHERE blogs.id = :blogId';
$stmt = $connection->prepare($query);
$blogId = $_GET['id'];
$stmt->bindParam(':blogId', $blogId, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch authors from the database
$authorQuery = 'SELECT * FROM authors';
$authorStmt = $connection->prepare($authorQuery);
$authorStmt->execute();
$authors = $authorStmt->fetchAll(PDO::FETCH_ASSOC);
?>
<head>
  <meta charset="UTF-8" />
    <!-- in mobile set initial zoom level of page to 100%, set site size to equal device width not a larger canvas that is shrunk down-->
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <title>Admin Dashboard | Edit Blog </title>
    <!-- Link to reset or normalize before main.css
    only choose one -->
    <title>Foundation Sixty6 | Unlock the door to possibility</title>
    <!-- ++++++++++++++ FAVICON  ++++++++++++++++-->
    <link rel="shortcut icon" href="../images/favicon.png" type="images/x-icon" />
    <!-- ++++++++++++++ ICON LIBRARY ++++++++++++++++-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin=""/>
    <!-- ++++++++++++++ CSS INCLUDES ++++++++++++++++-->
    <link rel="stylesheet" href="../css/normalize.css" />
    <link rel="stylesheet" href="../css/grid.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!-- ++++++++++++++ GREENSOCK ++++++++++++++++-->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.0/ScrollTrigger.min.js"></script>
    <script defer src="../js/gsap.min.js"></script>
    <script defer src="../js/DrawSVGPlugin.min.js"></script>
    <script defer src="../js/scrolltrigger.js"></script>
    <!-- ++++++++++++++ PLYR  ++++++++++++++++-->
    <script defer src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
    <!-- ++++++++++++++ Charts JS  ++++++++++++++++-->
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

    <script
      async
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"
    ></script>
    <!-- ScrollTrigger plugin -->
    <script
      async
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"
    ></script>
    <!-- Text plugin -->
    <script
      async
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/TextPlugin.min.js"
    ></script>

    <!-- our main js file -->
    <script defer type="module" src="../js/main.js"></script>
  </head>

  <h1 class="hidden">Kwency Dahilan</h1>

  <div id="sticky-nav-con-admin">
  <header id="main-header" class="grid-con">
      <div class="col-start-1 col-end-2 m-col-start-2 m-col-end-3" id="admin-logo">
        <a href="../index.html"
          ><img src="../images/fs6-logo-white.svg"  
        /></a>
      </div>

      <div class="col-start-3 col-end-4 m-col-start-10 m-col-end-12 logOut">
        <a href="blog_list.php">Back</a>
      </div>
    </header>
  </div>
  <body id="body-project-list">

  <section class="grid-con admin-dashboard">
      <div class="col-span-full m-col-start-2 m-col-end-5 dashBoard-dark">
        <h2>
         Project Detail
        </h2>
        <p>My Dashboard</p>

        <ul>
          <li><a href="event_list.php">Events</a></li>
          <li><a href="blog_list.html">Blogs</a></li>
          <li><a href="#">Profile</a></li>
          <li><a href="#">Change Password</a></li>
        </ul>
      </div>
      <div class="col-span-full m-col-start-5 m-col-end-12 list-Projects">
        <div class="editProject">
            <form action="edit_blogs.php" method="POST" id="formUpdate" enctype="multipart/form-data">
            <input name="pk" type="hidden" value="<?php echo $row['id']; ?>">
                <label for="title">Title: </label>
                <input name="title" type="text" value="<?php echo $row['title']; ?>" required><br><br>

                <label for="thumb">Thumbnail: </label>
                <input type="file" name="thumb" id="uploaded" value="<?php echo $row['thumbnail']; ?>"><br><br>
              
                <label for="published_date">Published Date: </label>
                <input type="date" name="published_date" value="<?php echo $row['published_date']; ?>" required><br><br>

                <label for="author_id">Author: </label>
                <select name="author_id" required>
                  <?php foreach ($authors as $author) : ?>
                    <option value="<?php echo $author['id']; ?>" <?php if ($author['id'] == $row['author_id']) echo "selected"; ?>><?php echo $author['name']; ?></option>
                  <?php endforeach; ?>
                </select><br><br>
                
                <label for="content">Content: </label>
                <textarea name="content"><?php echo $row['content']; ?></textarea>

                <input name="submit" type="submit" value="Update">
            </form>
            <?php
            $stmt = null;
            ?>
        </div>
        
       
      </div>
     
    </section>

 

</body>
</html>
