   <?php if(isset($_COOKIE['mycookie'])){
       $array= explode(',',$_COOKIE['mycookie']);
        print_r($array);
    } else {
        $array = [];
    }
    ?>
    <html>
    <head>
        <script src='{{ asset('jquery-1.10.2.js') }}' type='text/javascript'></script>
        <script type='text/javascript'>
            $(document).ready(function(){
                var itemsarray=[];
                $("input[data-stateName]").click(function(){
                <?php 
                    foreach($array as $k=>$v){
                        echo "itemsarray.push(".$v.");";
                    }
                ?>
                                    
                $(this).toggleClass("selected");
                    $("#question li .selected").each(function(){

                        var tmp_id = $(this).attr('id');
                        
                        var cook = getCookie("mycookie");
                        c_array = cook.split(",");
                                          
                        if(c_array.indexOf(tmp_id) == -1){
                            itemsarray.push(tmp_id);
                            console.log('added');
                            document.cookie="mycookie=" + itemsarray;
                        }
                        else{
                            console.log('no');
                            delete_cookie("mycookie");
                            c_array.splice(c_array.indexOf(tmp_id),1);
                            document.cookie="mycookie=" + c_array;
                          }
                    });
                      
                    $('#views').html(itemsarray+' ');
                    
                });

                function getCookie(cname) {
                    var name = cname + "=";
                    var ca = document.cookie.split(';');
                    for(var i = 0; i <ca.length; i++) {
                        var c = ca[i];
                        while (c.charAt(0)==' ') {
                            c = c.substring(1);
                        }
                        if (c.indexOf(name) == 0) {
                            return c.substring(name.length,c.length);
                        }
                    }
                    return "";
                }
                var delete_cookie = function(name) {
                    document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                    console.log('successfully deleted');
                };
                $("#btnclear").click(function(){
                    delete_cookie("mycookie");
                });

            });

        </script>
    </head>

    <body>
    

<input type="button" id="btnclear" value="clear" />

    <ul id='question'>
        <!-- <li> <a href="javascript:void(0);" data-stateName=1 id=1>1</a> </li>

        <li> <a href="javascript:void(0);" data-stateName=2 id=2>2</a> </li>

        <li> <a href="javascript:void(0);" data-stateName=3 id=3>3</a> </li> -->


        <li> <input type='checkbox' data-stateName=1 id=1 <?php if(in_array(1,$array)) echo 'checked'?>> </li>
        <li> <input type='checkbox' data-stateName=2 id=2 <?php if(in_array(2,$array)) echo 'checked'?>> </li>
        <li> <input type='checkbox' data-stateName=3 id=3 <?php if(in_array(3,$array)) echo 'checked'?>> </li>

    </ul>

    <div id='views'>


    

    </div>
    </body>
    </html>
