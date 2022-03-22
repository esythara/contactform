<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if ($_POST['type'] == "SQLsubmit") {



  $sql = "INSERT INTO contact
          VALUES (fname, lname, address, email, telephone, subject, message)
                 ('" . $_POST['fname'] . "','"
                     . $_POST['lname'] . "','"
                     . $_POST['address'] . "','"
                     . $_POST['email'] . "','"
                     . $_POST['tel'] . "','"
                     . $_POST['subject'] . "','"
                     . $_POST['msg'] . "')";
echo $sql;


} elseif($_POST['type'] == "regularSubmit") {
  $array = [
    'fname' => $_POST['fname'],
    'lname' => $_POST['lname'],
    'address' => $_POST['address'],
    'email' => $_POST['email'],
    'tel' => $_POST['tel'],
    'subject' => $_POST['subject'],
    'msg' => $_POST['msg']
  ];

  echo print_r($array);
}
exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="unique">
    <meta name="googlebot" content="design-wow">
    <meta name="author" content="Ella Marchbanks">
    <script src="https://kit.fontawesome.com/48a83c2de1.js" crossorigin="anonymous"></script>
    <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js></script>
    <title>ZZZ_Test</title>
</head>
<style>
    body {
        background-color: white;
        margin: 0;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        color: #302f2f;
    }

    .nav {
        display: flex;
        justify-content: center;
        position: fixed;
        width: 100%;
        background-color: white;
        border-bottom: 2px solid #1abc9c;
        z-index: 9999;
    }

    .row {
        padding: 20px 0;
        display: flex;
        justify-content: space-between;
        width: 250px;
    }

    .item {
        font-size: 25px;
    }

    .item:hover {
        color: #1abc9c;
        transition: color 0.3s ease;
        cursor: pointer;
    }

    .header {
        padding-top: 125px;
        padding-bottom: 125px;
        justify-content: center;
        display: flex;
        text-align: center;
        background: #1abc9c;
        color: white;
        font-size: 20px;
    }

    .box {
        display: flex;
        flex-direction: column;
        width: 800px;
    }

    .container {
        width: 100%;
        margin-top: -56px;
        display: flex;
        justify-content: center;
    }

    .wrapper {
        width: 1100px;
        padding-top: 4px;
        background-color: white;
        top: 417px;
        left: 428px;
        border-radius: 6px;
    }

    .content {
        position: relative;
        width: 300px;
        height: 200px;
        margin-left: 30px;
        margin-top: 30px;
        padding-left: 20px;
        padding-top: 5px;
        background-color: #FEFEFE;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .content #btn {
        border: none;
        border-radius: 6px;
        padding: 15px;
        margin-left: 50px;
        background-color: #1abc9c;
        font-weight: bold;
        color: white;
    }

    .content #btn:hover {
        background-color: #107561;
        transition: background-color 0.3s ease;
    }

    .form {
        background-color: #FEFEFE;
        position: relative;
        width: 600px;
        height: 622px;
        bottom: 439px;
        right: 30px;
        float: right;
        padding-right: 30px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .form #btn2,
    #btn3 {
        border: none;
        border-radius: 6px;
        padding: 15px;
        margin-left: 30px;
        margin-top: 20px;
        background-color: #1abc9c;
        font-weight: bold;
        color: white;
    }

    .form #btn2:hover,
    #btn3:hover {
        background-color: #107561;
        transition: background-color 0.3s ease;
    }

    .name {
        width: 242px;
        padding-top: 15px;
        padding-bottom: 15px;
        padding-left: 20px;
        margin-left: 30px;
    }

    .email {
        width: 242px;
        padding-top: 15px;
        padding-bottom: 15px;
        padding-left: 20px;
        margin-left: 30px;
    }

    .subject {
        padding-top: 15px;
        padding-bottom: 15px;
        padding-left: 20px;
        width: 544px;
        margin-top: 20px;
        margin-left: 30px;

    }

    .message {
        padding-top: 15px;
        padding-bottom: 15px;
        padding-left: 20px;
        margin-top: 20px;
        margin-left: 30px;
    }

    .address {
        padding: 15px 0 15px 20px;
        margin-top: 20px;
        margin-left: 30px;
        width: 244px
    }

    .tel {
        padding: 15px 0 15px 20px;
        margin-top: 20px;
        margin-left: 30px;
        width: 244px;
    }

    .border {
        border-radius: 6px;
        border: 1px grey solid;
    }

    .modal {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0);
        transition: 200ms ease-in-out;
        border: 1px solid black;
        border-radius: 10px;
        z-index: 10;
        background-color: white;
        width: 500px;
        max-width: 80%;
    }

    .modal.active {
        transform: translate(-50%, -50%) scale(1);
    }

    .modal-header {
        padding: 10px 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid black;
    }

    .modal-header .title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .modal-header .close-button {
        cursor: pointer;
        border: none;
        outline: none;
        background: none;
        font-size: 1.25rem;
        font-weight: bold;
    }

    .modal-body {
        padding: 10px 15px;
    }

    #overlay {
        position: fixed;
        opacity: 0;
        transition: 200ms ease-in-out;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, .5);
        pointer-events: none;
    }

    #overlay.active {
        opacity: 1;
        pointer-events: all;
    }

    #errorMessage {
        color: red;
        font-size: 90% !important;
    }

    #successMessage {
        color: green;
        font-size: 90% !important;
        display: none;
        margin-bottom: 20px;
    }

    .footnav {
        display: flex;
        justify-content: center;
        padding-top: 100px;
        padding-bottom: 100px;
        width: 100%;
        background-color: #302f2f;
    }

    .foothead {
        text-align: center;
        color: white !important;
    }
