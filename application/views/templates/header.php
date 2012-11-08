<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>

  <title>attach your products</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

 
  <link rel="stylesheet" href="/css/blueprint/screen.css" type="text/css" media="screen, projection" />
  <link rel="stylesheet" href="/css/blueprint/print.css" type="text/css" media="print" /> 

  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/sitestyle.css" type="text/css" />
  <link rel="stylesheet" href="/css/formee-structure.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="/css/formee-style.css" type="text/css" media="screen" />

  <script type="text/javascript" src="/javascript/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/js/jquery.jplayer.min.js"></script>
  <script type="text/javascript" src="/javascript/formee.js"></script>

  <script src="/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="/uploadify/uploadify.css">



<script type="text/javascript">


jQuery(document).ready(function(){
    jQuery("select[name='pricing']").change(function(e){
     var s = $(e.target)
      if (s.val()=='1'){
          jQuery("#costValue").css('display', '');
          }  
          else{
             jQuery("#costValue").css('display', 'none');
          }  
    });
});
</script>


</head>

<body class="modern-browser front not-logged-in no-sidebars"><!--<![endif]-->

  <div id="page">
    <div id="page-inner">
                <div id="header">
                  <div id="header-inner" class="clear-block ">

        <a href="/"><img
         
          src="/images/piypa_aLogo.png"
          alt="piypa - pimp your product a rated" title="piypa - pimp your product a rated"
        /></a>

  </div>


        <div id="top-search">

          <div id="cards">
           
          </div>
          <div id="welcome">
          <?php if(isset($username) AND $username != ''){
              echo 'hejda '.$username.' <br/><a href="/index.php/account/out/">logOUT</a>';
          } 
          else{      
          echo '<p><a href="/index.php/account/login">Login to your account</a> | 
          <br/><a href="/account/register">Register</a> <span class="small"><a href="/about/register">[Why?]</a></span></p>';
          }
          ?>
                   </div>
        </div>
   
         <div id="container_ask"> 



  <div class='container' id='main_nav_wrapper'>
<ul id='main_nav'>
<li class='menu '>
<div id='main_menu_left'></div>
<a href="/" title="Come Home">Home</a>
<div class='right_border'></div>
<div class='separator'></div>
<div class='bottom'></div>
</li>
<li class='menu '>
<div class='left_border'></div>
<a href="/account/" title="your account things">Account</a>
<div class='right_border'></div>
<div class='separator'></div>
<div class='bottom'></div>
</li>
<li class='menu '>
<div class='left_border'></div>
<a href="/index.php/piypa/" title="your pyips">Piyps</a>
<div class='right_border'></div>
<div class='separator'></div>
<div class='bottom'></div>
</li>

<li class='menu '>
<div class='left_border'></div>
<a href="/about/" title="what the f... is a pyip?">About</a>
<div class='right_border'></div>
<div class='separator'></div>
<div class='bottom'></div>
</li>

<li class='menu search'>
<div class='left_border'></div>

<div id='stylized' style="float:right; padding-right:27px;">
  <form action="/search/search"  method="get" id="stylized" class="formee">
    <input id="formee-input" name="q" placeholder="Search by keywords" type="text" value="" />
    <button type="submit" class="formee-button">ask!</button>
  </form>
</div>

</li>
</ul>
</div></div></div> 