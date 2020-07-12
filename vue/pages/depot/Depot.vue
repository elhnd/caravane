<template>
  <v-container fluid>
    <h1 class="my-5 display-1 subheading grey--text">Dépots</h1>
    <v-row justify="space-between">
      <v-col class="col-auto">
        <v-row justify="center">
          <v-dialog v-model="dialog" persistent max-width="600px">
            <v-card>
              <v-card-title>
                <span class="headline">Dépot de produits</span>
                <item-errors v-if="entity" :entity="entity" />
              </v-card-title>
              <v-card-text>
                <v-container>
                  <v-form
                    ref="form"
                    v-model="valid"
                    @submit.prevent="update ? depotUpdate(): depotCreate()"
                  >
                    <v-row>
                      <v-col cols="12" sm="6">
                        <v-text-field
                          label="Produit"
                          @click="dialogProd = true"
                          v-model="depot.produit.designation"
                          readonly
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <v-text-field
                          label="Stock initial *"
                          v-model.number="depot.stockInitial"
                          required
                          readonly
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <v-text-field
                          v-model.number="depot.quantiteDeposee"
                          label="Quantité déposée"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <v-text-field
                          label="Stock total après dépot"
                          v-model.number="depot.totalStockApresDepot"
                          required
                          readonly
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <v-text-field
                          label="Quantité vendue *"
                          v-model.number="depot.quantiteVendue"
                          type="Quantité vendue"
                          readonly
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <v-text-field
                          label="Stock Final *"
                          v-model.number="depot.stockFinal"
                          type="Quantité restante"
                          readonly
                        ></v-text-field>
                      </v-col>
                    </v-row>
                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn color="blue darken-1" text @click="reset()">Fermer</v-btn>
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
                <small style="color:red">* Champs requis</small>
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
            <v-card-title class="p-n12 mt-n8 mb-n8">
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
                    class="ma-4 brunfonce"
                    @click="update = false,dialog = true"
                    large
                    tile
                    dark
                  >
                    <v-icon color="#555" left>mdi-account-plus</v-icon>
                    <span style="color:#555;">Ajouter un depot</span>
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
          <v-data-table :headers="headers" :items="depots" :search="search">
            <template v-slot:item.createdAt="{item}">
              <div>
                <span>{{crmDateFormat(item.createdAt)}}</span>
              </div>
            </template>
            <template v-slot:item.actions="{item}">
              <v-row>
                <div class="my-2">
                  <v-btn color="primary" @click="editDepot(item)" tile fab small dark>
                    <v-icon>mdi-pencil</v-icon>
                  </v-btn>
                </div>&nbsp; &nbsp;
                <div class="my-2">
                  <v-btn color="error" @click="depotRemove(item)" tile fab small dark>
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

    <v-row justify="center">
      <v-dialog v-model="dialogProd" fullscreen hide-overlay transition="dialog-bottom-transition">
        <v-card>
          <v-toolbar dark color="#4E342E">
            <v-btn icon dark @click="dialogProd = false">
              <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-toolbar-title>Produits</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
              <v-btn dark text @click="dialogProd = false">Save</v-btn>
            </v-toolbar-items>
          </v-toolbar>
          <v-container fluid>
            <v-row dense>
              <v-col cols="3" v-for="produit in produits" v-bind:key="produit.id">
                <v-card class="mx-auto" height="240">
                  <v-img
                    class="white--text align-end"
                    height="120px"
                    src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                  >
                    <v-card-title>{{produit.designation}}</v-card-title>
                    <v-card-subtitle>
                      <span style="color: white">Fournisseur: {{produit.fournisseur.structure}}</span>
                    </v-card-subtitle>
                  </v-img>
                  <v-card-text class="text--primary">
                    <v-row justify="space-between">
                      <div>
                        Prix
                        <br />
                        {{produit.prixVente}}
                      </div>
                      <div>
                        Taille
                        <br />
                        {{produit.taille}}
                      </div>
                      <div>
                        Age
                        <br />
                        {{produit.age}}
                      </div>
                      <div>
                        Pointure
                        <br />
                        {{produit.pointure}}
                      </div>
                    </v-row>
                  </v-card-text>
                  <v-card-actions>
                    <v-btn color="orange" @click="ajoutProduit(produit)" text>Ajouter</v-btn>
                  </v-card-actions>
                </v-card>
              </v-col>
            </v-row>
          </v-container>
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
            <v-btn color="blue darken-1" text @click="reset()">Annuler</v-btn>
            <v-btn color="blue darken-1" text :disabled="!valid" @click="depotFournisseur">Envoyer</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-row>
  </v-container>
