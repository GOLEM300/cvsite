<template>
  <div class="container">
    <h1 class="main-title mt24 mb16">PHP разработчики в Кемерово</h1>
    <button class="vacancy-filter-btn">Фильтр</button>
    <div class="row">
      <div class="col-lg-9 desctop-992-pr-16">
        <div class="d-flex align-items-center flex-wrap mb8">
          <span class="paragraph mr16">Найдено {{ cvs.length }} резюме</span>
          <div class="vakancy-page-header-dropdowns">
            <div class="vakancy-page-wrap show mr16">
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">За день</a>
                <a class="dropdown-item" href="#">За год</a>
                <a class="dropdown-item" href="#">За все время</a>
              </div>
            </div>
            <div class="vakancy-page-wrap show">
              <a
                class="vakancy-page-btn vakancy-btn dropdown-toggle"
                href="#"
                role="button"
                id="dropdownMenuLink"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                {{ sort_title }}
                <i class="fas fa-angle-down arrowDown"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a
                  class="dropdown-item"
                  role="button"
                  href="#"
                  @click="sort_by('newest', 'По новизне')"
                  >По новизне</a
                >
                <a
                  class="dropdown-item"
                  role="button"
                  href="#"
                  @click="sort_by('desc', 'По возрастанию зарплаты')"
                  >По возрастанию зарплаты</a
                >
                <a
                  class="dropdown-item"
                  role="button"
                  href="#"
                  @click="sort_by('asc', 'По убыванию зарплаты')"
                  >По убыванию зарплаты</a
                >
              </div>
            </div>
          </div>
        </div>
        <div
          class="
            vakancy-page-block
            company-list-search__block
            resume-list__block
            p-rel
            mb16
          "
          v-for="cv in cvs"
        >
          <div class="company-list-search__block-left">
            <div class="resume-list__block-img mb8">
              <img :src="`/site/show/${cv.photo}`" alt="profile" />
            </div>
          </div>
          <div class="company-list-search__block-right">
            <div class="mini-paragraph cadet-blue mobile-mb12">
              {{ updated_at(cv.updated_at) }}
            </div>
            <h3 class="mini-title mobile-off">
              <a :href="`/site/show/${cv.id}`">{{ cv.specialization }}</a>
            </h3>
            <div class="d-flex align-items-center flex-wrap mb8">
              <span class="mr16 paragraph">{{ cv.salary }} ₽</span>
              <span class="mr16 paragraph" v-if="cv.expirience == 'yes'"
                >{{ cv.prevYearsExpirience }} лет опыта</span
              >
              <span class="mr16 paragraph" v-else>Нет опыта работы</span>
              <span class="mr16 paragraph">{{ cv.age }} лет</span>
              <span class="mr16 paragraph">{{ cv.locate_city }}</span>
            </div>
            <p class="paragraph tbold mobile-off">Последнее место работы</p>
          </div>
          <div class="company-list-search__block-middle">
            <h3 class="mini-title desktop-off"></h3>
            <p class="paragraph mb16 mobile-mb32">
              {{ getLastWork(cv.previos_expirience) }}
            </p>
          </div>
        </div>
        <ul class="dor-pagination mb128">
          <li class="page-link-prev">
            <a href="#"
              ><img class="mr8" src="images/mini-left-arrow.svg" alt="arrow" />
              Назад</a
            >
          </li>
          <li><a href="#">1</a></li>
          <li><a class="grey" href="#">...</a></li>
          <li class="active"><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a class="grey" href="#">...</a></li>
          <li><a href="#">10</a></li>
          <li class="page-link-next">
            <a href="#"
              >Далее
              <img class="ml8" src="images/mini-right-arrow.svg" alt="arrow"
            /></a>
          </li>
        </ul>
      </div>
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
          class="
            signin-modal__switch-btns-wrap
            resume-list__switch-btns-wrap
            mb16
          "
        >
          <a
            href="#"
            class="signin-modal__switch-btn active"
            @click="sex('all')"
            >Все</a
          >
          <a href="#" class="signin-modal__switch-btn" @click="sex('male')"
            >Мужчины</a
          >
          <a href="#" class="signin-modal__switch-btn" @click="sex('female')"
            >Женщины</a
          >
        </div>
        <div class="vakancy-page-filter-block__row mb24">
          <div class="paragraph cadet-blue">Город</div>
          <div class="citizenship-select">
            <select v-model="request.locate_city">
              <option v-for="item in city_list" v-bind:value="item">
                {{ item }}
              </option>
            </select>
          </div>
        </div>
        <div class="vakancy-page-filter-block__row mb24">
          <div class="paragraph cadet-blue">Зарплата</div>
          <div class="p-rel">
            <input
              placeholder="Любая"
              type="text"
              class="dor-input w100"
              v-model="request.salary"
            />
            <img class="rub-icon" src="images/rub-icon.svg" alt="rub-icon" />
          </div>
        </div>
        <div class="vakancy-page-filter-block__row mb24">
          <div class="paragraph cadet-blue">Специализация</div>
          <div class="citizenship-select">
            <select data-title="Любая" v-model="request.specialization">
              <option v-for="item in specialization_list" v-bind:value="item">
                {{ item }}
              </option>
            </select>
          </div>
        </div>
        <div class="vakancy-page-filter-block__row mb24">
          <div class="paragraph cadet-blue">Возраст</div>
          <div class="d-flex">
            <input
              placeholder="От"
              type="text"
              class="dor-input w100"
              v-model="request.min_age"
            />
            <input
              placeholder="До"
              type="text"
              class="dor-input w100"
              v-model="request.max_age"
            />
          </div>
        </div>
        <div class="vakancy-page-filter-block__row mb24">
          <div class="paragraph cadet-blue">Опыт работы</div>
          <div class="profile-info">
            <div class="form-check d-flex">
              <input
                type="checkbox"
                class="form-check-input"
                id="exampleCheck1"
                value="0"
                v-model="request.selected.prevExpirience"
              />
              <label class="form-check-label" for="exampleCheck1"></label>
              <label for="exampleCheck1" class="profile-info__check-text"
                >Без опыта</label
              >
            </div>
            <div class="form-check d-flex">
              <input
                type="checkbox"
                class="form-check-input"
                id="exampleCheck2"
                value="1"
                v-model="request.selected.prevExpirience"
              />
              <label class="form-check-label" for="exampleCheck2"></label>
              <label for="exampleCheck2" class="profile-info__check-text"
                >От 1 года до 3 лет</label
              >
            </div>
            <div class="form-check d-flex">
              <input
                type="checkbox"
                class="form-check-input"
                id="exampleCheck3"
                value="2"
                v-model="request.selected.prevExpirience"
              />
              <label class="form-check-label" for="exampleCheck3"></label>
              <label for="exampleCheck3" class="profile-info__check-text"
                >От 3 лет до 6 лет</label
              >
            </div>
            <div class="form-check d-flex">
              <input
                type="checkbox"
                class="form-check-input"
                id="exampleCheck4"
                value="3"
                v-model="request.selected.prevExpirience"
              />
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
              <input
                type="checkbox"
                class="form-check-input"
                id="exampleCheck5"
                value="3"
                v-model="request.selected.busyness"
              />
              <label class="form-check-label" for="exampleCheck5"></label>
              <label for="exampleCheck5" class="profile-info__check-text"
                >Полная занятость</label
              >
            </div>
            <div class="form-check d-flex">
              <input
                type="checkbox"
                class="form-check-input"
                id="exampleCheck6"
                value="3"
                v-model="request.selected.busyness"
              />
              <label class="form-check-label" for="exampleCheck6"></label>
              <label for="exampleCheck6" class="profile-info__check-text"
                >Частичная занятость</label
              >
            </div>
            <div class="form-check d-flex">
              <input
                type="checkbox"
                class="form-check-input"
                id="exampleCheck7"
                value="3"
                v-model="request.selected.busyness"
              />
              <label class="form-check-label" for="exampleCheck7"></label>
              <label for="exampleCheck7" class="profile-info__check-text"
                >Проектная работа</label
              >
            </div>
            <div class="form-check d-flex">
              <input
                type="checkbox"
                class="form-check-input"
                id="exampleCheck8"
                value="3"
                v-model="request.selected.busyness"
              />
              <label class="form-check-label" for="exampleCheck8"></label>
              <label for="exampleCheck8" class="profile-info__check-text"
                >Стажировка</label
              >
            </div>
            <div class="form-check d-flex">
              <input
                type="checkbox"
                class="form-check-input"
                id="exampleCheck9"
                value="3"
                v-model="request.selected.busyness"
              />
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
              <input
                type="checkbox"
                class="form-check-input"
                id="exampleCheck10"
                value="3"
                v-model="request.selected.sheduleType"
              />
              <label class="form-check-label" for="exampleCheck10"></label>
              <label for="exampleCheck10" class="profile-info__check-text"
                >Полный день</label
              >
            </div>
            <div class="form-check d-flex">
              <input
                type="checkbox"
                class="form-check-input"
                id="exampleCheck11"
                value="3"
                v-model="request.selected.sheduleType"
              />
              <label class="form-check-label" for="exampleCheck11"></label>
              <label for="exampleCheck11" class="profile-info__check-text"
                >Сменный график</label
              >
            </div>
            <div class="form-check d-flex">
              <input
                type="checkbox"
                class="form-check-input"
                id="exampleCheck12"
                value="3"
                v-model="request.selected.sheduleType"
              />
              <label class="form-check-label" for="exampleCheck12"></label>
              <label for="exampleCheck12" class="profile-info__check-text"
                >Вахтовый метод</label
              >
            </div>
            <div class="form-check d-flex">
              <input
                type="checkbox"
                class="form-check-input"
                id="exampleCheck13"
                value="3"
                v-model="request.selected.sheduleType"
              />
              <label class="form-check-label" for="exampleCheck13"></label>
              <label for="exampleCheck13" class="profile-info__check-text"
                >Гибкий график</label
              >
            </div>
            <div class="form-check d-flex">
              <input
                type="checkbox"
                class="form-check-input"
                id="exampleCheck14"
                value="3"
                v-model="request.selected.sheduleType"
              />
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
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      sort_title: "По новизне",
      specialization_list: ["Фронтенд", "Бекенд", "Дизайн", "Тестировщик"],
      city_list: ["Москва", "Новосибирск", "Якутск", "Волгоград"],
      request: {
        sex: "",
        min_age: "",
        max_age: "",
        salary: "",
        locate_city: "",
        specialization: "",
        sorted_by: "",
        selected: {
          prevExpirience: [],
          busyness: [],
          sheduleType: [],
        },
      },
      cvs: [],
      months: [
        "Декабрь",
        "Январь",
        "Февраль",
        "Март",
        "Апрель",
        "Май",
        "Июнь",
        "Июль",
        "Август",
        "Сентябрь",
        "Октябрь",
        "Ноябрь",
      ],
    };
  },
  mounted() {
    this.loadCvs();
  },
  watch: {
    request: {
      handler() {
        this.loadCvs();
      },
      deep: true,
    },
  },
  methods: {
    async loadCvs() {
      await fetch(
        `http://frontend.test/api/search?request=${JSON.stringify(
          this.request
        )}`
      )
        .then((response) => {
          response.json().then((data) => {
            this.cvs = data.data;
            console.log(this.cvs);
          });
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    getLastWork(previos_expirience) {
      if (!previos_expirience.length) {
        return "Нет";
      }
      let lastWork = previos_expirience[previos_expirience.length - 1];
      return (
        lastWork.vacancy +
        " в " +
        lastWork.organisation +
        " , " +
        this.getWorkPeriod(lastWork)
      );
    },
    getWorkPeriod(lastWork) {
      let startMonth = Number(lastWork.workStartMonth);
      let startYear = lastWork.workStartYear;
      let endMonth = Number(lastWork.workEndMonth);
      let endYear = lastWork.workEndYear;
      if (lastWork.stillWork == "off") {
        return (
          this.months[startMonth] +
          " " +
          startYear +
          " - " +
          this.months[endMonth] +
          " " +
          endYear
        );
      } else {
        return startMonth + " " + startYear + " - " + "По настоящее время";
      }
    },
    sort_by(arg, title) {
      this.request.sorted_by = arg;
      this.sort_title = title;
    },
    sex(arg) {
      this.request.sex = arg;
    },
    updated_at(updated_at) {
      let dataArray = updated_at.split("-", 3);
      let monthName = this.months[Number(dataArray[1])];
      let day = dataArray[2].split("T")[0];
      let year = dataArray[0];
      let time = dataArray[2].split("T")[1].slice(0, 5);

      return "Обновлено  " + day + " " + monthName + " " + year + " в " + time;
    },
  },
};
</script>
