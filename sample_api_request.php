<?php  
if(isset($_GET['q']) && !empty($_GET['q']))
{
    $judul= $_GET['q'];
}else{
	$judul = 'CAPTAIN'; //inisiasi awal yang di cari 
}
$apikey= '28958498126627abaac10776d018b0f5';  // api key
$language = 'en-US';  // bahasa

$content = file_get_contents('https://api.themoviedb.org/3/search/movie?api_key='.$apikey.'&language='.$language.'&query='.$judul);

$result  = json_decode($content);  //decoding json 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contoh Output Akses API TheMovie DB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron text-center">
  <h1>Movie Favorite</h1>
  <p>Cari Movie Favoritmu Disini!</p> 
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  	<ul class="navbar-nav mr-auto"> 
      <li class="nav-item">
        <a class="nav-link" href="#">NOW PLAYING</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="#">UP COMING</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link disabled" href="#">FAVOURITE</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" name="q" type="search" placeholder="<?php echo $judul; ?>" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="container"> 

	<?php
	foreach($result->results as $film)  //looping membaca isi respons 
    {
    	echo  '<div class="row"> <div class="col-sm-6">';
		echo  '<h2>'.$film->original_title.'</h2>';
		echo  '<p>'.$film->overview.'</p>';            
		echo  '<img src="http://image.tmdb.org/t/p/w185'.$film->poster_path.'" class="rounded" alt="Cinque Terre" width="304" height="236"></br> ' ;
		echo  '<button type="button" class="btn btn-danger">Detail</button><button type="button" class="btn btn-warning">Share</button><br>';
		echo  '</div></div>';
     }
    ?> 
</div>

</body>
</html>