</style>

<body>
    <div class="nav">
        <div class="row">
            <div class="item">Home</div>
            <div class="item">About</div>
            <div class="item">Contact</div>
        </div>
    </div>
    <div class="header">
        <div class="box">
            <h1>CONTACT US ABOUT ELLA'S SOFTWARE</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore
                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat
                nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit
                anim id est laborum.</p>
        </div>
    </div>

    <div class="container">
        <div class="wrapper">
            <div class="content">
                <h3>Call us directly at</h3>
                <h3 style="color:#1abc9c">123 456 78900</h3>
                <h4 id="fourhover" style="color:#1abc9c">See all numbers and locations</h4>
            </div>
            <div class="content">
                <h3>Chat with our development team</h3>
                <button id="btn">Chat with development</button>
            </div>
            <form method="post" class="form" id="contactForm">
                <div class="formcontent">
                    <h2 style="padding-left: 30px;">Get in touch</h2>
                    <input class="name border" id="fname" type="text" name="fname" placeholder="First Name" required>
                    <input class="name border" id="lname" type="text" name="lname" placeholder="Last Name" required>
                    <input class="address border" id="address" type="address" name="address" placeholder="Address"
                        required>
                    <input class="email border" id="email" type="email" name="email" placeholder="Email" required>
                    <input class="tel border" id="tel" type="tel" name="tel" placeholder="Telephone" required>
                    <input class="subject border" id="subject" type="text" name="subject" placeholder="Subject"
                        required>
                    <textarea class="message border" id="msg" name="msg" placeholder="Message" rows="11"
                        cols="72"></textarea>
                    <button id="btn2" data-modal-target="#modal">Get SQL data</button>
                    <button id="btn3" data-modal-target="#modal">Send Message</button>
                    <label>
                        <input type="checkbox" name="subscribe" value="yes">Daily Newsletter</label>
                    </label>
                </div>
            </form>
        </div>
    </div>
    </div>
    <div class="modal" id="modal">
        <div class="modal-header">
            <div class="title">Example Modal</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body" method="post">
        </div>
    </div>
    <div id="overlay"></div>
    <div class="footnav">
        <div class="foothead">
            <h1>ZZZ_Test</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et
                dolore</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et
                dolore</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et
                dolore</p>
                <hr>
        </div>
    </div>
    <script type="text/javascript">
        const openModalButtons = document.querySelectorAll('[data-modal-target]')
        const closeModalButtons = document.querySelectorAll('[data-close-button]')
        const overlay = document.getElementById('overlay')

        openModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modal = document.querySelector(button.dataset.modalTarget)
                openModal(modal)
            })
        })

        overlay.addEventListener('click', () => {
            const modals = document.querySelectorAll('.modal.active')
            modals.forEach(modal => {
                closeModal(modal)
            })
        })

        closeModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modal = button.closest('.modal')
                closeModal(modal)
            })
        })

        function openModal(modal) {
            if (modal == null) return
            modal.classList.add('active')
            overlay.classList.add('active')
        }

        function closeModal(modal) {
            if (modal == null) return
            modal.classList.remove('active')
            overlay.classList.remove('active')
        };

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        function validCharForStreetAddress(c) {
            return ",#-/ !@$%^*(){}|[]\\".indexOf(c) >= 0;
        };

        $(document).on('click', '#btn2', function (e) {
            e.preventDefault();
            var formData = {
                fname: $("#fname").val(),
                lname: $("#lname").val(),
                address: $("#address").val(),
                email: $("#email").val(),
                tel: $("#tel").val(),
                subject: $("#subject").val(),
                msg: $("#msg").val(),
                type: "SQLsubmit"
            };
            $.ajax({
                type: "POST",
                url: "new.php",
                data: formData
            })
                .done(function (data) {
                    console.log(data);
                    $('.modal-body').html(data);
                })
        });

        $(document).on('click', '#btn3', function (e) {
            e.preventDefault();
            var formData = {
                fname: $("#fname").val(),
                lname: $("#lname").val(),
                address: $("#address").val(),
                email: $("#email").val(),
                tel: $("#tel").val(),
                subject: $("#subject").val(),
                msg: $("#msg").val(),
                type: "regularSubmit"
            };
            $.ajax({
                type: "POST",
                url: "new.php",
                data: formData,
            }).done(function (data) {
                console.log(data);
                $('.modal-body').html(data);
            })

            function objectifyForm(formArray) {
                //serialize data function
                var returnArray = {};
                for (var i = 0; i < formArray.length; i++) {
                    returnArray[formArray[i]['name']] = formArray[i]['value'];
                }
                return returnArray;
            }

            $(document).ready(function () {
                $("form").submit(function (event) {
                    var formData = {
                        fname: $("#fname").val(),
                        lname: $("#lname").val(),
                        address: $("#address").val(),
                        email: $("#email").val(),
                        tel: $("#tel").val(),
                        subject: $("#subject").val(),
                        message: $("#msg").val(),
                        type: "SQLsubmit"
                    };
                    $.ajax({
                        type: "POST",
                        url: "new.php",
                        data: formData,
                    }).done(function (data) {
                        console.log(data);
                    });
                });
            });
        });
    </script>
</body>

</html>
