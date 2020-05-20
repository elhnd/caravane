<template>
  <v-container fluid>
    <v-row justify="space-between">
      <v-col class="col-auto">
        <h1 class="display-1 ml-lg-5 py-2 py-lg-4">Liste des users</h1>
      </v-col>
      <v-col class="col-auto">
        <userForm :handle-submit="onSendForm" :item="item" icon="mdi-plus" color="success" />
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12">
        <v-card class="mx-auto">
          <v-card-text>
            <v-card-title>
              <v-text-field
                v-model="search"
                append-icon="search"
                label="Search"
                single-line
                hide-details
              ></v-text-field>
            </v-card-title>
            <v-data-table :headers="headers" :items="items" :search="search">
              <template v-slot:item.isActivated="{item}">
                <v-btn
                  type="button"
                  :color="getColor(item.isActivated)"
                  v-model="item.isActivated"
                  @click="userStatus(item.id, item)"
                >{{ item.isActivated ? 'Actif' : 'Inactif' }}</v-btn>
              </template>

              <template v-slot:item.actions="{item}">
                <v-row>
                  <userForm
                    :handle-submit="userStatus(item.id, item)"
                    :item="item"
                    icon="mdi-pencil"
                    color="primary"
                    small="small"
                  />
                  <div class="my-2">
                    <v-btn color="error" fab small dark>
                      <v-icon>mdi-delete</v-icon>
                    </v-btn>
                  </div>
                </v-row>
              </template>

              <template v-slot:no-data>
                <v-btn color="primary">Reset</v-btn>
              </template>
            </v-data-table>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import userForm from "./Form";
import { mapActions, mapGetters, mapState } from "vuex";
import axios from "../../interceptor";
import { items } from "../../store/modules/user/getters";
import { API_HOST } from "../../config/_entrypoint";
import state from "../../store/modules/user/state";
export default {
  components: {
    userForm
  },
  data() {
    return {
      pencil: "mdi-plus",
      color: "red",
      search: "",
      small: "small",
      yes: true,
      headers: [
        { text: "Prenom et Nom", value: "name" },
        { text: "email", value: "email" },
        { text: "Téléphone", value: "phone" },
        { text: "Etat", value: "isActivated" },
        { text: "Actions", value: "actions" }
      ]
    };
  },
  computed: {
    ...mapGetters({
      items: "user/items",
      item: "user/item"
    })
  },
  created() {
    this.getItems();
  },
  beforeDestroy() {
    this.reset();
  },
  methods: {
    ...mapActions({
      getItems: "user/getItems",
      create: "user/create"
    }),
    onSendForm() {
      this.create()
        .then(item => {
          this.$router.push({ name: "userList" });
        })
        .catch();
    },
    getColor(value) {
      if (value == true) return "green";
      else return "red";
    },
    userStatus(id, item) {
      var message;
      if (item.isActivated == true) {
        message = "Voulez-vous désactivez cette utilisateur";
      } else {
        message = "Voulez-vous activez cette utilisateur";
      }
      if (window.confirm(message)) {
        (item.isActivated = !item.isActivated),
          axios
            .put(`${API_HOST}/users/${id}`, item)
            .then(data => {})
            .catch({});
      }
    },
    editItem(item) {
      this.editedIndex = this.desserts.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    }
  }
};
</script>

<style lang="scss" >
td {
  font-size: 16px !important;
  vertical-align: middle !important;
}

th {
  font-size: 16px !important;
  vertical-align: middle !important;
}
</style>