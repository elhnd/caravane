<template>
  <v-card>
    <v-card-title>
      <v-text-field v-model="search" append-icon="search" label="Rechercher" single-line hide-details></v-text-field>
    </v-card-title>
    <v-data-table
      :headers="headers"
      :items="fournisseurs"
      sort-by="tel"
      :page.sync="page"
      :items-per-page="itemsPerPage"
      :search="search"
      class="elevation-1"
    >
      <template v-slot:top>
        <v-toolbar flat color="white" class="mt-5">
          <v-toolbar-title>
            <h3>Liste fournisseur</h3>
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

              <v-card-text>
                <v-container>
                  <v-row>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.structure" label="Structure"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.nomGerant" label="Nom Gérant"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.tel" label="Tel"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.email" label="Email"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.adresse" label="Adresse"></v-text-field>
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
        <v-btn color="primary" @click="fetchfournisseurs">Reset</v-btn>
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
export default {
  name: "fournisseur",

  data: () => ({
    dialog: false,
    search: "",
    page: 1,
    pageCount: 0,
    itemsPerPage: 12,
    headers: [
      {
        text: "Structure",
        align: "start",
        sortable: false,
        value: "structure"
      },
      { text: "Nom Gérant", value: "nomGerant" },
      { text: "Téléphone", value: "tel" },
      { text: "Email", value: "email" },
      { text: "Adresse", value: "adresse" },
      { text: "Actions", value: "actions", sortable: false }
    ],
    fournisseurs: [],
    editedIndex: -1,
    editedItem: {
      id: 0,
      structure: "",
      nomGerant: "",
      tel: "",
      email: "",
      adresse: ""
    },
    defaultItem: {
      structure: "",
      nomGerant: "",
      tel: "",
      email: "",
      adresse: ""
    }
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "New Fournisseur" : "Edit Fournisseur";
    }
  },

  watch: {
    dialog(val) {
      val || this.close();
    }
  },

  created() {
    this.fetchfournisseurs();
  },

  methods: {
    fetchfournisseurs() {
      axios.get("/fournisseur/").then(response => {
        console.log(response.data);
        this.fournisseurs = response.data;
      });
    },

    editItem(item) {
      console.log(item.id);
      axios.get("/fournisseur/" + item.id).then(response => {
        console.log(response);
        //this.fournisseurs = response.data;
      });
      this.editedIndex = this.fournisseurs.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },

    deleteItem(item) {
      console.log(item);

      const index = this.fournisseurs.indexOf(item);
      confirm("Are you sure you want to delete this item?") &&
        this.fournisseurs.splice(index, 1);
      axios.delete("/fournisseur/" + item.id).then(response => {
        console.log(response);
        //this.fournisseurs = response.data;
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
          .post("/fournisseur/" + this.editedItem.id + "/edit", {
            structure: this.editedItem.structure,
            nomGerant: this.editedItem.nomGerant,
            tel: this.editedItem.tel,
            email: this.editedItem.email,
            adresse: this.editedItem.adresse
          })
          .then(response => {
            console.log(response);
            //this.fournisseurs = response.data;
          });
        Object.assign(this.fournisseurs[this.editedIndex], this.editedItem);
      } else {
        axios
          .post("/fournisseur/new", {
            structure: this.editedItem.structure,
            nomGerant: this.editedItem.nomGerant,
            tel: this.editedItem.tel,
            email: this.editedItem.email,
            adresse: this.editedItem.adresse
          })
          .then(response => {
            console.log(response);
            //this.fournisseurs = response.data;
          });
        this.fournisseurs.push(this.editedItem);
      }
      this.close();
      this.fetchfournisseurs();
    }
  }
};
</script>