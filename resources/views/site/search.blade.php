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
        <filter-search></filter-search>
    </div>

@endsection