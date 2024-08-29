<?php
if(!(isset($_SESSION['category']))){
    echo "
        <header>
    <h1>SIGE Tutorias</h1>
    <nav>
        <ul>
            <li><a href='/entrar'>Entrar</a></li>
            <li><a href='/registar'>Registar</a></li>
        </ul>
    </nav>
    </header>
    ";
}
else{
    echo "
        <header>
    <h1>SIGE Tutorias</h1>
    <nav>
        <ul>
            <li><a href='/home'>Home</a></li>
            <li><a href='/evento'>Tutorias</a></li>
            <li> <b>".$_SESSION['category']."</b> </li>
            <li> <b><a href='/exit'> Sair</a></b> </li>
        </ul>
    </nav>
    </header>
    ";
}
?>