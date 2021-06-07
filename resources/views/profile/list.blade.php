@extends ('layouts.app')

@section('content')
<div class="content">
    <div class="container">
        <div class="col-lg-9">
            <div class="main-title mb32 mt50 d-flex justify-content-between align-items-center">Мои резюме
                <a href="{{ route('cv.cv.create') }}" class="link-orange-btn orange-btn my-vacancies-add-btn">Добавить резюме</a><a
                    class="my-vacancies-mobile-add-btn link-orange-btn orange-btn plus-btn" href="#">+</a>
            </div>
            <div class="tabs mb64">
                <div class="tabs__content active">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex">
                                <div class="paragraph mb8 mr16">У вас <span>{{$cvs->count()}}</span> резюме</div>
                            </div>
                            @foreach ($cvs as $cv)
                            <div class="vakancy-page-block my-vacancies-block p-rel mb16">
                                <div class="row">
                                    <div class="my-resume-dropdown dropdown show mb8">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="images/dots.svg" alt="dots">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuLink">
                                            <form action="{{ route('cv.cv.edit', $cv) }}"
                                                method="POST">
                                                <button class="dropdown-item" type="submit">Редактировать</button>
                                                @csrf
                                                @method('PUT')
                                            </form>
                                            <form action="{{ route('cv.cv.remove', $cv) }}"
                                                method="POST">
                                                <button class="dropdown-item" type="submit">Удалить</button>
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 my-vacancies-block__left-col mb16">
                                        <h2 class="mini-title mb8">{{$cv->specialization}}</h2>
                                        <div class="d-flex align-items-center flex-wrap mb8 ">
                                            <span class="mr16 paragraph">{{$cv->salary}} ₽</span>
                                            <span class="mr16 paragraph">{{$cv->prevYears($cv->id)}}</span>
                                            <span class="mr16 paragraph">{{$cv->locate_city}}</span>
                                        </div>
                                        <div class="d-flex flex-wrap">
                                            <div class="paragraph mr16">
                                                <strong>Просмотров</strong>
                                                <span class="grey">26</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 d-flex justify-content-between align-items-center flex-wrap">
                                        <div class="d-flex flex-wrap mobile-mb12">
                                            <a class="mr16" href="/show/{{$cv->id}}">Открыть</a>
                                        </div>
                                        <span class="mini-paragraph cadet-blue">{{$cv->published_at()}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection