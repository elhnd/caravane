<template>
  <v-container fluid>
    <v-container>
      <v-col class="col-auto">
        <h1 class="display-1 ml-lg-5 py-2 py-lg-4">Liste des utilisateurs</h1>
      </v-col>
      <v-row justify="space-between">
        <CardsInfos
          icon="mdi-account-supervisor"
          libelle="Total"
          :number="countUserData.totalUser"
          color="blue"
        />
        <CardsInfos
          icon="mdi-account-check"
          libelle="Actifs"
          :number="countUserData.totalUserActifs"
          color="green"
        />
        <CardsInfos
          icon="mdi-account-lock"
          libelle="Inactifs"
          :number="countUserData.totalUserInactifs"
          color="red"
        />
      </v-row>
    </v-container>

    <v-row justify="space-between">
      <v-col class="col-auto">
        <v-row justify="center">
          <v-dialog v-model="dialog" persistent max-width="600px">
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
          <v-col cols="12">
            <v-card-title>
              <v-row justify="space-between">
                <v-col cols="12" sm="6" md="3">
                  <v-text-field
                    v-model="search"
                    append-icon="search"
                    label="Search"
                    single-line
                    hide-details
                  ></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-btn
                    class="ma-4"
                    @click="dialog = true,updatUser = false"
                    large
                    tile
                    color="#D7CCC8"
                    dark
                  >
                    <v-icon color="#555" left>mdi-account-plus</v-icon>
                    <span style="color:#555;">Ajouter un utilisateur</span>
                  </v-btn>
                </v-col>
              </v-row>
            </v-card-title>
          </v-col>
          <v-data-table :headers="headers" :items="items" :search="search">
            <template v-slot:item.isActivated="{item}">
              <v-btn
                type="button"
                tile
                :color="getColor(item.isActivated)"
                v-model="item.isActivated"
                @click="userStatus(item.id, item)"
              >{{ item.isActivated ? 'Actif' : 'Inactif' }}</v-btn>
            </template>

            <template v-slot:item.actions="{item}">
              <v-row>
                <div class="my-2">
                  <v-btn color="primary" tile @click="editUser(item)" fab small dark>
                    <v-icon>mdi-pencil</v-icon>
                  </v-btn>
                </div>&nbsp; &nbsp;
                <div class="my-2">
                  <v-btn color="error" tile @click="deleteUser(item.id)" fab small dark>
                    <v-icon>mdi-delete</v-icon>
                  </v-btn>
                </div>
              </v-row>
            </template>

            <template v-slot:no-data>
              <v-btn color="primary">Reset</v-btn>
            </template>
          </v-data-table>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import CardsInfos from "../../components/layout/CardsInfos";
import ItemErrors from "../.././components/layout/errors/ItemErrors";
import { mapActions, mapGetters, mapState } from "vuex";
import axios from "../../interceptor";
import { items } from "../../store/modules/user/getters";
import { API_HOST } from "../../config/_entrypoint";
import state from "../../store/modules/user/state";
import * as crud from "../../utils/crud";
export default {
  components: { ItemErrors, CardsInfos },
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
      countUserData: {},
      updatUser: false,
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
    test() {
      console.log(this.countUserData);
      return this.countUserData;
    },
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
    this.countUser(), this.getItems();
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
            this.countUser();
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
            .then(data => {
              this.countUser();
            })
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
          this.countUser();
          console.log(rep);
        });
      }
    },
    countUser() {
      axios.get(`${API_HOST}/totaluser`).then(resp => {
        return (this.countUserData = resp.data);
      });
    }
  }
};
</script>

<style lang="scss" >
td {
  font-size: 16px !important;
  vertical-align: middle;
}
.v-progress-circular {
  margin: 1rem !important;
}

th {
  font-size: 16px !important;
  vertical-align: middle !important;
}

table {
  font-family: "Arial";

  border-collapse: collapse;
  border: 1px solid #eee;
  tr {
    &:hover {
      background: #f4f4f4;

      td {
        color: #555;
      }
    }
  }
  th,
  td {
    color: rgb(66, 65, 65);
    border: 1px solid #eee;
    padding: 12px 35px;
    border-collapse: collapse;
  }
  th {
    background: #d7ccc8;
    color: #fff;
    text-transform: uppercase;
    font-size: 12px;
    &.last {
      border-right: none;
    }
  }
}
</style>