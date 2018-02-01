<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Material Compact Login Animation</title>
  
  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&subset=latin,latin-ext'>

      <link rel="stylesheet" href="/css/styles.css">

  
</head>

<body>

  <div class="materialContainer">


   <div class="box">

      <div class="title">LOGIN</div>
      <form action="/login/pre" method="post">
        {{csrf_field()}}
        <div class="input">
           <label for="name">Email</label>
           <input type="email" name="email" id="name">
           <span class="spin"></span>
        </div>

        <div class="input">
           <label for="pass">Password</label>
           <input type="password" name="password" id="pass">
           <span class="spin"></span>
        </div>

        <div class="button login">
           <button type="submit"><span>GO</span> <i class="fa fa-check"></i></button>
        </div>
      </form>

   </div>

</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="/js/index.js"></script>




</body>

</html>
