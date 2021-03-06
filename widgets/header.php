<?php

function widget_header($array)
{
    $m = $array[0] == true ? "style='margin-top: -18px'" : '';
    $links = array(
        'item?created=high'=>'КАТАЛОГ',
        'itemChildren?created=high'=>'ДЕТЯМ',
        'blog'=>'БЛОГ',
        'review'=>'ОТЗЫВЫ',
        'bonus'=>'БОНУСЫ',
        'contact'=>'КОНТАКТЫ'
    );
        $sortBlock = 'display:none';
        if ($array[2] == 'catalog') {
            $sortBlock = '';
            $price = $_GET['price'] == 'low' ? "high" : "low";
            $priceI = $_GET['price'] == 'low' ? "&uparrow;" : "&darr;";
            $created = $_GET['created'] == 'low' ? "high" : "low";
            $createdI = $_GET['created'] == 'low' ? "&uparrow;" : "&darr;";
            $rank = $_GET['rank'] == 'low' ? "high" : "low";
            $rankI = $_GET['rank'] == 'low' ? "&uparrow;" : "&darr;";
        }
        echo "
        <div class='navbar'>
            <div class='navbar-inner'>
                <div class='container'>
                    <a href='/' class='brand'>
                        <img src='/public/images/logo/TIRA_Bridal_logo.svg' alt='Logo' />
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type='button' class='btn btn-navbar' data-toggle='collapse' data-target='.nav-collapse'>
                        <i class='icon-menu'></i>
                    </button>
                    <!-- Main navigation -->
                    <div class='nav-collapse collapse pull-right'>
                        <ul class='nav' id='top-navigation'>
                            <li class='active'><a href='/'>Главная</a></li>
                            <li><a href='/#service'>Услуги</a></li>
                            <li><a href='/catalog'>Каталог</a></li>
                            <li><a href='/#about'>О нас</a></li>
                            <li><a href='/#clients'>Отзывы</a></li>
                            <li><a href='/#contact'>Контакты</a></li>
                            <li><a href='/blog'>Блог</a></li>
                            <li><a href='/bonus'>Бонус</a></li>
                        </ul>
                    </div>
                    <div class='nav-collapse collapse pull-right' style='{$sortBlock}'>
                        <ul class='nav' id='top-navigation'>
                            <li><a href='/catalog'>Сортировать:</a></li>
                            <li><a href='/catalog?price={$price}'>Цена {$priceI}</a></li>
                            <li><a href='/catalog?created={$created}'>Дата добавления {$createdI}</a></li>
                            <li><a href='/catalog?rank={$rank}'>Популярность {$rankI}</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        
        ";
//    echo "
//            <header class='FW peterriver headercont' {$m} id='top'>
//                <div class='CW header'>
//                    <a href='/' class='logo'>TIRA</a>";
//                    foreach($links as $k=>$v){
//                        $act = $k == $array[1] ? "style='background:#2C3E50'" : '';
//                        echo "<a href='/$k' $act class='animatedFast'>$v</a>";
//                    }
//            echo   "<br class='clear'>
//                </div>
//            </header>
//         ";
//     }
}

?>
