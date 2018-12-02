<?php
    require_once "ica1-util.php";
    $status = "Status: ";
    
    if(!is_null(filter_input(INPUT_GET, 'Name')) 
            && strlen(filter_input(INPUT_GET, 'Name')) > 0
            && !is_null(filter_input(INPUT_GET, 'Hobby')) 
            && strlen(filter_input(INPUT_GET, 'Hobby')) > 0) 
    {
        $name = strip_tags($_GET['Name']);
        $hobby = strip_tags($_GET['Hobby']);
        $howmuch = strip_tags($_GET['HowMuch']);
        
        $hobbyOutput = $name;
        for($i = 0; $i < $howmuch; ++$i) 
        {
            $hobbyOutput .= " really ";
        }
        $hobbyOutput .= "likes $hobby";
        $status .= "+GetData";
    }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>ICA01_PHP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript"></script>        
        <link href="../../general-css.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="jumbotron text-center"><h1>ICA01 - PHP Intro</h1></div>
        <div class="container">
            <?php
                $output = "";
                $output .= "Your IP address is : ";
                $output .= $_SERVER['REMOTE_ADDR'];
                $output .= "<br/>";
                
                $output .= "Found: ";
                $output .= count($_GET);
                $output .= " entry in the \$_GET";
                $output .= "<br/>";
                
                $output .= "Found: ";
                $output .= count($_POST);
                $output .= " entry in the \$_POST";
                $output .= "<br/>";
                
                //echo $_SERVER['REMOTE_ADDR']; 
                $status .= "+ServerInfo";
                echo $output;
            ?>                                    
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-sm-offset-4">
            <?php 
                $list = "<ul>";
                foreach ($_GET as $key => $value) 
                {
                    $list .= "<li>$key = $value </li>";
                }
                $list .= "</ul>";  
                $status .= "+ShowArray";
                echo $list;
            ?>     
                </div>
            </div>
        </div>
        <div class="container">
            <?php
                $array = GenerateNumbers();
                $status .= "+GenerateNumbers+MakeList";
                echo MakeList($array);
            ?>
        </div>
        <div class="container">
            <form name="ica1Form" action="" method="get">
                    <div class="row">
                        <div class="col-sm-3 col-sm-offset-3">
                            Name:
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="Name" value="<?php echo $name ?>">
                        </div>                
                    </div>  
                    <div class="row">
                        <div class="col-sm-3 col-sm-offset-3">
                            Hobby:
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="Hobby" value="<?php echo $hobby ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-sm-offset-3">
                            How Much I Like It:
                        </div>
                        <div class="col-sm-3">
                            <input type="range" name="HowMuch" min="1" max="13" value="8">
                        </div>
                    </div>
                    <div class="row text-center">
                        <button name="submit" id="btnGetCall" type="submit" value="Go Now!">Call with Get</button>
                    </div>
                </form>
            </div>
        
        <div class="container text-center">
            <label><?php
                if (isset($hobbyOutput)) 
                {
                    $status .= "+ProcessForm";
                    echo $hobbyOutput;
                }
            ?></label>
        </div>
        
        <div class="container text-center">
            <?php echo $status; ?>
        </div>
        
        <div class="container-fluid text-center">
            CMPE 2500 ICA 1 by Ronald Mak<br/>
            <script>document.write('Last Modified:' + document.lastModified);</script>            
        </div>
    </body>
</html>
