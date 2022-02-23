$(document).ready(function () {


//Search na blogu - bez logovanja
//     $(document).on('click', "#btnSearch", function () {
    $('#btnSearch').click(function () {
        // alert('Poydrav');
        //console.log("Greska");
        $unos = $('input[name="search"]').val();
        $ispis = $('#ispis');
        // alert($unos);
        //console.log($unos);
        $.ajax({
            url: baseUrl + '/search',
            type: 'POST',
            data: {unos: $unos, _token: token},
            dataType: 'json',
            success: function (data, xhr) {
                // alert(data);
                console.log(xhr);
                $ispis.html('');
                $ispis.html(data);
                //$ispis.html(showNews(data));
            },
            error: function (xhr, status, error) {
                // alert(xhr + " " + status + " " + error);
                console.log("Greska");
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    });

    //Search na blogu - bloger
    $('#btnSearchBloger').click(function () {
        // alert('Poydrav');
        //console.log("Greska");
        $unos = $('input[name="searchBloger"]').val();
        $ispis = $('#ispis');
        alert($unos);
        //console.log($unos);
        $.ajax({
            url: baseUrl + '/searchBlog',
            type: 'POST',
            data: {unos: $unos, _token: token},
            dataType: 'json',
            success: function (data, xhr) {
                // alert(data);
                console.log(xhr);
                $ispis.html('');
                $ispis.html(data);
                //$ispis.html(showNews(data));
            },
            error: function (xhr, status, error) {
                // alert(xhr + " " + status + " " + error);
                console.log("Greska");
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    });

//Prikaz termina koji nisu zakazani za odabrani datum - admin panel

    $('#datum').change(function () {

        $unos = $('#datum').val();
        $ispis = $('#ddlTermini');
        //$ispis.html("");
        //$ispis.html("Poydrav");

        //alert($ispis);
        //console.log($ispis);
        $.ajax({
            url: baseUrl + '/adminPanel_zakazano_insert_ajax',
            type: 'POST',
            data: {unos: $unos, _token: token},
            dataType:'json',
            success: function (data, xhr) {
                //alert (data);
                console.log(xhr);
                $ispis.html('');
                $ispis.html(data);
                $ispis.prop('disabled', false);
                //$ispis.html(showNews(data));
            },
            error: function (xhr, status, error) {
                // alert(xhr + " " + status + " " + error);
                console.log("Greska");
                console.log(xhr);
                console.log(status);
                console.log(error);
            }

        });
    });
 //Prikaz termina koji nisu zakazani za odabrani datum - zaposleni
    $('#datum').change(function () {

        $unos = $('#datum').val();
        $ispis = $('#ddlTermini');
        //$ispis.html("");
        //$ispis.html("Poydrav");

        //alert($ispis);
        //console.log($ispis);
        $.ajax({
            url: baseUrl + '/zakazi_ajax',
            type: 'POST',
            data: {unos: $unos, _token: token},
            dataType:'json',
            success: function (data, xhr) {
                //alert (data);
                console.log(xhr);
                $ispis.html('');
                $ispis.html(data);
                $ispis.prop('disabled', false);
                //$ispis.html(showNews(data));
            },
            error: function (xhr, status, error) {
                // alert(xhr + " " + status + " " + error);
                console.log("Greska");
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    });

    //Prikaz termina koji nisu zakazani za odabrani datum - korisnik
    $('#datum').change(function () {

        $unos = $('#datum').val();
        $ispis = $('#ddlTermini');
        //$ispis.html("");
        //$ispis.html("Poydrav");

        //alert($ispis);
        //console.log($ispis);
        $.ajax({
            url: baseUrl + '/zakazati_ajax',
            type: 'POST',
            data: {unos: $unos, _token: token},
            dataType:'json',
            success: function (data, xhr) {
                //alert (data);
                console.log(xhr);
                $ispis.html('');
                $ispis.html(data);
                $ispis.prop('disabled', false);
                //$ispis.html(showNews(data));
            },
            error: function (xhr, status, error) {
                // alert(xhr + " " + status + " " + error);
                console.log("Greska");
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    });


//Filtriranje datuma termina - admin strani - zakazani termini

    $('#sortByDateAP').change(function () {

        $unos = $('input[name="sortByDateAP"]').val();
        // alert($unos);
        $ispis = $("#ispis");
        // console.log($unos);

        $.ajax({
            url: baseUrl + '/sortByDate_zakazanoA',
            type: 'POST',
            data: {unos: $unos, _token: token},
            dataType: 'json',
            success: function (data, xhr) {
                // alert(data);
                console.log("Upseh!");
                // console.log(xhr);
                // console.log(data);
                $ispis.html("");
                $ispis.html(data);
            },
            error: function (xhr, status, error) {
                console.log("Greska!");
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    });

    //Filtriranje datuma termina - admin strani - otkazane termine

    $('#sortByDateOtkazane').change(function () {

        $unos = $('input[name="sortByDateOtkazane"]').val();
        // alert($unos);
        $ispis = $("#ispis");
        // console.log($unos);

        $.ajax({
            url: baseUrl + '/sortByDate_otkazanoA',
            type: 'POST',
            data: {unos: $unos, _token: token},
            dataType: 'json',
            success: function (data, xhr) {
                // alert(data);
                console.log("Upseh!");
                // console.log(xhr);
                // console.log(data);
                $ispis.html("");
                $ispis.html(data);
            },
            error: function (xhr, status, error) {
                console.log("Greska!");
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    });

    //Filtriranje datuma termina - za zaposlene - zakazani termini
    $('#sortByDate').change(function () {

        $unos = $('input[name="sortByDate"]').val();
        // alert($unos);
        $ispis = $("#ispis");
        // console.log($unos);

        $.ajax({
            url: baseUrl + '/sortByDate_zakazanoZ',
            type: 'POST',
            data: {unos: $unos, _token: token},
            dataType: 'json',
            success: function (data, xhr) {
                // alert(data);
                console.log("Upseh!");
                // console.log(xhr);
                // console.log(data);
                $ispis.html("");
                $ispis.html(data);
            },
            error: function (xhr, status, error) {
                // alert(data);
                console.log("Greska!");
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    });

    //Filtriranje datuma termina - za zaposlene - otkazani termini

    $('#sortByDateOtkazane').change(function () {

        $unos = $('input[name="sortByDateOtkazane"]').val();
        // alert($unos);
        $ispis = $("#ispis");
        // console.log($unos);

        $.ajax({
            url: baseUrl + '/sortByDate_otkazanoZ',
            type: 'POST',
            data: {unos: $unos, _token: token},
            dataType: 'json',
            success: function (data, xhr) {
                // alert(data);
                console.log("Upseh!");
                // console.log(xhr);
                // console.log(data);
                $ispis.html("");
                $ispis.html(data);
            },
            error: function (xhr, status, error) {
                // alert(data);
                console.log("Greska!");
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    });

    //Filtriranje datuma bloga - admin strani - blog
    $('#sortByDateBlogAP').change(function () {

        $unos = $('input[name="sortByDateBlogAP"]').val();
        // alert($unos);
        $ispis = $("#ispis");
        // console.log($unos);

        $.ajax({
            url: baseUrl + '/sortByDate_blog',
            type: 'POST',
            data: {unos: $unos, _token: token},
            dataType: 'json',
            success: function (data, xhr) {
                // alert(data);
                console.log("Upseh!");
                // console.log(xhr);
                // console.log(data);
                $ispis.html("");
                $ispis.html(data);
            },
            error: function (xhr, status, error) {
                console.log("Greska!");
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    });


    //Filtriranje datuma bloga - bloger
    $('#sortByDateBlog').change(function () {

        $unos = $('input[name="sortByDateBlog"]').val();
        // alert($unos);
        $ispis = $("#ispis");
        // console.log($unos);

        $.ajax({
            url: baseUrl + '/sortByDateBlog',
            type: 'POST',
            data: {unos: $unos, _token: token},
            dataType: 'json',
            success: function (data, xhr) {
                // alert(data);
                console.log("Upseh!");
                // console.log(xhr);
                // console.log(data);
                $ispis.html("");
                $ispis.html(data);
            },
            error: function (xhr, status, error) {
                console.log("Greska!");
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    });
});

