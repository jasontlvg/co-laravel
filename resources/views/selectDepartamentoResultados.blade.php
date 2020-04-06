<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title><script src="https://kit.fontawesome.com/02ba78dad6.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300&display=swap" rel="stylesheet">
    <link href="/css/selectDepartamentosRes.css" rel="stylesheet"></head>
<body>
<div class="wrap">
    <header class="header" id="header">
        <div class="header__brand"><a class="header__brand__container" href="/"><i class="header__brand__container__logo fas fa-bolt"></i>
                <h2 class="header__brand__container__title">GEMINI</h2></a></div>
        <nav class="header__nav">
            <h2 class="header__nav__title">Navegación </h2>
            <ul class="header__nav__ul">
                <li class="header__nav__ul__li"><a class="header__nav__ul__li__a" href="/empresas.html"> <i class="header__nav__ul__li__a__icon header__nav__ul__li__a__icon--1 fas fa-building"></i>
                        <p class="header__nav__ul__li__a__title">Empresas</p></a></li>
                <li class="header__nav__ul__li"><a class="header__nav__ul__li__a" href="/empleados.html"> <i class="header__nav__ul__li__a__icon fas fa-users"></i>
                        <p class="header__nav__ul__li__a__title">Empleados</p></a></li>
                <li class="header__nav__ul__li"><a class="header__nav__ul__li__a" href="/departamentos.html"> <i class="header__nav__ul__li__a__icon fas fa-layer-group"></i>
                        <p class="header__nav__ul__li__a__title">Departamentos</p></a></li>
                <li class="header__nav__ul__li"><a class="header__nav__ul__li__a" href="/resultados.html"> <i class="header__nav__ul__li__a__icon fas fa-book-reader"></i>
                        <p class="header__nav__ul__li__a__title">Resultados</p></a></li>
                <li class="header__nav__ul__li"><a class="header__nav__ul__li__a header__nav__ul__li__a--off" href="#"> <i class="header__nav__ul__li__a__icon header__nav__ul__li__a__icon--off fas fa-power-off"></i>
                        <p class="header__nav__ul__li__a__title header__nav__ul__li__a__title--off">Cerrar Sesion</p></a></li>
            </ul>
        </nav>
    </header>
    <main class="main" id="main">
        <div class="main__header"><i class="fas fa-bars" id="toggleButton"></i></div>
        <div class="main__content" id="main__content">
            <div class="search"><select id="select">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="opel">Opel</option>
                    <option value="audi" selected="selected">Audi</option>
                </select>
                <button id="getSelect">Buscar</button>
            </div>
            <div class="container">
                <div class="containers"><div id="chartdiv"></div></div>
            </div>
        </div>
    </main>
</div>
<script type="text/javascript" src="/js/selectDepartamentosRes.js"></script></body>
<script>
    let x= [{
        "country": "P.1",
        "litres": 500,
        "subData": [{ name: "A", value: 200 }, { name: "B", value: 150 }, { name: "C", value: 100 }, { name: "D", value: 50 }]
    }, {
        "country": "2",
        "litres": 300,
        "subData": [{ name: "A", value: 150 }, { name: "B", value: 100 }, { name: "C", value: 50 }]
    }, {
        "country": "Ireland",
        "litres": 200,
        "subData": [{ name: "A", value: 110 }, { name: "B", value: 60 }, { name: "C", value: 30 }]
    }, {
        "country": "Germany",
        "litres": 150,
        "subData": [{ name: "A", value: 80 }, { name: "B", value: 40 }, { name: "C", value: 30 }]
    }, {
        "country": "Australia",
        "litres": 140,
        "subData": [{ name: "A", value: 90 }, { name: "B", value: 40 }, { name: "C", value: 10 }]
    }, {
        "country": "Austria",
        "litres": 120,
        "subData": [{ name: "A", value: 60 }, { name: "B", value: 30 }, { name: "C", value: 30 }]
    }];
    chart.data = x;
</script>
</html>
