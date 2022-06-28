<?php
include("connection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TO-DO List</title>
        <style>
            *{
                margin: 0;
                padding: 0;
            }
            body
            {
                margin: 0;
                padding: 0;
                background-color: #c4c4c4;
            }
            .section{
                position: absolute;
                top: 50%;
                left:50%;
                transform: translate(-50%,-50%);
                width: 50%;
                height: auto;
                background-color: #000;
            }
            .headdiv{
                background-color: #1f1f1f;
                width: 100%;
                height: 10%;
            }
            .todo-list_list{
     
                display: flex;
                align-items: center;
                margin: 40px 0;
                font-size: 24px;
                color: #f1faee;
                cursor: pointer;
            }
            .todo-list_list input[type=checkbox]{
                opacity: 0;
                -webkit-appearance:none;
                   -moz-appearance:none;
                        appearance:none;
            }
            .todo-list_list input[type=checkbox] + .check{
                position: absolute;
                width: 25px;
                height: 25px;
                border: 2px solid #f1faee;
                transition: 0.2s;
            }
            .todo-list_list input[type=checkbox]:checked + .check{
                width: 25px;
                height: 15px;
                border-top: transparent;
                border-right: transparent;
                transform: rotate(-45deg);
            }
            .todo-list_list input[type=checkbox] ~span{
                position: relative;
                left: 40px;
                white-space: nowrap;
                transition: 0.5s;
            }
            .todo-list_list input[type=checkbox] ~span::before{
                position: absolute;
                content: "";
                top: 50%;
                left: 0;
                width: 100%;
                height: 1px;
                background: #f1faee;
                transform: scaleX(0);
                transform-origin: right;
                transition: transform 0.5s;
            }
            .todo-list_list input[type=checkbox]:checked ~span{
                color: #585b57;
            }
            .todo-list_list input[type=checkbox]:checked ~span::before{
                transform: scaleX(1);
                transform-origin: left;
            }
            .taskarea{
                width: 500px;
                height: 30px;
                margin: 10px 5px;
                border-radius: 50px;
            }
            .add_button{
                width: 50px;
            }
        </style>
    </head>
    <body>
        <section class="section">
            <div class="container">
                <div class="headdiv">
                    <form action="#" method="post">
                    <input type="text" class="taskarea" name="task" placeholder="add your task">
                    <input type="submit" class="add_button" name="addbutton" value="ADD TASK">
                    </form>    
                </div>
                <div class="body-div">
                    
                    <?php
                        if($_POST['addbutton']){
                            $task=$_POST['task'];
                            $query="INSERT INTO todolist (task) VALUES ('$task')";
                            $data=mysqli_query($connection,$query);
                            $query4 ="select * from todolist";
                            $data4 =mysqli_query($connection,$query4);
                            $rowtable4= mysqli_num_rows($data4);
                            //echo $rowtable4."<br>";
                             if($rowtable4!=0){
                            while($res=mysqli_fetch_assoc($data4)){
                                echo " <label class='todo-list_list'>
                                    <input type='checkbox' name='' id=''>
                                    <i class='check'></i>
                                    <span>".$res['sno'].". ".$res['task']."</span>
                                    </label>";
                        }
                             }
                        }
                    ?>
                    
                </div>
            </div>
        </section>
    </body>
</html>