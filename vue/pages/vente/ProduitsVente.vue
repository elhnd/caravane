<template>
  <v-container fluid>
    <h1 class="my-5 display-1 subheading grey--text">Produits de la vente</h1>
    <v-row justify="space-between"></v-row>
    <v-row>
      <v-col cols="12">
        <v-card class="mx-auto">
          <v-col cols="12">
            <v-card-title class="p-n12 mt-n8 mb-n8">
              <v-row justify="space-between">
                <v-col cols="12" sm="6" md="3">
                  <v-text-field
                    label="Nom client"
                    :value="produitsVentes.client.nomComplet"
                    readonly
                  ></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-text-field label="Telephone" :value="produitsVentes.client.telephone" readonly></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-text-field label="Date de la vente" :value="produitsVentes.dateVente" readonly></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-text-field
                    label="Montant de la vente"
                    :value="produitsVentes.totalVente"
                    readonly
                  ></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-text-field
                    label="Type de paiement"
                    :value="produitsVentes.typePaiement"
                    readonly
                  ></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-text-field label="Montant versé" :value="produitsVentes.montantVerse" readonly></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-text-field label="Montant rendu" :value="produitsVentes.montantRendu" readonly></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-text-field
                    v-model="search"
                    append-icon="search"
                    label="Chercher"
                    single-line
                    hide-details
                  ></v-text-field>
                </v-col>
              </v-row>
            </v-card-title>
          </v-col>
          <v-data-table :headers="headers" :items="produitsVentes.venteProduits" :search="search">
            <template v-slot:item.dateVente="{item}">
              <div>
                <span>{{item.dateVente}}</span>
              </div>
            </template>
            <template v-slot:item.status="{item}">
              <v-chip :color="getColor(item.status)" dark>{{item.status}}</v-chip>
            </template>
            <template v-slot:item.actions="{item}">
              <v-row>
                <div class="my-2">
                  <v-btn
                    class="ma-2"
                    tile
                    color="#FFD600"
                    @click="dialog=true,action(item,'retour')"
                    dark
                  >
                    <span style="color:black">Retour</span>
                  </v-btn>
                </div>&nbsp;
                <div class="my-2">
                  <v-btn
                    class="ma-2"
                    tile
                    color="#4CAF50"
                    @click="dialog=true,action(item,'echange')"
                    dark
                  >
                    <span style="color:black">Échange</span>
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

    <template>
      <v-row justify="center">
        <v-dialog v-model="dialog" persistent max-width="600px">
          <v-card>
            <v-card-title>
              <span class="headline">Produit</span>
            </v-card-title>
            <v-card-text>
              <v-container>
                <v-form ref="form">
                  <v-row>
                    <v-row v-if="echange">
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          label="Produit"
                          @click="dialogProd = true"
                          v-model="produitsVente.produit.designation"
                          required
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          label="Catégorie"
                          v-model="produitsVente.produit.categorie.libelle"
                          required
                          readonly
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          label="Prix de vente"
                          v-model="produitsVente.produit.prixVente"
                          readonly
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          label="Qunatité vendue"
                          v-model.number="produitsVente.quantiteVendue"
                          @input="calculQttPrx(produitsVente.quantiteVendue)"
                          required
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          label="Prix de Vente total"
                          v-model="produitsVente.prixVenteTotal"
                          required
                          readonly
                        ></v-text-field>
                      </v-col>
                    </v-row>
                    <v-col cols="12">
                      <v-textarea
                        append-icon="mdi-comment"
                        class="mx-2"
                        v-model="produitsVente.commentaire"
                        label="Commentaire"
                        rows="2"
                      ></v-textarea>
                    </v-col>
                  </v-row>
                </v-form>
              </v-container>
              <small>*indicates required field</small>
            </v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="reset()">Close</v-btn>
              <v-btn color="blue darken-1" text @click="echangeProd()">Save</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-row>
    </template>

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
          <div class="text-center mb-4">
            <v-alert :value="snackbar" dense type="info" transition="scale-transition" top>
              <strong>{{ text }}</strong>
            </v-alert>
          </div>
          <v-container fluid>
            <v-row dense>
              <v-col cols="3" v-for="produit in produits" v-bind:key="produit.id">
                <v-card class="mx-auto" height="240">
                  <v-img
                    class="white--text align-end"
                    height="120px"
                    src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                  >
                    <v-card-title>{{produit.produit.designation}}</v-card-title>
                    <v-card-subtitle>
                      <span
                        style="color: white"
                      >Fournisseur: {{produit.produit.fournisseur.structure}}</span>
                    </v-card-subtitle>
                  </v-img>
                  <v-card-text class="text--primary">
                    <v-row justify="space-between">
                      <div>
                        Prix
                        <br />
                        {{produit.produit.prixVente}}
                      </div>
                      <div>
                        Taille
                        <br />
                        {{produit.produit.taille}}
                      </div>
                      <div>
                        Age
                        <br />
                        {{produit.produit.age}}
                      </div>
                      <div>
                        Pointure
                        <br />
                        {{produit.produit.pointure}}
                      </div>
                    </v-row>
                  </v-card-text>
                  <v-card-actions>
                    <v-btn
                      color="orange"
                      @click="ajoutProduit(produit.produit,produit)"
                      text
                    >Ajouter</v-btn>
                  </v-card-actions>
                </v-card>
              </v-col>
            </v-row>
          </v-container>
        </v-card>
      </v-dialog>
    </v-row>
  </v-container>
