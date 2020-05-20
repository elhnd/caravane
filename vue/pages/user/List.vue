<template>
  <v-container fluid>
    <v-row justify="space-between">
      <v-col class="col-auto">
        <h1 class="display-1 ml-lg-5 py-2 py-lg-4">Liste des users</h1>
      </v-col>
      <v-col class="col-auto">
        <v-row justify="center">
          <v-dialog v-model="dialog" persistent max-width="600px">
            <template v-slot:activator="{ on }">
              <v-btn color="success" fab dark v-on="on">
                <v-icon dark>mdi-plus</v-icon>
              </v-btn>
            </template>
            <slot></slot>
            <v-card>
              <v-card-title>
                <span class="headline">User Profile</span>
              </v-card-title>
              <v-card-text>
                <v-container>
                  <v-form ref="form" v-model="valid" @submit.prevent="onSendForm(item)">
                    <v-row>
                      <v-col cols="12" sm="6">
                        <v-text-field
                          label="Nom complet *"
                          v-model="item.name"
                          :rules="rules.nameRules"
                          required
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <v-text-field v-model="item.phone" label="Téléphone"></v-text-field>
                      </v-col>
                      <v-col cols="12">
                        <v-text-field
                          label="Email*"
                          v-model="item.email"
                          :rules="rules.emailRules"
                          required
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <v-text-field
                          label="Mot de passe *"
                          v-model="item.password"
                          type="password"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <v-autocomplete
                          :items="itemsRoles"
                          item-value="role"
                          item-text="name"
                          option-store="name"
                          label="Accés"
                          multiple
                          v-model="item.roles"
                        ></v-autocomplete>
                      </v-col>
                    </v-row>
                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn color="blue darken-1" text @click="reset">Close</v-btn>
                      <v-btn :disabled="!valid" type="submit" color="success" class="mr-4">Validate</v-btn>
                    </v-card-actions>
                  </v-form>
                </v-container>
                <small>*indicates required field</small>
              </v-card-text>
            </v-card>
          </v-dialog>
        </v-row>
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
                  <div class="my-2">
                    <v-btn color="primary" @click="editUser(item)" fab small dark>
                      <v-icon>mdi-pencil</v-icon>
                    </v-btn>
                  </div>
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
import { mapActions, mapGetters, mapState } from "vuex";
import axios from "../../interceptor";
import { items } from "../../store/modules/user/getters";
import { API_HOST } from "../../config/_entrypoint";
import state from "../../store/modules/user/state";
export default {
  data() {
    return {
      editedIndex: -1,
      pencil: "mdi-plus",
      color: "red",
      search: "",
      small: "small",
      show: false,
      dialog: false,
      valid: true,
      updatUser:false,
      headers: [
        { text: "Prenom et Nom", value: "name" },
        { text: "email", value: "email" },
        { text: "Téléphone", value: "phone" },
        { text: "Etat", value: "isActivated" },
        { text: "Actions", value: "actions" }
      ],
      itemsRoles: [
        { name: "user", role: "ROLE_USER" },
        { name: "admin", role: "ROLE_ADMIN" },
        { name: "guest", role: "ROLE_GUEST" }
      ],
      rules: {
        emailRules: [
          v => !!v || "E-mail est requis",
          v => /.+@.+\..+/.test(v) || "E-mail non valid"
        ],
        nameRules: [v => !!v || "Le nom est requis"],
        passwordRules: [
          v => !!v || "Le mot de passe est requis",
          v =>
            (v && v.length >= 6) ||
            "Le mot de passe doit être suppérieur ou égal à 6 caractéres"
        ]
      }
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
      create: "user/create",
      resets: "user/reset",
      update: "user/update"
    }),
    onSendForm(item) {
      if (this.updatUser==true) {
          axios
            .put(`${API_HOST}/users/${item.id}`, item)
            .then(data => {
              
              this.reset();
            })
            .catch({});
      }else{
        this.create()
        .then(item => {
         this.reset()
        })
        .catch();
      }
    },
    validate() {
      this.$refs.form.validate();
    },
    reset() {
      this.$refs.form.reset();
      this.$refs.form.resetValidation();
      this.dialog = false;
      this.updatUser = false;
      this.getItems();
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
    editUser(item) {
      this.updatUser = true;
      this.$store.commit("user/USER_UPDATE_ITEM", item);
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