@extends('layouts.app')

@section('content')

<div class="header-search">
        <div class="container">
            <div class="header-search__wrap">
                <form class="header-search__form">
                    <a href="#"><img src="images/dark-search.svg" alt="search"
                                     class="dark-search-icon header-search__icon"></a>
                    <input class="header-search__input" type="text" placeholder="Поиск по резюме и навыкам">
                    <button type="button" class="blue-btn header-search__btn">Найти</button>
                </form>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <h1 class="main-title mt24 mb16">PHP разработчики в Кемерово</h1>
            <button class="vacancy-filter-btn">Фильтр</button>
            <div class="row">
                <div class="col-lg-9 desctop-992-pr-16">
                    <div class="d-flex align-items-center flex-wrap mb8">
                        <span class="paragraph mr16">Найдено 3 резюме</span>
                        <div class="vakancy-page-header-dropdowns">
                            <div class="vakancy-page-wrap show mr16">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">За день</a>
                                    <a class="dropdown-item" href="#">За год</a>
                                    <a class="dropdown-item" href="#">За все время</a>
                                </div>
                            </div>
                            <div class="vakancy-page-wrap show">
                                <a class="vakancy-page-btn vakancy-btn dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    По новизне
                                    <i class="fas fa-angle-down arrowDown"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">По новизне</a>
                                    <a class="dropdown-item" href="#">По возрастанию зарплаты</a>
                                    <a class="dropdown-item" href="#">По убыванию зарплаты</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($cvs ?? [] as $cv)
                    <div class="vakancy-page-block company-list-search__block resume-list__block p-rel mb16">
                        <div class="company-list-search__block-left">
                            <div class="resume-list__block-img mb8">
                                <img src="/storage/uploads/{{$cv->photo}}" alt="profile">
                            </div>
                        </div>
                        <div class="company-list-search__block-right">
                            <div class="mini-paragraph cadet-blue mobile-mb12">{{$cv->updated_at()}}</div>
                            <h3 class="mini-title mobile-off">{{$cv->specialization}}</h3>
                            <div class="d-flex align-items-center flex-wrap mb8 ">
                                <span class="mr16 paragraph">{{$cv->salary}} ₽</span>
                                <span class="mr16 paragraph">{{$cv->prevYears()}}</span>
                                <span class="mr16 paragraph">{{$cv->age()}}</span>
                                <span class="mr16 paragraph">{{$cv->locate_city}}</span>
                            </div>
                            <p class="paragraph tbold mobile-off">Последнее место работы</p>
                        </div>
                        <div class="company-list-search__block-middle">
                            <h3 class="mini-title desktop-off"></h3>
                            <p class="paragraph mb16 mobile-mb32">{{$cv->getLastWork()}}
                                </p>
                        </div>
                    </div>
                    @endforeach
                    <ul class="dor-pagination mb128">
                        <li class="page-link-prev"><a href="#"><img class="mr8"
                                                                    src="images/mini-left-arrow.svg" alt="arrow"> Назад</a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a class="grey" href="#">...</a></li>
                        <li class="active"><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a class="grey" href="#">...</a></li>
                        <li><a href="#">10</a></li>
                        <li class="page-link-next"><a href="#">Далее <img class="ml8"
                                                                          src="images/mini-right-arrow.svg" alt="arrow"></a>
                        </li>
                    </ul>
                </div>
                <filter-search></filter-search>
            </div>
        </div>
    </div>

@endsection