</template>

<script>
import ItemErrors from "../.././components/layout/errors/ItemErrors";
import Client from "./Client";
import { mapActions, mapGetters, mapState } from "vuex";
import axios from "../../interceptor";
export default {
  name: "vente",
  components: { ItemErrors, Client },
  data() {
    return {
      etat: "",
      echange: false,
      snackbar: false,
      text: "",
      dialogProd: false,
      dialog: false,
      detailVente: this.$route.params.item,
      items: [],
      entity: "vente",
      search: "",
      valid: true,
      headers: [
        { text: "Produit", value: "produit.designation" },
        { text: "Categorie", value: "produit.categorie.libelle" },
        { text: "Fournisseur", value: "produit.fournisseur.structure" },
        { text: "Prix unitaire", value: "produit.prixVente" },
        { text: "Quantité vendu", value: "quantiteVendue" },
        { text: "Prix de vente total", value: "prixVenteTotal" },
        { text: "Statut", value: "status" },
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
      }
    };
  },
  computed: {
    isLoading() {
      if (this.$store.state.general.isLoading > 0) {
        return true;
      }
    },
    ...mapGetters({
      produitsVentes: "produits_vente/produitsVentes",
      produitsVente: "produits_vente/produitsVente",
      produits: "vente/produits"
    })
  },
  created() {
    this.fetchproduits();
    this.getProduits();
  },
  mounted() {
    if (this.detailVente) {
      this.$store.commit(
        "produits_vente/VENTE_PRODUITS_SET_VENTE",
        this.detailVente
      );
      console.log(this.detailVente);
    }
  },
  methods: {
    ...mapActions({
      getProduits: "vente/getProduits",
      updateVenteProduits: "produits_vente/updateVenteProduits"
      //getVentesProduits: "produits_vente/getProduitsVente"
    }),
    ajoutProduit(value, depot) {
      console.log(depot);
      console.log(value);
      this.$store.commit("produits_vente/setProduit", value);
      this.dialogProd = false;
    },
    calculQttPrx(qtt) {
      this.$store.commit("produits_vente/calculQttPrx", qtt);
    },
    getColor(value) {
      if (value == "ok") {
        return "green";
      } else if (value == "retourne") {
        return "red";
      } else if (value == "echange") {
        return "orange";
      }
    },
    echangeProd() {
      if (this.echange == true) {
        this.$store.commit("produits_vente/setStatus", "echange");
      } else {
        this.$store.commit("produits_vente/setStatus", "retourne");
      }
      this.updateVenteProduits();
      this.reset();
    },
    fetchproduits() {
      axios.get("/api/depots").then(response => {
        const produits = [];
        response.data["hydra:member"].forEach(produit => {
          produits.push(produit.produit);
        });
        this.produits = produits;
      });
    },

    validate() {
      this.$refs.form.validate();
    },
    reset() {
      this.$store.commit("produits_vente/VENTE_PRODUITS_RESET_ITEM");
      this.$refs.form.resetValidation();
      this.dialog = false;
      this.dialogProd = false;
      this.echange = false;
    },
    editVente(vente) {
      this.dialog = true;
    },
    action(item, action) {
      if (action === "echange") {
        this.echange = true;
      }
      this.$store.commit("produits_vente/VENTE_PRODUITS_SET_ITEM", item);
      console.log(item);
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