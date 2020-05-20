<template>
  <v-card>
    <v-card-title>Liste Client</v-card-title>
    <v-data-table
      :headers="headers"
      :items="clients"
      :page.sync="page"
      :items-per-page="itemsPerPage"
      :search="search"
      class="elevation-1"
    >
      <template v-slot:top>
        <v-toolbar flat color="white" class="mt-5">
          <v-toolbar-title>
            <v-text-field
              v-model="search"
              append-icon="search"
              label="Rechercher"
              single-line
              hide-details
            ></v-text-field>
          </v-toolbar-title>
          <v-divider class="mx-4" inset vertical></v-divider>

          <v-spacer></v-spacer>
          <v-dialog v-model="dialog" persistent max-width="600px">
            <template v-slot:activator="{ on }">
              <v-btn class="mt-2" fab dark color="green">
                <v-icon dark v-on="on">mdi-plus</v-icon>
              </v-btn>
            </template>

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
        </v-toolbar>
      </template>
      <template v-slot:item.actions="{ item }">
        <v-icon md class="mr-2" @click="editItem(item)" color="primary" blue>mdi-pencil</v-icon>
        <v-icon md2 @click="deleteItem(item)" color="red" dark>mdi-delete</v-icon>
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
</template>

<script>
import axios from "axios";
import vuetifyToast from "vuetify-toast";

export default {
  name: "client",

  data: () => ({
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
      { text: "Crée le", value: "createAt", sortable: false },
      { text: "Modifié le", value: "updateAt", sortable: false },

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
      axios.get("/client/").then(response => {
        // console.log(response.data);
        this.clients = response.data;
      });
    },

    editItem(item) {
      axios.get("/client/" + item.id).then(response => {
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
      axios.delete("/client/" + item.id).then(response => {
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
          .post("/client/" + this.editedItem.id + "/edit", {
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
          .post("/client/new", {
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