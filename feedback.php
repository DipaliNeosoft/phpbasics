<?php
error_reporting(0);
$name=$_POST['ename'];
$type=$_POST['type'];
$title=$_POST['title'];
$review=$_POST['review'];
$pros=$_POST['pros'];
$cons=$_POST['cons'];
$advice=$_POST['advice'];
$agree=$_POST['agree'];
$status=$_POST['status'];
$tmp=$_FILES['att']['tmp_name'];
$errMessage=$typeError=$titleError=$pdfError=$reviewError=$prosError=$consError=$adviceError=$agreeError=$statusError='';
if(isset($_POST['feedback'])){  
    if(empty($name)){
      $nameError="This field is required";
    }

if($status=="NULL"){
$statusError="choose the employee status";
}

    if(empty($title)){
      $titleError="This field is required";
    }
    if(empty($review)){
        $reviewError="This field is required";
    }
    if(empty($pros)){
        $prosError="This field is required";
      }

      if(empty($cons)){
        $consError="This field is required";
      }

      if(empty($advice)){
        $adviceError="This field is required";
      }
   
 
   if(empty($type)){
     $typeError="This field is required";
   }
   if(empty($agree)){
    $agreeError="This field is required";
  }
   if(empty($tmp)){
     $pdfError="This field is required";
   }
  
$fn=$_FILES['att']['name'];
$file_size = $_FILES['att']['size'];
$ext=pathinfo($fn,PATHINFO_EXTENSION);
$fname="document-".time()."-".rand().".$ext";
if(($ext=="pdf" || $ext=="doc") && $file_size<1000000){
      mkdir("upload/$name");
      if(move_uploaded_file($tmp,"upload/$name/$fname")){
file_put_contents("upload/$name/feedback.txt","$type\n$name\n$title\n$status\n$review\n$pros\n$cons\n$advice\n$fname");
 }
      else{
        rmdir("upload/$name");
        $errMessage="uploading error";
      }
    }
    else{
  $pdfError="file should be doc or pdf and less than 10 MB";
}
 
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <script src="https://kit.fontawesome.com/a8f597c662.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
   

    <title>Feedback page</title>
    <style>
      .error{
        color: red;
      }
       .rating {
          width: 180px;
        }

        .rating__star {
          cursor: pointer;
        
        }
    </style>
  </head>
  <body>
    <?php
include("nav.php");
?>
<header class="jumbotron bg-warning container mt-5">
<h1 class="text-center text-white">Feedback panel</h1>
</header>

<div class="container">
<?php
if(!empty($errMessage)){
    ?>
    <div class="alert alert-danger"><?php echo $errMessage; ?></div>

 <?php   
}
?>
<?php
if(isset($_POST['feedback'])){ 
if($errMessage=="" && $typeError=="" && $titleError=="" && $pdfError=="" && $reviewError=="" && $prosError=="" && $consError=="" && $adviceError=="" && $agreeError=="" && $statusError==""){
    ?>
    <div class="container">
      <h1 class="text-success">Thank for your valuable feedback</h1>
    </div>
  <?php
  }
}
  ?>


<form method="post" enctype="multipart/form-data">

  <div class="form-group">
      <label class="font-weight-bold" for="type">Are you a current or former employee?</label>
        <input type="radio" class="font-weight-bold" name="type" value="current">Current
        <input type="radio" class="font-weight-bold" name="type" value="former">Former <span class="error"><?php echo $typeError; ?></span>
    </div>


    <label for="rating">Overall feedback</label>
            <div class="rating mb-3">
                  <i class="rating__star far fa-star" value="one" name="rating"></i>
                  <i class="rating__star far fa-star" value="two" name="rating"></i>
                  <i class="rating__star far fa-star" value="three" name="rating"></i>
                  <i class="rating__star far fa-star" value="four" name="rating"></i>
                  <i class="rating__star far fa-star" value="five" name="rating"></i>
            </div>



    <div class="form-group">
    <label for="ename"class="font-weight-bold">Employer's name</label>
    <input type="text" class="form-control" name="ename" placeholder="Enter your name"><span class="error"><?php echo $nameError; ?></span>
  </div>
  

  


  <div class="form-group ">
    <label for="status" class="font-weight-bold">Employment Status</label>
    <select class="form-control" name="status">
      <option value="NULL">choose...</option>
      <option value="full time">Full Time</option>
      <option value="part time">Part Time</option>
      <option value="contract">Contract</option>
      <option value="intern">Intern</option>
    </select> <span class="error"><?php echo $statusError; ?></span>
  </div>

  <div class="form-group">
    <label for="title"class="font-weight-bold">Job Title</label>
    <input type="text" class="form-control" name="title" placeholder="Enter job title"><span class="error"><?php echo $titleError; ?></span>
  </div>

  <div class="form-group">
    <label for="review"class="font-weight-bold">Review Headline</label>
    <input type="text" class="form-control" name="review" placeholder="Enter your review"><span class="error"><?php echo $reviewError; ?></span>
  </div>



  <div class="form-group shadow-textarea">
  <label for="pros" class="font-weight-bold">Pros</label>
  <textarea class="form-control z-depth-1" name="pros"  rows="3" minlength="15" maxlength="200" placeholder="Write something here...">
  </textarea><span class="error"><?php echo $prosError; ?></span>
</div>

<div class="form-group shadow-textarea">
  <label for="cons" class="font-weight-bold">Cons</label>
  <textarea class="form-control z-depth-1" name="cons"  rows="3" minlength="15" maxlength="200" placeholder="Write something here...">
  </textarea><span class="error"><?php echo $consError; ?></span>
</div>

<div class="form-group shadow-textarea">
  <label for="advice" class="font-weight-bold">Advice management</label>
  <textarea class="form-control z-depth-1" name="advice"  rows="3" minlength="15" maxlength="200" placeholder="Write something here...">
  </textarea><span class="error"><?php echo $adviceError; ?></span>
</div>



  <div class="form-group">
    <label for="att" class="font-weight-bold"> Document</label>
    <input type="file" class="form-control-file" name="att"><span class="error"><?php echo $pdfError; ?></span>
  </div>



  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="agree">
      <label class="form-check-label" for="agree">
       Agree terms and conditions
      </label> <span class="error"><?php echo $agreeError; ?></span>
    </div>
  </div>


  <button type="submit" class="btn btn-primary" name="feedback">Feedback</button>
  <button type="reset" class="btn btn-primary" name="reset">Reset</button>

  </div>
   
<script src="js/rating.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>







