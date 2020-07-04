<template>
  <div>
      <v-menu
        v-model="menu2"
        :close-on-content-click="false"
        :nudge-right="40"
        transition="scale-transition"
        offset-y
        min-width="300px"
      >
        <template v-slot:activator="{ on }">
          <v-text-field
            v-model="date"
            :label="label"
            prepend-icon="event"
            readonly
            v-on="on"
          ></v-text-field>
        </template>
        <v-date-picker v-model="date"  @input="menu2 = false"></v-date-picker>
      </v-menu>
  </div>
</template>
<script>
export default {
  name: "date-picker_field",
  props:{
      label:{
          type: String,
          default:''
      },
      date:{
          type: String,
          default:null
      }
  },
  data() {
    return {
    //   date: new Date().toISOString().substr(0, 10),
      menu: false,
      modal: false,
      menu2: false,
      dialog: false
    };
  }
};
</script>
<style lang="scss" scoped></style>