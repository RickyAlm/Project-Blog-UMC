const btnSendEmail = $("#btn_send_email");
let emailMsg = $("#email_msg");
let emailSubject = $("#email_subject");

btnSendEmail.click(function () {
    btnSendEmail.prop("disabled", true);

    setTimeout(function () {
        btnSendEmail.prop("disabled", false);
    }, 5000);

    if(emailSubject.val() === "") {
        emailMsg.css("border", "none");
        emailSubject.css("border", "2px solid red");
        emailSubject.attr("placeholder", "INSIRA O VALOR DO CAMPO");
        return;
    }
    else if (emailMsg.val() === "") {
        emailSubject.css("border", "none");
        emailMsg.css("border", "2px solid red");
        emailMsg.attr("placeholder", "INSIRA O VALOR DO CAMPO");
        return;
    }
    else {
        emailMsg.css("border", "none");
        emailSubject.css("border", "none");
        emailSubject.attr("placeholder", "");
        emailMsg.attr("placeholder", "");

        $.ajax({
            url: '../assets/php/send_email.php',
            type: 'POST',
            data: {
                email_subject: emailSubject.val(),
                email_msg: emailMsg.val(),
            },
            success: function (data) {
                console.warn(data);
                btnSendEmail.prop("disabled", true);
                btnSendEmail.css("background-color", "green");
                btnSendEmail.text("Email enviado com sucesso!");
            }
        })
    }
});