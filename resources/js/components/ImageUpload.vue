<template>
  <div class="col-lg-3 col-md-4 col-11">
    <div class="profile-foto-upload mb8">
      <img :src="imagePreview" alt="foto" />
    </div>
    <label class="custom-file-upload">
      <input
        type="file"
        id="photo"
        name="photo"
        class=""
        @change="GetImage"
      />
      Изменить фото 
    </label>
  </div>
</template>
<script>
export default {
  data() {
    return {
      imagePreview:'images/profile-foto.jpg',
    };
  },
  methods: {
    GetImage(e) {
      let image = e.target.files[0];
      let reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = (e) => {
        this.imagePreview = e.target.result
      };
    }
  },
};
</script>