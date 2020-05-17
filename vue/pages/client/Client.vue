<template>
  <v-data-table :headers="headers" :items="clients" sort-by="nom" class="elevation-1">
    <template v-slot:top>
      <v-toolbar flat color="white" class="mt-5">
        <v-toolbar-title>
          <h3>List Client</h3>
        </v-toolbar-title>
        <v-divider class="mx-4" inset vertical></v-divider>
        <v-spacer></v-spacer>
        <v-dialog v-model="dialog" max-width="500px">
          <template v-slot:activator="{ on }">
            <v-btn class="mt-2" fab dark color="green">
              <v-icon dark v-on="on">mdi-plus</v-icon>
            </v-btn>
          </template>
          <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
            </v-card-title>

            <v-card-text>e
              <v-container>
                <v-row>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.nom" label="Nom"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.prenom" label="Prénom"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.prix" label="Prix"></v-text-field>
                  </v-col>
                </v-row>
              </v-container>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
              <v-btn color="blue darken-1" text @click="save">Save</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-toolbar>
    </template>
    <template v-slot:item.actions="{ item }">
      <v-icon small class="mr-2" @click="editItem(item)">mdi-pencil</v-icon>
      <v-icon small @click="deleteItem(item)">mdi-delete</v-icon>
    </template>
    <template v-slot:no-data>
      <v-btn color="primary" @click="fetchClients">Reset</v-btn>
    </template>
  </v-data-table>
</template>

<script>
import axios from "axios";
export default {
  name: "client",

  data: () => ({
    dialog: false,
    search: "",
    headers: [
      {
        text: "Nom",
        align: "start",
        sortable: false,
        value: "nom"
      },
      { text: "Prenom", value: "prenom" },
      { text: "Prix", value: "prix" },
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
    defaultItem: {
      nom: "",
      prenom: "",
      prix: 0
    }
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "New Item" : "Edit Item";
    }
  },

  watch: {
    dialog(val) {
      val || this.close();
    }
  },

  created() {
    this.fetchClients();
  },

  methods: {
    fetchClients() {
      axios.get("/client/").then(response => {
        console.log(response.data);
        this.clients = response.data;
      });
    },

    editItem(item) {
      console.log(item.id);
      axios.get("/client/" + item.id).then(response => {
        console.log(response);
        //this.clients = response.data;
      });
      this.editedIndex = this.clients.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },

    deleteItem(item) {
      console.log(item);

      const index = this.clients.indexOf(item);
      confirm("Are you sure you want to delete this item?") &&
        this.clients.splice(index, 1);
      axios.delete("/client/" + item.id).then(response => {
        console.log(response);
        //this.clients = response.data;
      });
    },

    close() {
      this.dialog = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    save() {
      if (this.editedIndex > -1) {
        console.log(this.editedItem.id);
        axios
          .post("/client/" + this.editedItem.id + "/edit", {
            nom: this.editedItem.nom,
            prenom: this.editedItem.prenom,
            prix: this.editedItem.prix
          })
          .then(response => {
            console.log(response);
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
            console.log(response);
            //this.clients = response.data;
          });
        this.clients.push(this.editedItem);
      }
      this.close();
      this.fetchClients();
    }
  }
};
</script>