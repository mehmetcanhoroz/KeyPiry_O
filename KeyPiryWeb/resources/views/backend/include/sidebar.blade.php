
<div class="nano">
    <div class="nano-content">
        <nav id="menu" class="nav-main" role="navigation">

            <ul class="nav nav-main">
                <li class="">
                    <a class="nav-link" href="{{route("backend.home.index")}}">
                        <i class="fas fa-home" aria-hidden="true"></i>
                        <span>Anasayfa</span>
                    </a>
                </li>

                <li class="nav-parent">
                    <a class="nav-link" href="#">
                        <i class="fas fa-list-ul" aria-hidden="true"></i>
                        <span>Katalog</span>
                    </a>
                    <ul class="nav nav-children">
                        <li>
                            <a class="nav-link" href="#">
                                Kategoriler
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="/">
                                İlanlar
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="/">
                                Yorumlar
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="/">
                                Sabit Sayfalar
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-parent">
                    <a class="nav-link" href="#">
                        <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                        <span>Tasarım</span>
                    </a>
                    <ul class="nav nav-children">
                        <li>
                            <a class="nav-link" href="/">
                                Sliderlar
                            </a>
                        </li>
                        <li class="nav-parent">
                            <a>
                                Reklamlar
                            </a>
                            <ul class="nav nav-children">
                                <li>
                                    <a class="nav-link" href="/">
                                        Reklam Alanları
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="/">
                                        Reklamlar
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="nav-link" href="/">
                                Yorumlar
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="/">
                                Sabit Sayfalar
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-parent">
                    <a class="nav-link" href="#">
                        <i class="fas fa-file-alt" aria-hidden="true"></i>
                        <span>Satışlar</span>
                    </a>
                    <ul class="nav nav-children">
                        <li class="nav-parent">
                            <a>
                                İlan Siparişleri
                            </a>
                            <ul class="nav nav-children">
                                <li>
                                    <a class="nav-link" href="/">
                                        Tamamlanan Siparişler
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="/">
                                        Onay Bekleyen Siparişler
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="/">
                                        Başarısız Siparişler
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="nav-link" href="/">
                                Epin Siparişleri
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="/">
                                Şikayetler
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="/">
                                Yorumlar
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="/">
                                Sabit Sayfalar
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-parent">
                    <a class="nav-link" href="#">
                        <i class="fas fa-users" aria-hidden="true"></i>
                        <span>Üyeler</span>
                    </a>
                    <ul class="nav nav-children">
                        <li>
                            <a class="nav-link" href="/">
                                Üyeler
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="/">
                                Roller
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="/">
                                Yetkiler
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-parent">
                    <a class="nav-link" href="#">
                        <i class="fas fa-columns" aria-hidden="true"></i>
                        <span>Pazarlama</span>
                    </a>
                    <ul class="nav nav-children">
                        <li>
                            <a class="nav-link" href="/">
                                Link Takip
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="/">
                                Mail
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="/">
                                Yetkiler
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="nav-link" href="/">
                        <i class="fas fa-cogs" aria-hidden="true"></i>
                        <span>Ayarlar</span>
                    </a>
                </li>

                <li class="nav-parent">
                    <a class="nav-link" href="#">
                        <i class="fas fa-chart-bar" aria-hidden="true"></i>
                        <span>Raporlar</span>
                    </a>
                    <ul class="nav nav-children">
                        <li>
                            <a class="nav-link" href="/">
                                Raporlar
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="/">
                                İstatistikler
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="/">
                                Yetkiler
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="nav-link" href="/">
                        <i class="fas fa-power-off" aria-hidden="true"></i>
                        <span>Çıkış</span>
                    </a>
                </li>


            </ul>
        </nav>

    </div>

    <script>
        // Maintain Scroll Position
        if (typeof localStorage !== 'undefined') {
            if (localStorage.getItem('sidebar-left-position') !== null) {
                var initialPosition = localStorage.getItem('sidebar-left-position'),
                    sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                sidebarLeft.scrollTop = initialPosition;
            }
        }
    </script>


</div>