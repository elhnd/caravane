<template>
  <v-card>
    <v-card-title>Liste Produit</v-card-title>
    <v-data-table
      :headers="headers"
      :items="produits"
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
          <v-dialog v-model="dialog" persistent max-width="1000px">
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
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field
                          v-model="editedItem.designation"
                          :rules="produitRules"
                          required
                          label="Désignation"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field
                          v-model="editedItem.prixVente"
                          :rules="produitRules"
                          required
                          label="Prix Vente"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="12">
                        <v-select
                          :items="structure"
                          v-model="editedItem.structure"
                          :rules="produitRules"
                          required
                          label="Fournisseur"
                        ></v-select>
                      </v-col>
                      <v-col cols="12" sm="6" md="12">
                        <v-select
                          :items="libelle"
                          v-model="editedItem.libelle"
                          :rules="produitRules"
                          required
                          label="Catégorie"
                        ></v-select>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-form>
              </v-card-text>

              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="close">Annuler</v-btn>
                <v-btn color="blue darken-1" text :disabled="!valid" @click="save">Enregistrer</v-btn>
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
        <v-btn color="primary" @click="fetchproduits">Reset</v-btn>
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
  name: "produit",

  data: () => ({
    path: "",
    structure: [],
    libelle: [],
    produits: [],
    dialog: false,
    details: false,
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
      {
        text: "Désignation",
        align: "start",
        sortable: false,
        value: "designation"
      },
      {
        text: "Catégorie",
        align: "start",
        sortable: false,
        value: "libelle"
      },
      {
        text: "Fournisseur",
        align: "start",
        sortable: false,
        value: "structure"
      },

      {
        text: "Prix Vente",
        align: "start",
        sortable: false,
        value: "prixVente"
      },
      { text: "Crée le", value: "createAt", sortable: false },
      { text: "Modifié le", value: "updateAt", sortable: false },
      { text: "Actions", value: "actions", sortable: false }
    ],
    editedIndex: -1,
    editedItem: {
      id: 0,
      libelle: "",
      designation: "",
      structure: "",
      prixVente: 0,
      stockInitial: 0,
      stock: 0,
      qteVendue: 0,
      ligne: 0
    },
    produitRules: [v => !!v || "Champ requise"],
    defaultItem: {
      id: 0,
      libelle: "",
      designation: "",
      structure: "",
      prixVente: 0,
      stockInitial: 0,
      stock: 0,
      qteVendue: 0,
      ligne: 0
    }
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "Ajout Produit" : "Modifié Produit";
    }
  },

  watch: {
    dialog(val) {
      val || this.close();
    }
  },

  created() {
    this.fetchproduits();
    this.fetchfournisseurs();
    this.fetchCategorie();
  },

  methods: {
    fetchproduits() {
      axios.get("/api/produit").then(response => {
        this.produits = response.data;
      });
    },
    fetchfournisseurs() {
      var structu = [];

      axios.get("/api/fournisseur/").then(response => {
        this.fournisseurs = response.data;
        this.fournisseurs.forEach(element => structu.push(element.structure));
        console.log();
        this.structure = structu;
      });
    },

    fetchCategorie() {
      var prod = [];

      axios.get("/api/showcategory").then(response => {
        this.categories = response.data;
        this.categories.forEach(element => prod.push(element.libelle));
        this.libelle = prod;
      });
    },

    editItem(item) {
      console.log(item.id);
      axios.get("/modifierproduit/" + item.id).then(response => {
        console.log(response);
        //this.ID = response.data;
      });
      this.editedIndex = this.produits.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },

    deleteItem(item) {
      console.log(item);

      const index = this.produits.indexOf(item);
      confirm("Voulez-vous vraiment supprimer ?") &&
        this.produits.splice(index, 1);
      axios.delete("/api/supprimmerCategory/" + item.id).then(response => {
        console.log(response);
        //this.produits = response.data;
      });
    },

    close() {
      this.$refs.form.resetValidation();
      this.dialog = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    save() {
      this.$refs.form.validate();
      console.log(this.editedItem);
      if (this.editedIndex > -1) {
        axios
          .post("/api/modifierproduit/"+this.editedItem.id, {
            id: this.editedItem.id,
            designation: this.editedItem.designation,
            structure: this.editedItem.structure,
            libelle: this.editedItem.libelle,
            prixVente: this.editedItem.prixVente,
          })
          .then(response => {
            console.log(response);
            //this.produits = response.data;
          });
        Object.assign(this.produits[this.editedIndex], this.editedItem);
      } else {
        axios
          .post("/api/newProduit", {
            designation: this.editedItem.designation,
            structure: this.editedItem.structure,
            libelle: this.editedItem.libelle,
            prixVente: this.editedItem.prixVente,
          })
          .then(response => {
            // this.produits = response.data;
            vuetifyToast.success(response.data.message);
          });
        this.produits.push(this.editedItem);
      }
      this.close();
      this.fetchproduits();
      this.fetchfournisseurs();
      this.fetchCategorie();
      this.$refs.form.reset();
    }
  }
};
</script>