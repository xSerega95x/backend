$('form#registration').submit(function(e){
    e.preventDefault();

    let name = $('[name="reg-name"]', this).val();
    let surname =$('[name="reg-surname"]', this).val();
    let address = $('[name="reg-address"]', this).val();
    let phone = $('[name="reg-phone"]', this).val();
    let login = $('[name="reg-login"]', this).val();
    let password = $('[name="reg-password"]', this).val();
    let error = $('.error', this);

    let data = "reg-name=" + name + "&reg-surname=" + surname + "&reg-address=" + address + "&reg-phone=" + phone;
    data += "&reg-login=" + login + "&reg-password=" + password;

    $.ajax({
        type: "post",
        url: "actions/users.php",
        data: data,
        success: function(result){
            if(result == "") location.reload();
            error.text(result);
        }
    });
});

$('form#signin').submit(function(e){
    e.preventDefault();

    let login = $('[name="signin-login"]', this).val();
    let password = $('[name="signin-password"]', this).val();
    let error = $('.error', this);

    $.ajax({
        type: "post",
        url: "actions/users.php",
        data: "signin-login=" + login + "&signin-password=" + password,
        success: function(result){
            if(result == "") location.reload();
            error.text(result);
        }
    });
});

// myaccount getData
$('a[href="#myaccount"]').click(function(e){
    $.ajax({
        type: "get",
        url: "actions/users.php",
        data: "myaccount-getdata=true",
        success: function(r){
            r = JSON.parse(r);

            $('#myaccount-name').val(r["name"]);
            $('#myaccount-surname').val(r["surname"]);
            $('#myaccount-address').val(r["address"]);
            $('#myaccount-phone').val(r["phone"]);
            $('#myaccount-login').val(r["login"]);
        }
    });
});

$('form#myaccount').submit(function(e){
    e.preventDefault();

    let name = $('[name="myaccount-name"]', this).val();
    let surname =$('[name="myaccount-surname"]', this).val();
    let address = $('[name="myaccount-address"]', this).val();
    let phone = $('[name="myaccount-phone"]', this).val();
    let login = $('[name="myaccount-login"]', this).val();
    let password = $('[name="myaccount-password"]', this).val();
    let error = $('.error', this);

    let data = "myaccount-name=" + name + "&myaccount-surname=" + surname + "&myaccount-address=" + address;
    data += "&myaccount-phone=" + phone + "&myaccount-login=" + login + "&myaccount-password=" + password;

    $.ajax({
        type: "post",
        url: "actions/users.php",
        data: data,
        success: function(result){
            if(result == "") location.reload();
            error.text(result);
        }
    });
});

$('a[href="#orderstatus"]').click(function(e){
    $.ajax({
        type: "post",
        url: "actions/orders.php",
        data: "getorderstatus=true",
        success: function(result){
            $('#orderstatus tbody').empty();

            let data = JSON.parse(result);
            data.forEach(function(d){
                $('#orderstatus tbody')
                    .append('<tr>')
                    .append('<th  scope="row">' + d[0] + '</th>')
                    .append('<td>' + d[1] + '</td>')
                    .append('<td>' + d[2] + '</td>');
            });
        }
    });
});

$('.auth').click(function(e){
    e.preventDefault();
    $('a[href="#sign"]').trigger('click');
});