<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Page Not Found</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            height: 100vh;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            font-size: 16px;
            font-family: "vazir", sans-serif;
            background: var(--P_color6);
            color: rgba(255, 255, 255, 0.8);
            overflow: hidden !important;
        }

        a {
            text-decoration: none;
        }

        .texts {
            z-index: 5;
            padding: .8rem;
            margin: .3rem;
            width: 500px;
        }

        .texts h4 {
            font-size: 1.5rem;
        }

        .Square404 {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50%;
        }

        .Square {
            width: 20vw;
            height: 20vw;
            position: absolute;
            border-radius: 1.2rem;
            background: var(--P_color1);
            box-shadow: var(--P_color2) 0 0 5px 30px,
            var(--P_color3) 0 0 10px 60px,
            var(--P_color4) 0 0 15px 90px,
            var(--P_color5) 0 0 20px 120px,
            var(--P_color6) 0 0 25px 150px;
            transform: rotateZ(-21deg);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1;
        }

        .Square h1 {
            font-size: 10vw;
            color: var(--P_color6);
            transform: translateZ(90px);
            text-shadow: 0 0 2px rgba(0, 0, 0, .6);
            user-select: none;
        }

        .btn:hover {
            color: #212529;
            background-color: #f8f9fa;
            border-color: #f8f9fa;
        }

        .btn {
            cursor: pointer;
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            border: #f8f9fa 1px solid;
            padding: .375rem .75rem;
            margin: .375rem;
            font-size: 1rem;
            border-radius: .25rem;
            color: #f8f9fa;
            transition: all .5s ease-in-out;
            user-select: none;
        }

        #search_box {
            width: 60%;
            border-radius: 10px;
            box-shadow: none;
            padding: .7rem .8rem;
            margin: 10px 0;
            background-color: rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.5);
            color: rgba(255, 255, 255, 0.5);
        }

        :root {
            --P_color1: #C2146D;
            --P_color2: #760D50;
            --P_color3: #4D0E45;
            --P_color4: #320C3B;
            --P_color5: #280C3D;
            --P_color6: #1E0D37;
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
                justify-content: space-evenly;
            }
            .Square404{
                width: 100%;
            }
            .Square{
                width: 150px;
                height: 150px;
            }
            .Square h1{
                font-size: 70px;
            }
            .texts {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="Square404" id="Square">
        <div class="Square">
            <h1>404</h1>
        </div>
    </div>

    <div class="texts">
        <h4>Oops! page not found</h4>
        <p>The page you are looking for does not exist. Go back to the main page or search.</p>
        <a href="../../index.html" class="btn">Back to Home</a>
        <label for="search_box"></label><input type="search" name="search" id="search_box" placeholder="Search">
    </div>

    <script>
        let container1 = document.getElementById('Square');
        window.onmousemove = function (e) {
            let x = -e.x / 90,
                y = -e.y / 90;

            container1.style.right = x + 'px';
            container1.style.bottom = y + 'px';
        }
        /* Mobile gyroscope */
        window.addEventListener("deviceorientation", function (e) {
            container1.style.right = e.gamma/3 + "px"
            container1.style.bottom = e.beta/3 + "px"
        })
    </script>
</body>
</html>