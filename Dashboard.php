<?php
    session_start();
    $user = ($_SESSION['user'])
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>  
    <link rel="stylesheet" href="css/Login.css">  
    <script src="https://kit.fontawesome.com/805c332ffe.js" crossorigin="anonymous"></script>
</head>
<body id="Dashboard">
    <div id="Dashboard_Main_Container">
        <div class="dashboard_sidebar" id="dashboard_sidebar">
            <h3 class="dashboard_logo" id="dashboard_logo">TBD</h3>
            <div class="dashboard_sidebar_user">
                <img src="./Images/User/charlesdeluvio-K4mSJ7kc0As-unsplash.jpg" alt="User Image" id="UserImage">
                <span>Jane Doe </span>
            </div>
            <div class="dashboard_sidebar_menus">
                <ul class="dashboard_lists">
                    <li class="menuactive">
                        <a href=""><i class="fa-solid fa-table-columns Menuicons"></i><span class="MenuText">Dashboard</span></a>
                    </li>
                    <li>
                        <a href=""><i class="fa-solid fa-table-columns Menuicons"></i><span class="MenuText">Dashboard</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="dashboard_content_container" id="dashboard_content_container">
            <div class="dashboard-content_topnav">
                <a href="" id="dashboard_toggleButton"><i class="fa-solid fa-bars"></i> </a>
                <a href="" id="LogOutButton"><i class="fa-solid fa-power-off"></i>    Log Out</a>
            </div>
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus ea laborum magnam placeat quasi,
                     mollitia doloremque odio rem nulla, sequi, repudiandae illum et. Porro iure voluptate maiores quae cupiditate nesciunt.</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        var sideBarIsOpen = true;
        dashboard_toggleButton.addEventListener('click',(event) =>{
            event.preventDefault();

            if (sideBarIsOpen) {
            dashboard_sidebar.style.width = '10%';
            dashboard_sidebar.style.transition = '0.5s all';
            dashboard_content_container.style.width = '90%';
            dashboard_logo.style.fontSize= '60px';
            UserImage.style.width= '60px';

            Menuicons = document.getElementsByClassName('MenuText');
            for (var i = 0; i < Menuicons.length; i++){
                Menuicons[i].style.display = 'none';
            }
            
            document.getElementsByName('dashboard_lists')[0].style.textAlign = 'center';                
        SideBarIsOpen = false;
            } else {
            dashboard_sidebar.style.width = '20%';
            dashboard_sidebar.style.transition = '0.5s all';
            dashboard_content_container.style.width = '80%';
            dashboard_logo.style.fontSize= '80px';
            UserImage.style.width= '80px';

            Menuicons = document.getElementsByClassName('MenuText');
            for (var i = 0; i < Menuicons.length; i++){
                Menuicons[i].style.display = 'inline-block';
            }
            
            document.getElementsByName('dashboard_lists')[0].style.textAlign = 'left';                
                SideBarIsOpen = true;
            }
        });
    </script>
</body>
</html>
