<template>
  <v-container fluid>
    <h1 class="my-5 display-1 subheading grey--text">Produits en attente</h1>
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
              </v-row>
            </v-card-title>
          </v-col>
          <v-spacer></v-spacer>
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
        <template v-slot:item.depot="{item}">
          <div class="my-2">
            <div class="text-center my-2">
              <v-menu transition="scale-transition" origin="center center">
                <template v-slot:activator="{ on, attrs }">
                  <v-btn
                    v-if="item.depot=='en_attente'"
                    color="warning"
                    v-bind="attrs"
                    v-on="on"
                    tile
                    dark
                  >En attente</v-btn>
                  <v-btn
                    v-if="item.depot=='rejeter'"
                    color="error"
                    v-bind="attrs"
                    v-on="on"
                    tile
                    dark
                  >Rejeter</v-btn>
                </template>
                <v-list>
                  <v-list-item
                    v-for="n in choiceDepot"
                    :key="n.text"
                    @click="changeStatut(item,n.value)"
                  >
                    <v-list-item-title>{{n.text}}</v-list-item-title>
                  </v-list-item>
                </v-list>
              </v-menu>
            </div>
          </div>
        </template>
        <template v-slot:item.actions="{ item }">
          <v-row>
            <div class="my-2">
              <v-btn color="primary" tile @click="edit(item)" fab small dark>
                <v-icon>mdi-pencil</v-icon>
              </v-btn>
            </div>&nbsp; &nbsp;
            <div class="my-2">
              <v-btn color="error" tile @click="deleteProd(item.id)" fab small dark>
                <v-icon>mdi-delete</v-icon>
              </v-btn>
            </div>
          </v-row>
        </template>
        <template v-slot:no-data>
          <v-btn color="primary" @click="fetchproduits">Reset</v-btn>
        </template>
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
    <v-dialog v-model="dialog" persistent max-width="1000px">
      <v-card>
        <v-card-title>
          <span class="headline">Modification</span>
        </v-card-title>
        <v-card-text>
          <v-form ref="form" v-model="valid" valid>
            <v-container>
              <v-row>
                <v-col cols="6" sm="4">
                  <v-text-field
                    v-model="editedItem.designation"
                    :rules="produitRules"
                    required
                    label="Désignation"
                  ></v-text-field>
                </v-col>
                <v-col cols="6" sm="4">
                  <v-text-field v-model.number="editedItem.quantite" required label="Quantite"></v-text-field>
                </v-col>
                <v-col cols="6" sm="4">
                  <v-text-field
                    v-model.number="editedItem.prixVente"
                    :rules="produitRules"
                    type="number"
                    required
                    label="Prix Vente"
                  ></v-text-field>
                </v-col>
                <v-col cols="6" sm="6">
                  <v-select
                    :items="libelle"
                    v-model="editedItem.libelle"
                    :rules="produitRules"
                    required
                    label="Catégorie"
                  ></v-select>
                </v-col>
                <v-col cols="6" sm="6">
                  <v-select
                    :items="structure"
                    v-model="editedItem.structure"
                    :rules="produitRules"
                    required
                    label="Fournisseur"
                  ></v-select>
                </v-col>
                <v-checkbox v-model="declinaison" class="mx-2" label="Déclinaisons"></v-checkbox>
                <v-card outlined v-if="declinaison">
                  <v-col cols="12">
                    <v-row>
                      <v-checkbox class="mx-2" v-model="taille" label="Taille: "></v-checkbox>
                      <v-col cols="8" v-if="taille">
                        <v-autocomplete
                          v-model="editedItem.taille"
                          :items="declinaisonsTypes"
                          dense
                        ></v-autocomplete>
                      </v-col>
                    </v-row>
                  </v-col>
                  <v-col cols="12">
                    <v-row>
                      <v-checkbox class="mx-2" v-model="age" label="Age: "></v-checkbox>
                      <v-col cols="8" v-if="age">
                        <v-autocomplete v-model="editedItem.age" :items="declinaisonsTypes" dense></v-autocomplete>
                      </v-col>
                    </v-row>
                  </v-col>
                  <v-col cols="12">
                    <v-row>
                      <v-checkbox class="mx-2" v-model="pointure" label="Pointure: "></v-checkbox>
                      <v-col cols="8" v-if="pointure">
                        <v-autocomplete
                          v-model="editedItem.pointure"
                          :items="declinaisonsTypes"
                          dense
                        ></v-autocomplete>
                      </v-col>
                    </v-row>
                  </v-col>
                  <v-col cols="12">
                    <v-row>
                      <v-checkbox class="mx-2" v-model="couleur" label="Couleur: "></v-checkbox>
                      <v-col cols="8" v-if="couleur">
                        <v-autocomplete v-model="editedItem.couleur" :items="couleursTypes" dense></v-autocomplete>
                      </v-col>
                    </v-row>
                  </v-col>
                </v-card>
              </v-row>
            </v-container>
          </v-form>
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="close">Annuler</v-btn>
          <v-btn color="blue darken-1" text :disabled="!valid" @click="save()">Enregistrer</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
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
import XLSX from "xlsx";

