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
                  <v-btn color="primary" v-bind="attrs" v-on="on" tile dark>
                    <span v-if="item.depot=='en_attente'">En attente</span>
                    <span v-else>Rejeter</span>
                  </v-btn>
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
              <v-btn color="primary" tile @click fab small dark>
                <v-icon>mdi-pencil</v-icon>
              </v-btn>
            </div>&nbsp; &nbsp;
            <div class="my-2">
              <v-btn color="error" tile @click fab small dark>
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
    snackbar: false,
    textSnackbar: "",
    timeout: 5000,
    colorSnackbar: "",
    allFournisseurs: [],
    produits: [],
    valid: true,
    search: "",
    page: 1,
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
    editedIndex: -1,
    produitRules: [v => !!v || "Champ requise"]
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
  },

  methods: {
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
    close() {
      this.$refs.form.resetValidation();
      this.dialog = false;
    }
  }
};
</script>