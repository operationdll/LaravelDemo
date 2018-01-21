<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Person</title>
        <!-- Bootstrap  CSS file -->
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <script src="{{asset('/resources/js/jquery.js')}}"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script>
            $(function(){
                //search Person information
                $("#searchBnt").click(function(){
                    $.getJSON("{{url('person/list')}}",{'name':$("#searchValue").val()},function(data){
                        var $html = "";
                        $.each(data,function(i,item){
                            $html = $html+'<tr><td>'+item.F_name+' '+item.L_name+'</td>'
                                    +'<td>'+item.phone+'</td>'
                                    +'<td>'+item.email+'</td>'
                                    +'<td>'+item.provence+'</td>'
                                    +'<td>'+item.city+'</td>'
                                    +'<td>'+item.address+'</td>'
                                    +'<td><a href="#">'+item.photo+'</a></td>'
                                    +'<td>'+item.short_desc+'</td>'
                                    +'<td><button class="btn btn-primary my-2 my-sm-0" type="button" onclick="updPerson('+item.user_id+')">Update</button> '
                                    +'<button class="btn btn-primary my-2 my-sm-0" type="button" onclick="delPerson('+item.user_id+')">Delete</button></td></tr>';
                        });
                        $("#clientList").html($html);
                        $("#searchValue").val("");
                    });
                });

                //add Client
                $("#addBnt").click(function(){
                    window.location = "{{asset('person/add')}}";
                });
            });

            //delete client
            function delPerson(cid){
                if (window.confirm("Do you want to delete this person?")) {
                    window.location = "{{asset('person/delete')}}?id="+cid;
                }
            }

            //update client
            function updPerson(cid){
                window.location = "{{asset('person/update')}}"+"?id="+cid;
            }
        </script>
    </head>
    <body>
    <div class="container">
        <div class="row">
        </br></br></br>
        </div>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-12 col-sm-12 col-lg-5">
                <nav class="navbar navbar-light bg-light">
                    <form class="form-inline">
                        <font size="4px"><b>Name:</b></font><input id="searchValue" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="searchBnt">Search</button>
                    </form>
                </nav>
            </div>
            <div class="col-lg-4"></div>
        </div>
        <div class="container">
            <h2>Clients information<button class="btn btn-primary my-2 my-sm-0" type="button" id="addBnt">Add</button></h2>
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Provence</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Photo</th>
                    <th>Short Desc</th>
                    <th>Operating</th>
                </tr>
                </thead>
                <tbody id="clientList">
                @foreach($persons as $p)
                    <tr>
                        <td>
                            {{$p->F_name.' '.$p->L_name}}
                        </td>
                        <td>
                            {{$p->phone}}
                        </td>
                        <td>
                            {{$p->email}}
                        </td>
                        <td>
                            {{$p->provence}}
                        </td>
                        <td>
                            {{$p->city}}
                        </td>
                        <td>
                            {{$p->address}}
                        </td>
                        <td>
                            <a href="#">{{$p->photo}}</a>
                        </td>
                        <td>
                            {{$p->short_desc}}
                        </td>
                        <td>
                            <button class="btn btn-primary my-2 my-sm-0" type="button" onclick="updPerson('{{$p->user_id}}')">Update</button>
                            <button class="btn btn-primary my-2 my-sm-0" type="button" onclick="delPerson('{{$p->user_id}}')">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </body>
</html>
