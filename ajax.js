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


    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    $("#submitButton").click(function () {

        var errorMessage = "";
        var fieldsMissing = "";

        if ($("#email").val() == "") {
            fieldsMissing += "<br>Email";
        }

        if ($("#phone").val() == "") {
            fieldsMissing += "<br>Phone";
        }

        if ($("#password").val() == "") {
            fieldsMissing += "<br>Password";
        }

        if ($("#passwordConfirmed").val() == "") {
            fieldsMissing += "<br>Confirmed password";
        }

        if (fieldsMissing != "") {
            errorMessage += "<p>the following field(s) are missing:</p>" + fieldsMissing;
        }

        if (isEmail($("#email").val()) == false) {

            errorMessage += "<p>your email is not valid</p>";

        }

        if ($.isNumeric($("#phone").val()) == false) {
            errorMessage += "<p>your phone number is not numeric</p>"
        }

        if ($("#password").val() != $("#passwordConfirmed").val()) {
            errorMessage += "<p>your passwords do not match</p>"
        }

        if (errorMessage != "") {
            $("#errorMessage").html(errorMessage);
        } else {

            $.post("http://localhost/email.php", { email: $("#email").val(), password: $("#password").val() }, function (data) {
                $("#successMessage").html(data);
            });

            $("#successMessage").show();
            $("#errorMessage").hide();
        }

    });
