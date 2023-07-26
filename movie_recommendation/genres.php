<!doctype html>
<?php
include( "functions.php" );
 
$obj =  new Functions();
$result = $obj->get_genres();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/movie_recommendation/images/favicon.ico">

    <title>Online Movie Recommendations/ Reviews</title>

    <!-- Bootstrap core CSS -->
    <link href="/movie_recommendation/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/movie_recommendation/css/album.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="/movie_recommendation" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
            <strong>Movie Fun</strong>
          </a>
        </div>
      </div>
    </header>

  <main role="main">

      <section class="jumbotron text-center" style="background-color:powderblue;">
        <div class="container">
          <h1 class="jumbotron-heading"><?php echo $type; ?>Dairy Products</h1>
<p>&nbsp;</p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
                <?php
		while( $row = sparql_fetch_array( $result ) )
		{
		?>            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img src='<?php echo($row["image"]); ?>' data-src="holder.js" alt="Card image cap" class="card-img-top img-fluid" style="width: 22rem; height: 20rem;"/>
                  <div class="card-body">
                  <p class="card-text"><b>Name: </b><?php echo $row["name"]; ?></p>
                  <p class="card-text"><b>Type: </b><?php echo $row["type"]; ?></p>
                  <p class="card-text"><b>Description: </b><?php echo $row["desc"]; ?></p>
                  <p class="card-text"><b>Price: </b>£<?php echo $row["price"]; ?></p>
                </div>
              </div>
            </div>
            <?php } ?>

          </div>
        </div>
      </div>

    </main>
    
     <footer class="text-muted">
      <div class="container">
        <p class="float-right">
        <!--  <a href="#">Back to top</a> -->
        </p>
        <p></p>
      </div>
    </footer>

  <script src="/movie_recommendation/js/holder.min.js"></script>
  </body>
</html>
