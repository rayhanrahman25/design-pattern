<?php
//==================================== Decorate Pattern =====================================
class Article{
    protected $title, $time;
   function __construct($title, $time=null){
     $this->title = $title;
     $this->time = $time;  
   }

   function  getTitle(){
       return $this->title;
   }
   function getTime(){
       return $this->time;
   }

   function DisplayTitle(){
       $title = $this->getTitle();
       $date = date("D/M/Y H:i:s");
       echo "{$title} Was Published on {$date}";
   }
}

class ArticleDecorator{
      protected $article;
      function __construct($article){
          $this->article = $article;
      }

      function DisplayTitle(){
          $title = $this->article->getTitle();
          $date = $this->timeAgo($this->article->getTime());
          echo "{$title} Was Published on {$date}";
      }

      protected function timeAgo( $time ) { 
        //source: https://www.geeksforgeeks.org/how-to-convert-timestamp-to-time-ago-in-php/
        $diff = time() - $time; 
          
        if( $diff < 1 ) {  
            return 'less than 1 second ago';  
        } 
          
        $timeRules = array (  
                    12 * 30 * 24 * 60 * 60 => 'year', 
                    30 * 24 * 60 * 60       => 'month', 
                    24 * 60 * 60           => 'day', 
                    60 * 60                   => 'hour', 
                    60                       => 'minute', 
                    1                       => 'second'
        ); 
      
        foreach( $timeRules as $secs => $str ) { 
              
            $div = $diff / $secs; 
      
            if( $div >= 1 ) { 
                  
                $t = round( $div ); 
                return $t . ' ' . $str .  
                    ( $t > 1 ? 's' : '' ) . ' ago'; 
            } 
        } 
    } 
}

$article = new Article("Article",time() - 4503);
$articleDecorator = new ArticleDecorator($article);
$articleDecorator->DisplayTitle();