export default {
  name: "en_attente",
  props: {
    beforeUpload: Function, // eslint-disable-line
    onSuccess: Function // eslint-disable-line
  },
  data: () => ({
    declinaison: false,
    taille: false,
    age: false,
    pointure: false,
    couleur: false,
    agesTypes: ["1", "2", "3", "4", "5", "6"],
    declinaisonsTypes: ["", "PM", "GM", "MM", "S", "M", "L", "XL", "XXL"],
    couleursTypes: [
      "Bleu",
      "Gris",
      "Maron",
      "Orange",
      "Rouge",
      "Violet",
      "Blanc",
      "Jaune",
      "Noir",
      "Rose",
      "Vert"
    ],
    dialog: false,
    snackbar: false,
    textSnackbar: "",
    timeout: 5000,
    colorSnackbar: "",
    allFournisseurs: [],
    structure: [],
    fournisseurs: [],
    produits: [],
    libelle: [],
    categories: "",
    valid: true,
    search: "",
    page: 1,
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
    choiceDepot: [
      { text: "VALIDER", value: "valider" },
      { text: "REJETER", value: "rejeter" }
    ],
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
      {
        text: "Statut",
        align: "start",
        sortable: false,
        value: "depot"
      },
      { text: "Crée le", value: "createAt", sortable: false },
      { text: "Modifié le", value: "updateAt", sortable: false },
      { text: "Actions", value: "actions", sortable: false }
    ],
    editedIndex: -1
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "Ajout Produit" : "Modifié Produit";
    }
  },

  watch: {},

  created() {
    this.fetchproduits();
    this.getFournisseurs();
    this.fetchCategorie();
    this.fetchfournisseurs();
  },

  methods: {
    save() {
      this.editedItem.prixVente = parseInt(this.editedItem.prixVente);
      axios
        .put(`api/produits/${this.editedItem.id}`, this.editedItem)
        .then(resp => {
          console.log(resp);
          this.fetchproduits();
          this.close();
        });
    },
    deleteProd(id) {
      if (window.confirm("Voulez-vous vraiment supprimer ce produit")) {
        axios.delete(`api/produits/${id}`).then(resp => {
          this.fetchproduits();
          console.log(resp);
        });
      }
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
    changeStatut(item, n) {
      if (window.confirm("Voulez-vous vraiment " + n + " ce produit")) {
        item.depot = n;
        item.prixVente = parseInt(item.prixVente);
        axios.put(`/api/produits/${item.id}`, item).then(resp => {
          this.fetchproduits();
        });
      }
    },
    fetchproduits() {
      axios.get("/api/produit").then(response => {
        var tri = [];
        response.data.forEach(data => {
          if (data.depot == "en_attente" || data.depot == "rejeter") {
            tri.push(data);
          }
        });
        this.produits = tri;
      });
    },
    getFournisseurs() {
      axios.get("/api/fournisseurs").then(response => {
        this.allFournisseurs = response.data["hydra:member"];
      });
    },
    edit(item) {
      if (item.age || item.couleur || item.taille || item.pointure) {
        this.declinaison = true;
        if (item.age) {
          this.age = true;
        }
        if (item.couleur) {
          this.couleur = true;
        }
        if (item.taille) {
          this.taille = true;
        }
        if (item.pointure) {
          this.pointure = true;
        }
      }
      this.dialog = true;
      this.editedItem = Object.assign({}, item);
    },
    close() {
      this.$refs.form.resetValidation();
      this.$refs.form.reset();
      this.dialog = false;
    }
  }
};
</script>