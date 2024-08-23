<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&family=Playfair+Display&family=Poppins:ital,wght@0,100;0,200;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', sans-serif;
            font-family: 'Playfair Display', serif;
            min-height: 100vh;
            /* font-family: 'Poppins', sans-serif; */
        }

        .footer {
            margin-top: 10%;
            background-color: #24262b;
            padding: 70px 0;
            margin-top: 5%;
            position: sticky;
            top: 100%;
        }

        .container {
            max-width: 1170px;
            margin: auto;
            margin-left: 5%;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .footer-col {
            width: 25%;
            padding: 0 15px;

            /* background-color: red; */
        }

        .footer-col h4 {
            font-size: 18px;
            color: #fff;
            text-transform: capitalize;
            margin-bottom: 35px;
            font-weight: 500;
            position: relative;
        }

        .footer-col h4::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            background-color: red;
            box-sizing: border-box;
            width: 30px;
            height: 2px;
        }

        ul {
            list-style: none;
        }

        .footer-col ul li a {
            font-size: 16px;
            text-transform: capitalize;
            color: #fff;
            font-weight: 300;
            display: block;
            text-decoration: none;
            transition: .5s ease;
        }

        .footer-col ul li a:hover {
            padding: 0 10px;
        }

        .footer-col ul li:not(:last-child) {
            margin-bottom: 10px;
        }

        .footer-col .social-links a {
            display: inline-block;
            height: 40px;
            width: 40px;
            background: grey;
            margin: 0 10px 10px 0;
            text-align: center;
            border-radius: 50%;
            line-height: 40px;
            font-size: 20px;
            transition: .5s ease;

        }

        .footer-col .social-links a:hover {
            background-color: white;
            transform: scale(1.2);
        }

        .footer-col iframe {
            width: 300px;
            height: 200px;
        }

        /* responsive */
        @media(max-width:1168px) {
            #iframe {
                width: 100%;
            }
        }

        @media(max-width:767px) {

            .footer-col {
                width: 25%;
                padding: 0 15px;
                margin-bottom: 30px;
            }

            ul li a {
                font-size: 12px;
            }

            .footer-col h4 {
                font-size: 16px;
            }

            .social-links a {
                font-size: 13px;
            }
        }

        @media(max-width:574px) {
            .footer-col {
                width: 100%;
            }

            .footer-col h4 {
                font-size: 15px;
            }

            .footer-col ul li a {
                font-size: 10px;
            }

            .social-links a {
                font-size: 11px;
            }

            .footer-col:last-child {
                margin-right: 6%;
            }
        }
    </style>
</head>

<body>





    <header>

    </header>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>
                        Contents
                    </h4>
                    <ul>
                        <li><a href="#">About us</a></li>
                        
                        <li><a href="#"> Privacy Policy</a></li>
                   
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>
                        Get Help
                    </h4>
                    <ul>
                        <li><a href="#">Location</a></li>
                        <li><a href="#">FAQ</a></li>
                      
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>
                        Follows us
                    </h4>
                    <div class="social-links">
                        <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                        <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                        <a href="#"><i class='bx bxl-twitter'></i></a>
                        <a href="#"><i class='bx bxl-linkedin'></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>
                      Location
                    </h4>
                    <ul>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14127.238417764314!2d85.3160599053235!3d27.72316426877258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1905d0074f6b%3A0x4776f1ed098b1424!2sSecurityPal%20Nepal%20Office!5e0!3m2!1sen!2snp!4v1711088274350!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>