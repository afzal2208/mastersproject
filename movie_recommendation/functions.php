<?php
require_once( "sparql_library.php" );

class Functions{
    private $db;
    
    public function __construct(){
	$db = sparql_connect( "http://localhost:3030/movie/query" );
	if( !$db ) { print sparql_errno() . ": ---" . sparql_error(). "\n"; exit; }
	sparql_ns( "moviedata","http://www.movierecommendation_ontology/#" );
    }

    public function get_moviesdata(){
        $sparql = "SELECT ?title ?desc ?duration ?date ?url ?ratings
        WHERE {
          ?var a moviedata:Movie.
          ?var moviedata:title ?title.
          ?var moviedata:description ?desc.
          ?var moviedata:duration ?duration.
          ?var moviedata:release_date ?date.
          ?var moviedata:url ?url.
          ?var moviedata:ratings ?ratings
          
        }";
        $result = sparql_query( $sparql ); 
        return $result;
    }

    public function get_reviews(){
        $sparql = "SELECT ?title ?url ?review
        WHERE {
          ?var a moviedata:Movie.
          ?var moviedata:title ?title.
          ?var moviedata:url ?url.
          ?var moviedata:has_review ?review
        }";
        $result = sparql_query( $sparql ); 
        return $result;
    }

    public function get_classics(){
      $sparql = "SELECT DISTINCT ?title ?desc ?url ?date
      WHERE {
        ?var a moviedata:Movie.
        ?var moviedata:ratings 'classic'.
        ?var moviedata:title ?title.
        ?var moviedata:description ?desc.
        ?var moviedata:url ?url.
        ?var moviedata:release_date ?date
      }
      ORDERBY (?title)";
      $result = sparql_query( $sparql ); 
      return $result;
  }

  public function get_newreleases(){
    $sparql = "SELECT DISTINCT ?title ?desc ?url ?date
    WHERE {
      ?var a moviedata:Movie.
      ?var moviedata:ratings 'new'.
      ?var moviedata:title ?title.
      ?var moviedata:description ?desc.
      ?var moviedata:url ?url.
      ?var moviedata:release_date ?date
    }
    ORDERBY (?title)";
    $result = sparql_query( $sparql ); 
    return $result;
}

public function get_recommendations(){
  $sparql = "SELECT DISTINCT ?title ?desc ?url ?date
  WHERE {
    ?var a moviedata:Movie.
    ?var moviedata:ratings 'recommend'.
    ?var moviedata:title ?title.
    ?var moviedata:description ?desc.
    ?var moviedata:url ?url.
    ?var moviedata:release_date ?date
  }
  ORDERBY (?title)";
  $result = sparql_query( $sparql ); 
  return $result;
}

public function get_genres(){
  $sparql = "SELECT ?title ?genre ?url ?date ?duration
  WHERE {
    ?var a moviedata:Movie.
    ?var moviedata:has_genre ?genre.
    ?var moviedata:title ?title.
    ?var moviedata:duration ?duration.
    ?var moviedata:url ?url.
    ?var moviedata:release_date ?date
  }
  ORDERBY (?title)";
  $result = sparql_query( $sparql ); 
  return $result;
}

   
   

}
?>