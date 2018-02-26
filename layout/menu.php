<?php

$menu =[
    'Home'=>[
        'name'=>"Home page",
        'description'=>'Home page description',
        'url'=>"index.php",
        'class'=>1

    ],
    'Game'=>[
        'name'=>"Games",
        'description'=>'Home page description',
        'url'=>"games.php",
    ],
    'Logout'=>[
        'name'=>"Logout",
        'description'=>'Logkout page description',
        'url'=>"index.php?q=logout",
    ],
    'Contact'=>[
        'name'=>"Contact",
        'description'=>'contact page description',
        'url'=>"#",
    ]
];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Betting</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <?php
                 foreach ($menu as $menuKey => $menuItem)
                 {
                     ?>
                     <li class="nav-item  <?php if($active == $menuKey): echo "active" ; endif;?>">
                         <a class="nav-link" href="<?=$menuItem['url']?>"><?=$menuItem['name']?>
                             <?php if(array_key_exists('class', $menuItem)):?>
                                    <span class="sr-only">(current)</span>
                             <?php endif; ?>
                         </a>
                     </li>
                <?php
                 }
                ?>
<!---->
<!--                <li class="nav-item active">-->
<!--                    <a class="nav-link" href="index.php">Home-->
<!--                        <span class="sr-only">(current)</span>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="index.php?q=logout">LOGOUT</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="games.php">Games</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="#">Contact</a>-->
<!--                </li>-->

            </ul>
        </div>
    </div>
</nav>