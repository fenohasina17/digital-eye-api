<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMS for digitalmobilesystems</title>
</head>
<body>
   <div class="container">
       <div class="main">
           <form action="" method="post">
               @csrf
               <div class="row">

                   <div class="col">
                       <div class="form-group">
                            <label for="messageBody" >Message</label>
                            <textarea name="messageBody" id="" cols="30" rows="10" class="form-control"></textarea>
                       </div>
                       

                   </div>
               </div>
               <div class="form-group mt-2">
                   <button type="submit" class="btn btn-primary">Send Message</button>

               </div>
           </form>
       </div>
   </div>
</body>
</html>