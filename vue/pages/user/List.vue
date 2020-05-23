<template>
  <v-container fluid>
    <v-container>
      <v-row justify="space-between">
        <v-col v-for="info in infos" :key="info.id" cols="auto">
          <v-card :elevation="3" height="150" width="250" class="mx-auto" color="#D7CCC8">
            <v-sheet
              class="v-sheet--offset mx-auto text-left"
              color="#EFEBE9"
              elevation="12"
              max-width="calc(100% - 32px)"
            >
              <v-icon :color="info.color" size="80">{{info.icon}}</v-icon>
              <span class="headline font-weight-bold">{{info.text}}</span>
            </v-sheet>
            <v-card-text justify="end" right class="headline font-weight-bold text-end">{{info.total}}</v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>

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
            <v-card>
              <v-card-title>
                <span class="headline">User Profile</span>
                <item-errors v-if="entity" :entity="entity" />
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
                      <v-btn color="blue darken-1" text @click="reset">Fermer</v-btn>
                      <div class="my-2">
                        <v-btn
                          type="submit"
                          :loading="isLoading "
                          :disabled="isLoading || !valid"
                          color="success"
                        >
                          Valider
                          <template v-slot:loader>
                            <span>En cours...</span>
                          </template>
                        </v-btn>
                      </div>
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
                  </div>&nbsp; &nbsp;
                  <div class="my-2">
                    <v-btn color="error" @click="deleteUser(item.id)" fab small dark>
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
import ItemErrors from "../.././components/layout/errors/ItemErrors";
import { mapActions, mapGetters, mapState } from "vuex";
import axios from "../../interceptor";
import { items } from "../../store/modules/user/getters";
import { API_HOST } from "../../config/_entrypoint";
import state from "../../store/modules/user/state";
import * as crud from "../../utils/crud";
export default {
  components: { ItemErrors },
  data() {
    return {
      entity: "user",
      editedIndex: -1,
      pencil: "mdi-plus",
      color: "red",
      search: "",
      small: "small",
      show: false,
      dialog: false,
      valid: true,
      updatUser: false,
      infos: [
        {
          text: "Total",
          icon: "mdi-account-supervisor",
          total: "45",
          color: "blue"
        },
        {
          text: "Actif",
          icon: "mdi-account-check",
          total: "30",
          color: "green"
        },
        {
          text: "Inactif",
          icon: "mdi-account-lock",
          total: "15",
          color: "red"
        }
      ],
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
    isLoading() {
      if (this.$store.state.general.isLoading > 0) {
        return true;
      } else {
        return false;
      }
    },
    ...mapGetters({
      items: "user/items",
      item: "user/item",
      errors: "user/errors",
      error: "user/error"
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
      getItem: "user/getItem",
      create: "user/create",
      resets: "user/reset",
      update: "user/update",
      remove: "user/remove"
    }),
    onSendForm(item) {
      if (this.updatUser == true) {
        axios
          .put(`${API_HOST}/users/${item.id}`, item)
          .then(data => {
            this.reset();
          })
          .catch({});
      } else {
        this.create()
          .then(item => {
            this.reset();
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
    },
    deleteUser(id) {
      if (window.confirm("Voulez-vous vraiment supprimer cet utilisateur")) {
        this.remove(id).then(rep => {
          this.getItems();
          console.log(rep);
        });
      }
    }
  }
};
</script>

<style lang="scss" >
td {
  font-size: 16px !important;
  vertical-align: middle !important;
}
.v-progress-circular {
  margin: 1rem !important;
}

th {
  font-size: 16px !important;
  vertical-align: middle !important;
}

.v-sheet--offset {
  top: -20px;
  position: relative;
}
</style>