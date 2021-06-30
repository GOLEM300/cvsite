<template>
  <div
    class="
      col-lg-3
      desctop-992-pl-16
      d-flex
      flex-column
      vakancy-page-filter-block vakancy-page-filter-block-dnone
    "
  >
    <div
      class="
        vakancy-page-filter-block__row
        mobile-flex-992
        mb24
        d-flex
        justify-content-between
        align-items-center
      "
    >
      <div class="heading">Фильтр</div>
      <img class="cursor-p" src="images/big-cancel.svg" alt="cancel" />
    </div>
    <div
      class="signin-modal__switch-btns-wrap resume-list__switch-btns-wrap mb16"
    >
      <a href="#" class="signin-modal__switch-btn active">Все</a>
      <a href="#" class="signin-modal__switch-btn">Мужчины</a>
      <a href="#" class="signin-modal__switch-btn">Женщины</a>
    </div>
    <div class="vakancy-page-filter-block__row mb24">
      <div class="paragraph cadet-blue">Город</div>
      <div class="citizenship-select">
        <select class="nselect-1">
          <option value=""></option>
          <option value="Кемерово">Кемерово</option>
          <option value="Новосибирск">Новосибирск</option>
          <option value="Иркутск">Иркутск</option>
          <option value="Красноярск">Красноярск</option>
          <option value="Барнаул">Барнаул</option>
        </select>
      </div>
    </div>
    <div class="vakancy-page-filter-block__row mb24">
      <div class="paragraph cadet-blue">Зарплата</div>
      <div class="p-rel">
        <input placeholder="Любая" type="text" class="dor-input w100" />
        <img class="rub-icon" src="images/rub-icon.svg" alt="rub-icon" />
      </div>
    </div>
    <div class="vakancy-page-filter-block__row mb24">
      <div class="paragraph cadet-blue">Специализация</div>
      <div class="citizenship-select">
        <select class="nselect-1" data-title="Любая">
          <option value=""></option>
          <option value="Фронтенд">Фронтенд</option>
          <option value="Бекенд">Бекенд</option>
          <option value="Дизайн">Дизайн</option>
          <option value="Тестировщик">Тестировщик</option>
        </select>
      </div>
    </div>
    <div class="vakancy-page-filter-block__row mb24">
      <div class="paragraph cadet-blue">Возраст</div>
      <div class="d-flex">
        <input placeholder="От" type="text" class="dor-input w100" />
        <input placeholder="До" type="text" class="dor-input w100" />
      </div>
    </div>
    <div class="vakancy-page-filter-block__row mb24">
      <div class="paragraph cadet-blue">Опыт работы</div>
      <div class="profile-info">
        <div class="form-check d-flex">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" />
          <label class="form-check-label" for="exampleCheck1"></label>
          <label for="exampleCheck1" class="profile-info__check-text"
            >Без опыта</label
          >
        </div>
        <div class="form-check d-flex">
          <input type="checkbox" class="form-check-input" id="exampleCheck2" />
          <label class="form-check-label" for="exampleCheck2"></label>
          <label for="exampleCheck2" class="profile-info__check-text"
            >От 1 года до 3 лет</label
          >
        </div>
        <div class="form-check d-flex">
          <input type="checkbox" class="form-check-input" id="exampleCheck3" />
          <label class="form-check-label" for="exampleCheck3"></label>
          <label for="exampleCheck3" class="profile-info__check-text"
            >От 3 лет до 6 лет</label
          >
        </div>
        <div class="form-check d-flex">
          <input type="checkbox" class="form-check-input" id="exampleCheck4" />
          <label class="form-check-label" for="exampleCheck4"></label>
          <label for="exampleCheck4" class="profile-info__check-text"
            >Более 6 лет</label
          >
        </div>
      </div>
    </div>
    <div class="vakancy-page-filter-block__row mb24">
      <div class="paragraph cadet-blue">Тип занятости</div>
      <div class="profile-info">
        <div class="form-check d-flex">
          <input type="checkbox" class="form-check-input" id="exampleCheck5" />
          <label class="form-check-label" for="exampleCheck5"></label>
          <label for="exampleCheck5" class="profile-info__check-text"
            >Полная занятость</label
          >
        </div>
        <div class="form-check d-flex">
          <input type="checkbox" class="form-check-input" id="exampleCheck6" />
          <label class="form-check-label" for="exampleCheck6"></label>
          <label for="exampleCheck6" class="profile-info__check-text"
            >Частичная занятость</label
          >
        </div>
        <div class="form-check d-flex">
          <input type="checkbox" class="form-check-input" id="exampleCheck7" />
          <label class="form-check-label" for="exampleCheck7"></label>
          <label for="exampleCheck7" class="profile-info__check-text"
            >Проектная работа</label
          >
        </div>
        <div class="form-check d-flex">
          <input type="checkbox" class="form-check-input" id="exampleCheck8" />
          <label class="form-check-label" for="exampleCheck8"></label>
          <label for="exampleCheck8" class="profile-info__check-text"
            >Стажировка</label
          >
        </div>
        <div class="form-check d-flex">
          <input type="checkbox" class="form-check-input" id="exampleCheck9" />
          <label class="form-check-label" for="exampleCheck9"></label>
          <label for="exampleCheck9" class="profile-info__check-text"
            >Волонтёрство</label
          >
        </div>
      </div>
    </div>
    <div class="vakancy-page-filter-block__row mb24">
      <div class="paragraph cadet-blue">График работы</div>
      <div class="profile-info">
        <div class="form-check d-flex">
          <input type="checkbox" class="form-check-input" id="exampleCheck10" />
          <label class="form-check-label" for="exampleCheck10"></label>
          <label for="exampleCheck10" class="profile-info__check-text"
            >Полный день</label
          >
        </div>
        <div class="form-check d-flex">
          <input type="checkbox" class="form-check-input" id="exampleCheck11" />
          <label class="form-check-label" for="exampleCheck11"></label>
          <label for="exampleCheck11" class="profile-info__check-text"
            >Сменный график</label
          >
        </div>
        <div class="form-check d-flex">
          <input type="checkbox" class="form-check-input" id="exampleCheck12" />
          <label class="form-check-label" for="exampleCheck12"></label>
          <label for="exampleCheck12" class="profile-info__check-text"
            >Вахтовый метод</label
          >
        </div>
        <div class="form-check d-flex">
          <input type="checkbox" class="form-check-input" id="exampleCheck13" />
          <label class="form-check-label" for="exampleCheck13"></label>
          <label for="exampleCheck13" class="profile-info__check-text"
            >Гибкий график</label
          >
        </div>
        <div class="form-check d-flex">
          <input type="checkbox" class="form-check-input" id="exampleCheck14" />
          <label class="form-check-label" for="exampleCheck14"></label>
          <label for="exampleCheck14" class="profile-info__check-text"
            >Удалённая работа</label
          >
        </div>
      </div>
    </div>
    <div
      class="
        vakancy-page-filter-block__row
        vakancy-page-filter-block__show-vakancy-btns
        mb24
        d-flex
        flex-wrap
        align-items-center
        mobile-jus-cont-center
      "
    >
      <a class="link-orange-btn orange-btn mr24 mobile-mb12" href="#"
        >Показать <span>1 230</span> вакансии</a
      >
      <a href="#">Сбросить все</a>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      request: {
        gender: "qqq",
        min_age: "www",
        max_age: "",
        salary: "",
        locate_city: "",
        specialization: "",
        prevExpirience: [],
        busyness: [],
        sheduleType: [],
      },
    };
  },
  mounted() {
    this.loadCvs();
  },
  watch: {
    request: {
      handler: function () {
        this.loadCvs();
      },
    },
  },
  methods: {
    loadCvs() {
      axios
        .get("api/search", {
          params: {
            gender: this.gender,
            min_age: this.min_age,
            max_age: this.max_age,
            salary: this.salary,
            locate_city: this.locate_city,
            specialization: this.specialization,
          },
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
</script>
