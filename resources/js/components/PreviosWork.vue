<template>
  <div>
    <div class="row mb32">
      <div class="col-lg-2 col-md-3">
        <div class="paragraph">Опыт работы</div>
      </div>
      <div class="col-lg-3 col-md-4 col-11">
        <ul class="card-ul-radio profile-radio-list">
          <li>
            <input
              type="radio"
              id="test9131"
              name="expirience"
              value="no"
              checked=""
              v-model="show"
            />
            <label for="test9131">Нет опыта работы</label>
          </li>
          <li>
            <input
              type="radio"
              id="test10242"
              name="expirience"
              v-model="show"
              value="yes"
            />
            <label for="test10242">Есть опыт работы</label>
          </li>
        </ul>
      </div>
    </div>
    <div v-if="show === 'yes'">
      <div
        v-for="(experience, index) in workExperiences"
        :key="experience.index"
      >
        <div class="row mb24">
          <div class="col-lg-2 col-md-3 dflex-acenter">
            <div class="paragraph">Начало работы</div>
          </div>
          <div class="col-lg-3 col-md-4 col-11">
            <div class="d-flex justify-content-between">
              <div class="citizenship-select w100 mr16">
                <select
                  class="nselect-1"
                  data-title="Май"
                  v-model="experience.workStartMonth"
                  :name="`workExperiences[${index}][workStartMonth]`"
                >
                  <option value="01">Январь</option>
                  <option value="02">Февраль</option>
                  <option value="03">Март</option>
                  <option value="04">Апрель</option>
                  <option value="05">Май</option>
                  <option value="06">Июнь</option>
                  <option value="07">Июль</option>
                  <option value="08">Август</option>
                  <option value="09">Сентябрь</option>
                  <option value="10">Октябрь</option>
                  <option value="11">Ноябрь</option>
                  <option value="12">Декабрь</option>
                </select>
              </div>
              <div class="citizenship-select w100">
                <input
                  placeholder="2006"
                  type="text"
                  class="dor-input w100"
                  v-model="experience.workStartYear"
                  :name="`workExperiences[${index}][workStartYear]`"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="row mb8">
          <div class="col-lg-2 col-md-3 dflex-acenter">
            <div class="paragraph">Окончание работы</div>
          </div>
          <div class="col-lg-3 col-md-4 col-11">
            <div class="d-flex justify-content-between">
              <div class="citizenship-select w100 mr16">
                <select
                  class="nselect-1"
                  data-title="Март"
                  v-model="experience.workEndMonth"
                  :name="`workExperiences[${index}][workEndMonth]`"
                >
                  <option value="01">Январь</option>
                  <option value="02">Февраль</option>
                  <option value="03">Март</option>
                  <option value="04">Апрель</option>
                  <option value="05">Май</option>
                  <option value="06">Июнь</option>
                  <option value="07">Июль</option>
                  <option value="08">Август</option>
                  <option value="09">Сентябрь</option>
                  <option value="10">Октябрь</option>
                  <option value="11">Ноябрь</option>
                  <option value="12">Декабрь</option>
                </select>
              </div>
              <div class="citizenship-select w100">
                <input
                  placeholder="2006"
                  type="text"
                  class="dor-input w100"
                  v-model="experience.workEndYear"
                  :name="`workExperiences[${index}][workEndYear]`"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="row mb32">
          <div class="col-lg-2 col-md-3"></div>
          <div class="col-lg-3 col-md-4 col-11">
            <div class="profile-info">
              <div class="form-check d-flex">
                <input
                  type="checkbox"
                  class="form-check-input"
                  :id="index"
                  v-model="experience.stillWork"
                  :name="`workExperiences[${index}][stillWork]`"
                />
                <label class="form-check-label" :for="index"></label>
                <label
                  :for="index"
                  class="profile-info__check-text job-resolution-checkbox"
                  >По настоящее время</label
                >
              </div>
            </div>
          </div>
        </div>
        <div class="row mb16">
          <div class="col-lg-2 col-md-3 dflex-acenter">
            <div class="paragraph">Организация</div>
          </div>
          <div class="col-lg-3 col-md-4 col-11">
            <input
              type="text"
              class="dor-input w100"
              v-model="experience.organisation"
              :name="`workExperiences[${index}][organisation]`"
            />
          </div>
        </div>
        <div class="row mb16">
          <div class="col-lg-2 col-md-3 dflex-acenter">
            <div class="paragraph">Должность</div>
          </div>
          <div class="col-lg-3 col-md-4 col-11">
            <input
              type="text"
              class="dor-input w100"
              v-model="experience.vacancy"
              :name="`workExperiences[${index}][vacancy]`"
            />
          </div>
        </div>
        <div class="row mb16">
          <div class="col-lg-2 col-md-3">
            <div class="paragraph">Обязанности, функции, достижения</div>
          </div>
          <div class="col-lg-4 col-md-6 col-12">
            <textarea
              class="dor-input w100 h96 mb8"
              placeholder="Расскажите о своих обязанностях, функциях и достижениях"
              v-model="experience.duty"
              :name="`workExperiences[${index}][duty]`"
            ></textarea>
            <div>
              <a href="#" @click="removeExperience(experience.index)"
                >Удалить место работы</a
              >
            </div>
          </div>
        </div>
        <div class="row mb24">
          <div class="col-lg-2 col-md-3"></div>
          <div class="col-lg-4 col-md-6 col-12">
            <div class="devide-border"></div>
          </div>
        </div>
      </div>
      <div class="row mb64 mobile-mb32">
        <div class="col-lg-4 col-md-6 col-12">
          <div>
            <a href="#" @click="addExperience">+ Добавить место работы</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      show: "no",
      index: 1,
      workExperiences: [
        {
          index: 0,
          stillWork: false,
          workStartMonth: "01",
          workStartYear: "",
          workEndMonth: "01",
          workEndYear: "",
          organisation: "",
          vacancy: "",
          duty: "",
        },
      ],
    };
  },
  methods: {
    addExperience() {
      this.workExperiences.push({
        index: this.index,
        stillWork: false,
        workStartMonth: "01",
        workStartYear: "",
        workEndMonth: "01",
        workEndYear: "",
        organisation: "",
        vacancy: "",
        duty: "",
      });
      this.index++;
    },
    removeExperience(index) {
      this.workExperiences.splice(index, 1);
    },
  },
};
</script>
