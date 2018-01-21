<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Client</title>
        <!-- Bootstrap  CSS file -->
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <script src="{{asset('/resources/js/jquery.js')}}"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script>
            $(function(){
                $("form:first").submit(function(){
                    var fname=$("#fname").val();
                    if(""==fname){
                        alert('First name not be empty!');
                        return false;
                    }
                    var lname=$("#lname").val();
                    if(""==lname){
                        alert('Last name not be empty!');
                        return false;
                    }
                    var phone=$("#phone").val();
                    if(""==phone){
                        alert('Phone not be empty!');
                        return false;
                    }
                    var provence=$("#provence").val();
                    if(""==provence){
                        alert('Provence not be empty!');
                        return false;
                    }
                    var city=$("#city").val();
                    if(""==city){
                        alert('City not be empty!');
                        return false;
                    }
                    var address=$("#address").val();
                    if(""==address){
                        alert('Address not be empty!');
                        return false;
                    }
                    var photo=$("#photo").val();
                    if(""==photo){
                        alert('Photo not be empty!');
                        return false;
                    }
                    var email=$("#email").val();
                    if(""==email){
                        alert('Email not be empty!');
                        return false;
                    }
                    var shortDesc=$("#shortDesc").val();
                    if(""==shortDesc){
                        alert('Short Description not be empty!');
                        return false;
                    }
                    var oid=$("#oid").val();
                    if(oid!=""){
                        $("form").attr("action","{{url('person/update')}}");
                    }
                });
            });
        </script>
    </head>
    <body>
    <div class="container">
        <div class="row">
            </br></br></br>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-12 col-sm-12 col-lg-4">
            <h2>Person information</h2>
            <form action="{{url('person/add')}}" method="post" enctype="multipart/form-data">
                <input name='_token' type='hidden' value='{{csrf_token()}}'/>
                <input id='oid' name='id' type='hidden' value='{{isset($person)?$person->user_id:""}}'>
                <div class="form-group">
                    <input type="text" placeholder="First Name" class="form-control" id="fname" name="fname" value='{{isset($person)?$person->F_name:""}}'>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Last Name" class="form-control" id="lname" name="lname" value='{{isset($person)?$person->L_name:""}}'>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Phone" class="form-control" id="phone" name="phone" value='{{isset($person)?$person->phone:""}}'>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Provence" class="form-control" id="provence" name="provence" value='{{isset($person)?$person->provence:""}}'>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="City" class="form-control" id="city" name="city" value='{{isset($person)?$person->city:""}}'>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Address" class="form-control" id="address" name="address" value='{{isset($person)?$person->address:""}}'>
                </div>
                <div class="form-group">
                    <input type="file" placeholder="Photo" class="form-control" id="photo" name="photo" value='{{isset($person)?$person->photo:""}}'>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Email" class="form-control" id="email" name="email" value='{{isset($person)?$person->email:""}}'>
                </div>
                <div class="form-group has-success">
                    <textarea placeholder="Short Description" class="form-control" id="shortDesc" name="shortDesc">{{isset($person)?$person->short_desc:""}}</textarea>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div class="col-lg-4"></div>
    </div>

    </body>
</html>
