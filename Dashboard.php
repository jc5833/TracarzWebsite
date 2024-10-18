<?php
    session_start();
    $user = $_SESSION['user'];
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
            <h3 class="dashboard_logo" id="dashboard_logo">Tracarz</h3>
            <div class="dashboard_sidebar_user">
                <img src="./Images/User/charlesdeluvio-K4mSJ7kc0As-unsplash.jpg" alt="User Image" id="UserImage">
                <span>Welcome, User!</span>
            </div>
            <div class="dashboard_sidebar_menus">
                <ul class="dashboard_lists">
                    <li class="menuactive">
                        <a href="#"><i class="fa-solid fa-table-columns Menuicons"></i><span class="MenuText">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-users Menuicons"></i><span class="MenuText">Users</span></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="dashboard_content_container" id="dashboard_content_container">
            <div class="dashboard-content_topnav">
                <a href="#" id="dashboard_toggleButton"><i class="fa-solid fa-bars"></i></a>
                <a href="Login.php" id="LogOutButton"><i class="fa-solid fa-power-off"></i> Log Out</a>
            </div>

            <div class="dashboard_content">
                <div class="car-form">
                    <h3>Add a New Car</h3>
                    <form id="carForm">
                        <input type="text" placeholder="Make" id="make" required><br>
                        <input type="text" placeholder="Model" id="model" required><br>
                        <input type="text" placeholder="Color" id="color" required><br>
                        <input type="number" placeholder="Mileage" id="mileage" required><br>
                        <input type="file" id="carImage" accept="image/*" required><br>
                        <button type="submit">Add Car</button>
                    </form>
                </div>

                <div class="dashboard_content_main" id="carContainer">
                    <h3>Cars Added</h3>
                    <div class="box-container" id="boxContainer"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var sideBarIsOpen = true;
        const dashboard_sidebar = document.getElementById('dashboard_sidebar');
        const dashboard_content_container = document.getElementById('dashboard_content_container');
        const dashboard_toggleButton = document.getElementById('dashboard_toggleButton');
        const dashboard_logo = document.getElementById('dashboard_logo');
        const UserImage = document.getElementById('UserImage');

        dashboard_toggleButton.addEventListener('click', (event) => {
            event.preventDefault();
            if (sideBarIsOpen) {
                dashboard_sidebar.style.width = '10%';
                dashboard_content_container.style.width = '90%';
                dashboard_logo.style.fontSize = '60px';
                UserImage.style.width = '60px';
                document.querySelectorAll('.MenuText').forEach(icon => icon.style.display = 'none');
                sideBarIsOpen = false;
            } else {
                dashboard_sidebar.style.width = '20%';
                dashboard_content_container.style.width = '80%';
                dashboard_logo.style.fontSize = '80px';
                UserImage.style.width = '80px';
                document.querySelectorAll('.MenuText').forEach(icon => icon.style.display = 'inline-block');
                sideBarIsOpen = true;
            }
        });

        const carForm = document.getElementById('carForm');
        const boxContainer = document.getElementById('boxContainer');

        carForm.addEventListener('submit', (event) => {
            event.preventDefault(); 

            const make = document.getElementById('make').value;
            const model = document.getElementById('model').value;
            const color = document.getElementById('color').value;
            const mileage = document.getElementById('mileage').value;
            const carImage = document.getElementById('carImage').files[0];

            const carBox = document.createElement('div');
            carBox.classList.add('box');

            const reader = new FileReader();
            reader.readAsDataURL(carImage);
            reader.onload = function (e) {
                carBox.innerHTML = `
                    <img src="${e.target.result}" alt="Car Image" style="width:100%; height:auto;">
                    <p><strong>Make:</strong> ${make}</p>
                    <p><strong>Model:</strong> ${model}</p>
                    <p><strong>Color:</strong> ${color}</p>
                    <p><strong>Mileage:</strong> ${mileage} miles</p>
                `;
                boxContainer.appendChild(carBox);
            };

            carForm.reset();
        });
    </script>

    <style>
        .car-form {
            margin: 20px;
        }

        .car-form input, .car-form button {
            margin: 5px 0;
            padding: 10px;
            width: 100%;
        }

        .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .box {
            width: 200px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</body>
</html>