</template>

<script>
import ItemErrors from "../.././components/layout/errors/ItemErrors";
import { mapActions, mapGetters, mapState } from "vuex";
import axios from "../../interceptor";
export default {
  components: { ItemErrors },
  data() {
    return {
      dialogFournisseur: false,
      idFournisseur: null,
      allFournisseurs: [],
      fournisseurs: [],
      structure: [],
      dialogProd: false,
      update: false,
      items: [],
      entity: "depot",
      //produits: [],
      editedIndex: -1,
      pencil: "mdi-plus",
      color: "red",
      search: "",
      small: "small",
      show: false,
      dialog: false,
      valid: true,
      headers: [
        { text: "Date de dépôt", value: "createdAt" },
        { text: "Désignation", value: "produit.designation" },
        { text: "Fournisseur", value: "produit.fournisseur.structure" },
        { text: "Prix de Vente", value: "produit.prixVente" },
        { text: "Stock Initial", value: "stockInitial" },
        { text: "Qunatité Déposée", value: "quantiteDeposee" },
        { text: "Ttl Stk après Dépot", value: "totalStockApresDepot" },
        { text: "Quantité Venduee", value: "quantiteVendue" },
        { text: "Stock Final", value: "stockFinal" },
        { text: "Actions", value: "actions" }
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
      },
      produitRules: [v => !!v || "Champ requise"]
    };
  },
  computed: {
    isLoading() {
      if (this.$store.state.general.isLoading > 0) {
        return true;
      }
    },
    ...mapGetters({
      depots: "depot/depots",
      depot: "depot/depot",
      produits: "produit/produits"
    })
  },
  created() {
    this.getDepots();
    this.getProduits();
    // this.fetchproduits();
    //this.fetchfournisseurs();
    this.getFournisseurs();
  },
  methods: {
    getFournisseurs() {
      axios.get("/api/fournisseurs").then(response => {
        this.allFournisseurs = response.data["hydra:member"];
      });
    },
    // fetchfournisseurs() {
    //   var structu = [];

    //   axios.get("/api/fournisseur/").then(response => {
    //     this.fournisseurs = response.data;
    //     this.fournisseurs.forEach(element => structu.push(element.structure));
    //     this.structure = structu;
    //   });
    // },
    depotFournisseur() {
      axios
        .get(`/api/access/fournisseurs/${this.idFournisseur}`)
        .then(resp => {
          this.colorSnackbar = "green";
          this.snackbar = true;
          this.textSnackbar = "Demande de dépot envoyée";
          this.reset();
        })
        .catch(err => {
          this.colorSnackbar = "red";
          this.snackbar = true;
          this.textSnackbar = "Echec envoie";
          this.reset();
        });
    },
    // fetchproduits() {
    //   axios.get("/api/produit").then(response => {
    //     this.produits = response.data;
    //   });
    // },
    ...mapActions({
      getDepots: "depot/getDepots",
      createDepot: "depot/createDepot",
      updateDepot: "depot/updateDepot",
      removeDepot: "depot/removeDepot",
      getProduits: "produit/getProduits"
    }),
    ajoutProduit(item) {
      this.$store.commit("depot/setProduit", item);
      this.dialogProd = false;
    },
    validate() {
      this.$refs.form.validate();
    },
    reset() {
      this.$refs.form.reset();
      this.$refs.form.resetValidation();
      this.dialogFournisseur = false;
      this.dialog = false;
      this.update = false;
      this.$store.commit("depot/DEPOT_RESET_ITEM");
      this.getDepots();
      this.getProduits();
    },
    editDepot(depot) {
      this.update = true;
      this.$store.commit("depot/DEPOT_UPDATE_ITEM", depot);
      this.dialog = true;
    },
    depotCreate() {
      this.createDepot().then(res => {
        this.reset();
      });
    },
    depotUpdate() {
      this.updateDepot().then(res => {
        this.reset();
      });
    },
    depotRemove(depot) {
      if (window.confirm("Voulez-vous vraiment supprimer ce dépot")) {
        this.removeDepot(depot.id).then(res => {
          this.reset();
        });
      }
    }
  }
};
</script>

<style lang="scss" >
.brunfonce {
  background: #d7ccc8 !important ;
}

td {
  font-size: 16px !important;
  vertical-align: middle !important ;
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