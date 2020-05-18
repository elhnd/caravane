<template>
  <is-main-template title="user_list" route-add="test" entity="user">
    <v-card-title>
      <v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
    </v-card-title>
    <v-data-table :headers="headers" :items="items" :search="search">
      <template v-slot:item.isActivated="{item}">
        <v-switch v-model="item.isActivated"  item="item" @onChange ="updateField('item.isActivated', $event.target.value)" ></v-switch>
      </template>
      <template v-slot:no-data>
        <v-btn color="primary">Reset</v-btn>
      </template>
    </v-data-table>
  </is-main-template>
</template>

<script>
import { mapActions, mapGetters, mapState } from "vuex";
import axios from "../../interceptor";
import { items } from '../../store/modules/user/getters';
import { API_HOST } from '../../config/_entrypoint'
export default {
  data() {
    return {
      user: this.$store.state.user,
      search: "",
      headers: [
        {
          text: "Prenom et Nom",
          value: "name"
        },
        { text: "email", value: "email" },
        { text: "Téléphone", value: "phone" },
        { text: "Création", value: "createdAt" },
        { text: "Mise à jour", value: "updatedAt" },
        { text: "Actions", value: "isActivated", sortable: false }
      ]
    };
  },
  computed: {
    ...mapGetters({
      items: "user/items",
      item: "user/item"
    }),
    userState() {
      return this.$store.state.user.isActivated
    }
  },
  created() {
    this.getItems();
    //this.test();
   
  },
  methods: {
    ...mapActions({
      getItems: "user/getItems",
      getItem: "user/getItem",
      update: "user/update"
    }),
    updateField(field, value) {
     this.$store.commit('USER_UPDATE_ITEM', {
     	[field]: value
     });
   },
  }
};
</script>

<style lang="scss" >
td {
  font-size: 20px !important;
  vertical-align: middle;
  border-top: 1px solid #f4f4f4 !important;
  line-height: 1.43 !important;
}
</style>