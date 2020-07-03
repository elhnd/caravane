<template>
  <v-container fluid>
    <h1 class="my-5 display-1 subheading grey--text">Produits</h1>
    <v-card>
      <v-data-table
        :headers="headers"
        :items="produits"
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
                    <v-icon color="#555" left>mdi-tag-plus</v-icon>
                    <span style="color:#555;">Ajouter un produit</span>
                  </v-btn>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-btn class="ma-4 brunfonce" @click="dialogFournisseur = true" large tile dark>
                    <v-icon color="#555" left>mdi-account-plus</v-icon>
                    <span style="color:#555;">Dépot par un fournisseur</span>
                  </v-btn>
                </v-col>
              </v-row>
            </v-card-title>
          </v-col>
          <v-spacer></v-spacer>
          <v-dialog v-model="dialog" persistent max-width="1000px">
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
                        <v-text-field v-model="editedItem.taille" required label="Taille"></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field v-model="editedItem.age" required label="Age"></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field v-model="editedItem.pointure" required label="Pointure"></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field v-model="editedItem.couleur" required label="Couleur"></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field
                          v-model.number="editedItem.quantite"
                          required
                          label="Quantite"
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

          <v-dialog v-model="dialogFournisseur" persistent max-width="1000px">
            <v-card>
              <v-card-title>
                <span class="headline">Sélectionner un fournisseur</span>
              </v-card-title>

              <v-card-text>
                <v-form ref="form" v-model="valid" valid>
                  <v-container>
                    <v-row>
                      <v-col cols="12" sm="6" md="12">
                        <v-autocomplete
                          :items="allFournisseurs"
                          v-model="idFournisseur"
                          item-text="structure"
                          item-value="id"
                          :rules="produitRules"
                          required
                          label="Fournisseur"
                        ></v-autocomplete>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-form>
              </v-card-text>

              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="close">Annuler</v-btn>
                <v-btn
                  color="blue darken-1"
                  text
                  :disabled="!valid"
                  @click="depotFournisseur"
                >Envoyer</v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>

          <!-- </v-toolbar> -->
        </template>
        <template v-slot:item.createAt="{item}">
          <div>
            <span>{{crmDateFormat(item.createAt)}}</span>
          </div>
        </template>
        <template v-slot:item.updateAt="{item}">
          <div>
            <span>{{crmDateFormat(item.updateAt)}}</span>
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
      <v-snackbar
        v-model="snackbar"
        :color="colorSnackbar"
        multi-line
        right
        :timeout="timeout"
        top
        vertical
      >{{ textSnackbar }}</v-snackbar>
    </v-card>
    <!-- <template>
      <div>
        <v-alert type="success" top>I'm a success alert.</v-alert>
      </div>
    </template>-->
  </v-container>
</template>

<script>
import axios from "axios";
import vuetifyToast from "vuetify-toast";

export default {
  name: "produit",

  data: () => ({
    snackbar: false,
    textSnackbar: "",
    timeout: 5000,
    colorSnackbar: "",
    dialogFournisseur: false,
    idFournisseur: null,
    allFournisseurs: [],
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
        text: "Taille",
        align: "start",
        sortable: false,
        value: "taille"
      },
      {
        text: "Age",
        align: "start",
        sortable: false,
        value: "age"
      },
      {
        text: "Pointure",
        align: "start",
        sortable: false,
        value: "pointure"
      },
      {
        text: "couleur",
        align: "start",
        sortable: false,
        value: "couleur"
      },
      {
        text: "quantite",
        align: "start",
        sortable: false,
        value: "quantite"
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
      taille: "",
      age: "",
      pointure: "",
      couleur: "",
      structure: "",
      prixVente: 0,
      stockInitial: 0,
      stock: 0,
      qteVendue: 0,
      ligne: 0,
      quantite: 0
    },
    produitRules: [v => !!v || "Champ requise"],
    defaultItem: {
      id: 0,
      libelle: "",
      designation: "",
      taille: "",
      age: "",
      pointure: "",
      couleur: "",
      structure: "",
      prixVente: 0,
      stockInitial: 0,
      stock: 0,
      qteVendue: 0,
      ligne: 0,
      quantite: 0
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
    this.getFournisseurs();
  },

  methods: {
    fetchproduits() {
      axios.get("/api/produit").then(response => {
        this.produits = response.data;
      });
    },
    depotFournisseur() {
      axios
        .get(`/api/access/fournisseurs/${this.idFournisseur}`)
        .then(resp => {
          this.colorSnackbar = "green";
          this.snackbar = true;
          this.textSnackbar = "Demande de dépot envoyée";
          this.close();
        })
        .catch(err => {
          this.colorSnackbar = "red";
          this.snackbar = true;
          this.textSnackbar = "Echec envoie";
          this.close();
        });
    },
    getFournisseurs() {
      axios.get("/api/fournisseurs").then(response => {
        this.allFournisseurs = response.data["hydra:member"];
      });
    },
    fetchfournisseurs() {
      var structu = [];

      axios.get("/api/fournisseur/").then(response => {
        this.fournisseurs = response.data;
        this.fournisseurs.forEach(element => structu.push(element.structure));
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
      this.dialogFournisseur = false;
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
          .post("/api/modifierproduit/" + this.editedItem.id, {
            id: this.editedItem.id,
            designation: this.editedItem.designation,
            structure: this.editedItem.structure,
            libelle: this.editedItem.libelle,
            prixVente: this.editedItem.prixVente,
            taille: this.editedItem.taille,
            age: this.editedItem.age,
            pointure: this.editedItem.pointure,
            couleur: this.editedItem.couleur,
            quantite: this.editedItem.quantite
          })
          .then(response => {
            console.log(response);
            this.fetchproduits();
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
            taille: this.editedItem.taille,
            age: this.editedItem.age,
            pointure: this.editedItem.pointure,
            couleur: this.editedItem.couleur,
            quantite: this.editedItem.quantite
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