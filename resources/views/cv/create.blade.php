@extends('layouts.app')

@section('content')
<div class="content p-rel">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mt8 mb40"><a href="{{ route('profile.profile.list', $user_id) }}"><img src="{{ asset('images/blue-left-arrow.svg') }}" alt="arrow">
                        Вернуться без
                        сохранения</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title mb24">Новое резюме</div>
            </div>
        </div>
        <div class="col-12">
            <form action="{{ route('cv.') }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('POST')
                <div class="row mb32">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Фото</div>
                    </div>
                    <image-upload></image-upload>
                </div>
                <div class="row mb16">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Фамилия</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <input id="lastname" value="{{ old('lastname') }}" type="text" name="lastname"
                            class="dor-input w100 form-control @error('lastname') is-invalid @enderror">
                        @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb16">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Имя</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <input id="name" value="{{ old('name') }}" type="text" name="name"
                            class="dor-input w100 form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb16">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Отчество</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <input id="patronymic" value="{{ old('patronymic') }}" type="text" name="patronymic"
                            class="dor-input w100 form-control @error('patronymic') is-invalid @enderror">
                        @error('patronymic')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb24">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Дата рождения</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <div class="datepicker-wrap input-group date">
                            <input id="birth_date" value="{{ old('birth_date') }}" type="text" name="birth_date"
                                class="dor-input dpicker datepicker-input form-control @error('birth_date') is-invalid @enderror">
                            <img src="{{ asset('images/mdi_calendar_today.svg') }}" alt="">
                            @error('birth_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb16">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Пол</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <ul class="card-ul-radio profile-radio-list">
                            <li>
                                <input type="radio" id="test1" name="radio-sex" value="male" checked>
                                <label for="test1">Мужской</label>
                            </li>
                            <li>
                                <input type="radio" id="test2" name="radio-sex" value="female">
                                <label for="test2">Женский</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row mb16">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Город проживания</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <input id="locate_city" value="{{ old('locate_city') }}" type="text" name="locate_city"
                            class="dor-input w100 form-control @error('locate_city') is-invalid @enderror">
                        @error('locate_city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb16">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="heading">Способы связи</div>
                    </div>
                    <div class="col-lg-7 col-10"></div>
                </div>
                <div class="row mb24">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Электронная почта</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <div class="p-rel">
                            <input id="email" value="{{ old('email') }}" type="text" name="email"
                                class="dor-input w100 form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb32">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Телефон</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <div style="width: 140px;" class="p-rel mobile-w100">
                            <input id="phone" value="{{ old('phone') }}" type="text" name="phone"
                                class="dor-input w100 form-control @error('phone') is-invalid @enderror"
                                placeholder="+7 ___ ___-__-__">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb24">
                    <div class="col-12">
                        <div class="heading">Желаемая должность</div>
                    </div>
                </div>
                <div class="row mb16">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Специализация</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <div class="citizenship-select">
                            <select class="nselect-1" data-title="" name="specialization" class="form-control @error('specialization') is-invalid @enderror">
                                @foreach( $specialization_name as $key => $data )
                                <option value="{{$data}}">{{$data}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb16">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Зарплата</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <div class="p-rel">
                            <input id="salary" value="{{ old('salary') }}" type="text" name="salary" placeholder="От"
                                type="text" class="dor-input w100 form-control @error('salary') is-invalid @enderror">
                            <img class="rub-icon" src="{{ asset('images/rub-icon.svg') }}" alt="rub-icon">
                            @error('salary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb32">
                    <div class="col-lg-2 col-md-3">
                        <div class="paragraph">Занятость</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <div class="profile-info">
                            <div class="form-check d-flex">
                                <input type="checkbox" name="busyness[]" class="form-check-input"
                                    id="exampleCheck1"
                                    value="Полная занятость">
                                <label class="form-check-label" for="exampleCheck1"></label>
                                <label for="exampleCheck1"
                                    class="profile-info__check-text job-resolution-checkbox">Полная
                                    занятость</label>
                            </div>
                            <div class="form-check d-flex">
                                <input type="checkbox" name="busyness[]" class="form-check-input"
                                    id="exampleCheck2"
                                    value="Частичная занятость">
                                <label class="form-check-label" for="exampleCheck2"></label>
                                <label for="exampleCheck2"
                                    class="profile-info__check-text job-resolution-checkbox">Частичная
                                    занятость</label>
                            </div>
                            <div class="form-check d-flex">
                                <input type="checkbox" name="busyness[]" class="form-check-input"
                                    id="exampleCheck3"
                                    value="Проектная">
                                <label class="form-check-label" for="exampleCheck3"></label>
                                <label for="exampleCheck3"
                                    class="profile-info__check-text job-resolution-checkbox">Проектная/Временная
                                    работа</label>
                            </div>
                            <div class="form-check d-flex">
                                <input type="checkbox" name="busyness[]" class="form-check-input"
                                    id="exampleCheck4"
                                    value="Волонтёрство">
                                <label class="form-check-label" for="exampleCheck4"></label>
                                <label for="exampleCheck4"
                                    class="profile-info__check-text job-resolution-checkbox">Волонтёрство</label>
                            </div>
                            <div class="form-check d-flex">
                                <input type="checkbox" name="busyness[]" class="form-check-input"
                                    id="exampleCheck5"
                                    value="Стажировка">
                                <label class="form-check-label" for="exampleCheck5"></label>
                                <label for="exampleCheck5"
                                    class="profile-info__check-text job-resolution-checkbox">Стажировка</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb32">
                    <div class="col-lg-2 col-md-3">
                        <div class="paragraph">График работы</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <div class="profile-info">
                            <div class="form-check d-flex">
                                <input type="checkbox" name="shedule_types[]" class="form-check-input" id="exampleCheck6"
                                    value="Полный день">
                                <label class="form-check-label" for="exampleCheck6"></label>
                                <label for="exampleCheck6"
                                    class="profile-info__check-text job-resolution-checkbox">Полный
                                    день</label>
                            </div>
                            <div class="form-check d-flex">
                                <input type="checkbox" name="shedule_types[]" class="form-check-input" id="exampleCheck7"
                                    value="Сменный график">
                                <label class="form-check-label" for="exampleCheck7"></label>
                                <label for="exampleCheck7"
                                    class="profile-info__check-text job-resolution-checkbox">Сменный
                                    график</label>
                            </div>
                            <div class="form-check d-flex">
                                <input type="checkbox" name="shedule_types[]" class="form-check-input" id="exampleCheck8"
                                    value="Гибкий график">
                                <label class="form-check-label" for="exampleCheck8"></label>
                                <label for="exampleCheck8"
                                    class="profile-info__check-text job-resolution-checkbox">Гибкий
                                    график</label>
                            </div>
                            <div class="form-check d-flex">
                                <input type="checkbox" name="shedule_types[]" class="form-check-input" id="exampleCheck9"
                                    value="Удалённая работа">
                                <label class="form-check-label" for="exampleCheck9"></label>
                                <label for="exampleCheck9"
                                    class="profile-info__check-text job-resolution-checkbox">Удалённая
                                    работа</label>
                            </div>
                            <div class="form-check d-flex">
                                <input type="checkbox" name="shedule_types[]" class="form-check-input" id="exampleCheck10"
                                    value="Вахтовый метод">
                                <label class="form-check-label" for="exampleCheck10"></label>
                                <label for="exampleCheck10"
                                    class="profile-info__check-text job-resolution-checkbox">Вахтовый
                                    метод</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb32">
                    <div class="col-12">
                        <div class="heading">Опыт работы</div>
                    </div>
                </div>
                <previous-work></previous-work>
                <div class="row mb32">
                    <div class="col-12">
                        <div class="heading">Расскажите о себе</div>
                    </div>
                </div>
                <div class="row mb64 mobile-mb32">
                    <div class="col-lg-2 col-md-3">
                        <div class="paragraph">О себе</div>
                    </div>
                    <div class="col-lg-5 col-md-7 col-12">
                        <textarea id="about" value="{{ old('about') }}" name="about" class="dor-input w100 h176 mb8"></textarea>
                    </div>
                </div>
                <div class="row mb128 mobile-mb64">
                    <div class="col-lg-2 col-md-3">
                    </div>
                    <div class="col-lg-10 col-md-9">
                        <button type="submit" class="orange-btn link-orange-btn">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection