<?php
  
  include "hotels_db.php";
  $data=Array();
  $sql="SELECT * FROM daily_users";
  $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
  while($row=mysqli_fetch_assoc($res)){
        
        $UserName=$row['UserName'];
        $MobileNo=$row['MobileNo'];
        $data[]=$MobileNo." ".$UserName;
  
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  </head>
  <body>
    <div class="container" style="margin-top:5%;">
        <div class="row">
            <div class="col-md-12">
                <form method="post" autocomplete="off" action="validation.php">
                    <div class="col-md-4">
                        <div class="form-group ui-widget">
                            <input type="text" name="mobileNum" id="mobileNums" class="form-control" placeholder="Enter your mobile number">
                        </div>
                    </div>    
                    <div class="col-md-3">
                        <button type="submit" name="btnSubmit" class="btn btn-primary form-control">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

     <script>
  $( function() {
    var availableTags =<?php echo json_encode($data);?>;
    $( "#mobileNums").autocomplete({
      source: availableTags
    });
  } );
  </script>
  </body>
</html>
