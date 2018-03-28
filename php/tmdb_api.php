<?php
  class tmdb_api {
    private $auth = "f254b9812b7a71294f8edefa97872438";
    private $data;
    private $conf;


    public function __construct() {
      $this->data = file_get_contents("https://api.themoviedb.org/3/configuration?api_key=" . $this->auth);
      $this->conf = json_decode($this->data,true);
    }

    public function getProfilePhoto($query) {
      $base_url = $this->conf['images']['secure_base_url'];
      $file_size = $this->conf['images']['profile_sizes'][2];
      $query = rawurlencode($query);
      $api_query = file_get_contents("https://api.themoviedb.org/3/search/person?api_key=" . $this->auth . "&language=en-US&query=" . $query . "&page=1&include_adult=false");
      $api_query = json_decode($api_query, true);
      $poster_path = $api_query['results'][0]['profile_path'];
      $abs_url = $base_url . $file_size . $poster_path;
      return $abs_url;
    }
  }
?>
