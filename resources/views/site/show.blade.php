@extends('layouts.app')

@section('content')

<div class="content p-rel">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mt8 mb32"><a href="{{ route('profile.list', $cv->user_id) }}"><img src="images/blue-left-arrow.svg" alt="arrow"> Резюме в
                        Кемерово</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-5 mobile-mb32">
                <div class="profile-foto resume-profile-foto"><img src="/storage/uploads/{{$cv->photo}}" alt="profile-foto">
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="main-title d-md-flex justify-content-between align-items-center mobile-mb16">{{$cv->specialization}}
                </div>
                <div class="paragraph-lead mb16">
                    <span class="mr24">{{$cv->salary}} ₽</span>
                    <span>{{$cv->prevYears($cv->id)}}</span>
                </div>
                <div class="profile-info company-profile-info resume-view__info-blick">
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">Имя
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right">{{$cv->fullName()}}
                        </div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">Возраст
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right">{{$cv->age()}}</div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">Занятость</div>
                        <div class="profile-info__block-right company-profile-info__block-right">{{$cv->busyness($cv->id)}}</div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">График работы
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right">{{$cv->sheduleType($cv->id)}}</div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">Город проживания
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right">{{$cv->locate_city}}</div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">
                            Электронная почта
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right"><a
                                href="#">{{$cv->email}}</a></div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">
                            Телефон
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right"><a href="#">{{$cv->phone}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="devide-border mb32 mt50"></div>
                <div class="tabs mb50">
                    <div class="tabs__content active">
                        <div class="row">
                            @if ($cv->expirience == 'yes')
                            <div class="col-lg-10">
                                <div class="row mb16">
                                    <div class="col-lg-12">
                                        <h3 class="heading mb16">Опыт работы {{$cv->fullExpirience($cv->id)}}</h3>
                                    </div>
                                    @foreach ($cv->prevWorks($cv->id) as $work)
                                    <div class="col-md-4 mb16">
                                        <div class="paragraph tbold mb8">{{$work->period()}}</div>
                                        <div class="mini-paragraph">{{$work->dateDiff()}}</div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="paragraph tbold mb8">{{$work->organisation}}</div>
                                        <div class="paragraph tbold mb8">{{$work->vacancy}}
                                        </div>
                                        <div class="paragraph">{{$work->duty}}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-7">
                                <div class="company-profile-text mb64">
                                    <h3 class="heading mb16">Обо мне</h3>
                                    <p>{{$cv->about}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection