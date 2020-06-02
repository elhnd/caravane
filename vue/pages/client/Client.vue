<template>
  <v-container fluid>
    <h1 class="my-5 display-1 subheading grey--text">Clients</h1>
    <v-card>
      <v-data-table
        :headers="headers"
        :items="clients"
        :page.sync="page"
        :items-per-page="itemsPerPage"
        :search="search"
        class="elevation-1"
      >
        <template v-slot:top>
          <!-- <v-toolbar flat color="white" class="mt-5">
            <v-toolbar-title>
              <v-text-field
                v-model="search"
                append-icon="search"
                label="Rechercher"
                single-line
                hide-details
              ></v-text-field>
            </v-toolbar-title>
          <v-divider class="mx-4" inset vertical></v-divider>-->
          <v-col cols="12">
            <v-card-title class="p-n12 mt-n8 mb-n8">
              <v-row justify="space-between">
                <v-col cols="12" sm="6" md="3">
                  <v-text-field
                    v-model="search"
                    append-icon="search"
                    label="Recherche"
                    single-line
                    hide-details
                  ></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-btn class="ma-4 brunfonce" @click="dialog = true" large tile dark>
                    <v-icon color="#555" left>mdi-book-account</v-icon>
                    <span style="color:#555;">Ajouter un client</span>
                  </v-btn>
                </v-col>
              </v-row>
            </v-card-title>

            <v-col cols="6">
              <v-row justify="start">
                <v-text-field
                  label="Date de début"
                  v-model="date.dateStart"
                  append-icon="event"
                  single-line
                  type="date"
                ></v-text-field>&nbsp;&nbsp;&nbsp;
                <v-text-field
                  label="Date de fin"
                  v-model="date.dateEnd"
                  append-icon="event"
                  single-line
                  type="date"
                ></v-text-field>

                <v-btn class="ma-4 brunfonce" @click="fetchClients()" large tile dark>
                  <v-icon color="#555" left>mdi-book-account</v-icon>
                  <span style="color:#555;">Rechercher</span>
                </v-btn>
              </v-row>

              <!-- <v-menu
                v-model="menu2"
                :close-on-content-click="false"
                :nudge-right="40"
                transition="scale-transition"
                offset-y
                min-width="290px"
              >
                <template v-slot:activator="{ on }">
                  <v-text-field
                    v-model="date"
                    label="Picker without buttons"
                    prepend-icon="event"
                    readonly
                    v-on="on"
                  ></v-text-field>
                </template>
                <v-date-picker v-model="date" @input="menu2 = false"></v-date-picker>
              </v-menu>-->
            </v-col>
          </v-col>
          <v-spacer></v-spacer>
          <v-dialog v-model="dialog" persistent max-width="600px">
            <!-- <template v-slot:activator="{ on }">
                <v-btn class="mt-2" fab dark color="green">
                  <v-icon dark v-on="on">mdi-plus</v-icon>
                </v-btn>
            </template>-->

            <v-card>
              <v-card-title>
                <span class="headline">{{ formTitle }}</span>
              </v-card-title>

              <v-card-text>
                <v-form ref="form" v-model="valid" valid>
                  <v-container>
                    <v-row>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          v-model="editedItem.prenom"
                          :rules="ItemRules"
                          required
                          label="Prénom"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          v-model="editedItem.nom"
                          :rules="ItemRules"
                          required
                          label="Nom"
                        ></v-text-field>
                      </v-col>

                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          v-model="editedItem.prix"
                          :rules="ItemRules"
                          required
                          label="Prix"
                        ></v-text-field>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-form>
              </v-card-text>

              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="close">Annuler</v-btn>
                <v-btn color="blue darken-1" text @click="save" :disabled="!valid">Enregistrer</v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
          <!-- </v-toolbar> -->
        </template>
        <template v-slot:item.ligne="{item}">
          <div>
            <span>{{item.index}}</span>
          </div>
        </template>
        <template v-slot:item.createdAt="{item}">
          <div>
            <span>{{crmDateFormat(item.createdAt)}}</span>
          </div>
        </template>
        <template v-slot:item.updatedAt="{item}">
          <div>
            <span>{{crmDateFormat(item.updatedAt)}}</span>
          </div>
        </template>
        <template v-slot:item.actions="{ item }">
          <!-- <v-icon md class="mr-2" @click="editItem(item)" color="primary" blue>mdi-pencil</v-icon>
          <v-icon md2 @click="deleteItem(item)" color="red" dark>mdi-delete</v-icon>-->

          <v-row>
            <div class="my-2">
              <v-btn color="primary" tile @click="editItem(item)" fab small dark>
                <v-icon>mdi-pencil</v-icon>
              </v-btn>
            </div>&nbsp; &nbsp;
            <div class="my-2">
              <v-btn color="error" tile @click="deleteItem(item)" fab small dark>
                <v-icon>mdi-delete</v-icon>
              </v-btn>
            </div>
          </v-row>
        </template>
        <template v-slot:no-data>
          <v-btn color="primary" @click="fetchClients">Reset</v-btn>
        </template>
        <div class="text-center pt-2">
          <v-pagination v-model="page" :length="pageCount"></v-pagination>
          <v-text-field
            :value="itemsPerPage"
            label="Items per page"
            type="number"
            min="-1"
            max="15"
            @input="itemsPerPage = parseInt($event, 10)"
          ></v-text-field>
        </div>
      </v-data-table>
    </v-card>
  </v-container>
</template>

<script>
import axios from "../../interceptor";
import { items } from "../../store/modules/user/getters";
import { API_HOST } from "../../config/_entrypoint";
import vuetifyToast from "vuetify-toast";
import DateFieldPicker from "../../components/layout/fields/DatePicker";

export default {
  name: "client",
  components: { DateFieldPicker },

  data: () => ({
    date: {
      dateStart: "",
      dateEnd: ""
    },
    // date: new Date().toISOString().substr(0, 10),
    // menu: false,
    // modal: false,
    // menu2: false,
    dialog: false,
    valid: true,
    search: "",
    page: 1,
    pageCount: 0,
    itemsPerPage: 12,
    headers: [
      {
        text: "ID",
        align: "start",
        sortable: false,
        value: "ligne"
      },
      { text: "Prenom", value: "prenom", sortable: false },
      {
        text: "Nom",
        align: "start",
        sortable: false,
        value: "nom"
      },
      { text: "Prix", value: "prix", sortable: false },
      { text: "Crée le", value: "createdAt", sortable: false },
      { text: "Modifié le", value: "updatedAt", sortable: false },

      { text: "Actions", value: "actions", sortable: false }
    ],
    clients: [],
    editedIndex: -1,
    editedItem: {
      id: 0,
      nom: "",
      prenom: "",
      prix: 0
    },
    ItemRules: [v => !!v || "Champ requise"],
    defaultItem: {
      nom: "",
      prenom: "",
      prix: 0
    }
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "Ajout Client" : "Modifier Client";
    }
  },

  watch: {
    dialog(val) {
      // console.log(val);

      val || this.close();
    }
  },

  created() {
    this.fetchClients();
  },

  methods: {
    fetchClients() {
      axios
        .get(`/api/clients/${this.date.dateStart}/${this.date.dateEnd}`)
        .then(response => {
          console.log(response.data["hydra:member"]);
          this.clients = response.data["hydra:member"];
        });
    },

    editItem(item) {
      axios.get("/api/client/" + item.id).then(response => {
        // console.log(response);
        //this.clients = response.data;
      });
      this.editedIndex = this.clients.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },

    deleteItem(item) {
      // console.log(item);

      const index = this.clients.indexOf(item);
      confirm("Voulez-vous vraiment supprimer ?") &&
        this.clients.splice(index, 1);
      axios.delete("/api/client/" + item.id).then(response => {
        // console.log(response);
        //this.clients = response.data;
      });
    },

    close() {
      this.dialog = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
      this.$refs.form.reset();
    },

    save() {
      this.$refs.form.validate();

      if (this.editedIndex > -1) {
        // console.log(this.editedItem.id);
        axios
          .post("/api/client/" + this.editedItem.id + "/edit", {
            nom: this.editedItem.nom,
            prenom: this.editedItem.prenom,
            prix: this.editedItem.prix
          })
          .then(response => {
            vuetifyToast.success(response.data.message);
            // console.log(response);
            //this.clients = response.data;
          });
        Object.assign(this.clients[this.editedIndex], this.editedItem);
      } else {
        axios
          .post(`${API_HOST}/client/new`, {
            nom: this.editedItem.nom,
            prenom: this.editedItem.prenom,
            prix: this.editedItem.prix
          })
          .then(response => {
            //  console.log(response.data.message);
            vuetifyToast.success(response.data.message);
          });
        this.clients.push(this.editedItem);
      }
      this.close();
      this.fetchClients();
      this.$refs.form.reset();
      this.$refs.form.resetValidation();
    }
  }
};
</script>