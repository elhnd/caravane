<template>
  <v-container fluid>
    <h1 class="my-5 display-1 subheading grey--text">Opération de Caisse</h1>
    <v-form ref="form" @submit.prevent="createVente()" v-model="valid">
      <v-container fluid>
        <v-row>
          <v-col cols="6" sm="2" center>
            <v-autocomplete
              label="Client"
              :items="clients"
              item-value="id"
              item-text="telephone"
              v-model="vente.client"
              @input="clientName(clients,vente.client)"
              :rules="rules.champRequis"
            ></v-autocomplete>
          </v-col>

          <v-col cols="6" sm="2">
            <v-text-field
              label="Nom Complet"
              v-model="vente.nomComplet"
              :rules="rules.champRequis"
              readonly
              required
            ></v-text-field>
          </v-col>
          <!-- <v-col cols="6" sm="2">
            <v-text-field
              label="Téléphone"
              v-model="vente.telephone"
              :rules="rules.champRequis"
              required
            ></v-text-field>
          </v-col>-->
          <v-col cols="6" sm="2">
            <v-text-field
              label="Date de vente"
              type="date"
              v-model="vente.dateVente"
              :rules="rules.champRequis"
              required
            ></v-text-field>
          </v-col>
          <v-col cols="12" sm="6" md="3">
            <v-btn class="ma-4 brunfonce" @click="dialogClient = !dialogClient" large tile dark>
              <v-icon color="#555" left>mdi-account-plus</v-icon>
              <span style="color:#555;">Ajouter un client</span>
            </v-btn>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12">
            <InputDynamic v-model="items" #default="{ item }">
              <v-row>
                <v-col cols="6" sm="2">
                  <v-text-field
                    label="Produit"
                    @click="dialogProd = true"
                    v-model="item.produit.designation"
                    :rules="rules.champRequis"
                  ></v-text-field>
                </v-col>
                <v-col cols="6" sm="2">
                  <v-text-field
                    label="Prix vente "
                    v-model="item.produit.prixVente"
                    :rules="rules.champRequis"
                    type="number"
                  />
                </v-col>
                <v-col cols="6" sm="2">
                  <v-text-field
                    label="Quantité vendue"
                    v-model="item.quantiteVendue"
                    v-on:keyup="prixVttl(item)"
                    type="number"
                    :rules="rules.champRequis"
                  />
                </v-col>
                <v-col cols="6" sm="2">
                  <v-text-field
                    label="Prix vente total"
                    v-model="item.prixVenteTotal"
                    type="number"
                    :rules="rules.champRequis"
                  />
                </v-col>
              </v-row>
            </InputDynamic>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="auto" class="py-0 mx-auto">
            <v-btn @click="add" text>
              <v-icon>mdi-plus</v-icon>Ajouter Produit
            </v-btn>
          </v-col>
        </v-row>
        <v-row v-if="items[0]">
          <v-col cols="4" sm="2">
            <v-text-field
              label="Total vente"
              type="number"
              v-model="vente.totalVente"
              :rules="rules.champRequis"
            />
          </v-col>
          <v-col cols="4" sm="2">
            <v-select
              :items="typePaiement"
              item-value="type"
              item-text="name"
              option-store="name"
              label="Type de paiement"
              v-model="vente.typePaiement"
              type="number"
              :rules="rules.champRequis"
            ></v-select>
          </v-col>
          <v-col cols="4" sm="2">
            <v-text-field
              label="Montant versé"
              type="number"
              v-model="vente.montantVerse"
              :rules="rules.champRequis"
            />
          </v-col>
          <v-col cols="4" sm="2">
            <v-text-field
              label="Montant rendu"
              type="number"
              v-model="vente.montantRendu"
              :rules="rules.champRequis"
            />
          </v-col>
        </v-row>
      </v-container>
      <!-- <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="blue darken-1" text @click="reset()">Fermer</v-btn>
        <div class="my-2">
          <v-btn type="submit" color="success">
            Valider
            <template v-slot:loader>
              <span>En cours...</span>
            </template>
          </v-btn>
        </div>
      </v-card-actions>-->
      <v-card-actions v-if="items[0]">
        <v-spacer></v-spacer>
        <v-btn color="blue darken-1" text @click="items=[]">Annuler</v-btn>
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
    <template>
      <div>
        <Client v-if="dialogClient==true" />
      </div>
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
    <v-snackbar
      v-model="snackbar"
      :color="colorSnackbar"
      multi-line
      right
      :timeout="timeout"
      top
      vertical
    >{{ textSnackbar }}</v-snackbar>
  </v-container>
</template>

<script>
import { mapActions, mapGetters, mapState } from "vuex";
import InputDynamic from "../../components/InputDynamic";
import Client from "./Client";
import axios from "../../interceptor";
export default {
  components: {
    InputDynamic,
    Client
  },
  data() {
    return {
      test: "",
      snackbar: false,
      textSnackbar: "",
      timeout: 5000,
      colorSnackbar: "",
      valid: true,
      dialogClient: false,
      multiLine: true,
      text: "",
      vente: {
        totalVente: "0",
        dateVente: "",
        client: "",
        typePaiement: "",
        montantVerse: "",
        montantRendu: "",
        nomComplet: ""
      },
      items: [
        {
          id: 0,
          produit: {
            designation: "",
            prixVente: ""
          },
          quantiteVendue: 0,
          prixVenteTotal: "",
          prixNetPayer: ""
        }
      ],
      typePaiement: [
        { name: "Chèque", type: "cheque" },
        { name: "Espèce", type: "espece" },
        { name: "Via mobile", type: "mobile_money" },
        { name: "Carte bancaire", type: "carte_bancaire" }
      ],
      counter: 10,
      dialogProd: false,
      notifications: false,
      sound: true,
      widgets: false,
      rules: {
        champRequis: [v => !!v || "champ requis"]
      }
    };
  },
  mounted() {},
  computed: {
    isLoading() {
      if (this.$store.state.general.isLoading > 0) {
        return true;
      }
    },
    ...mapGetters({
      produits: "vente/produits",
      clients: "client/clients",
      client: "client/client"
    })
  },
  methods: {
    createVente() {
      axios
        .post("api/ventes", { produits: this.items, vente: this.vente })
        .then(resp => {
          this.snackbar = true;
          this.textSnackbar = "Opération enregistrée avec succès";
          this.timeout = 5000;
          this.colorSnackbar = "green";
          this.items = [];
        })
        .catch(err => {
          this.snackbar = false;
          this.textSnackbar = "Opération échouée";
          this.timeout = 5000;
          this.colorSnackbar = "red";
          console.log(err);
        });
    },
    add() {
      this.items.push({
        id: this.counter++,
        produit: "",
        quantiteVendue: 0,
        prixVenteTotal: "",
        prixNetPayer: ""
      });
    },
    ajoutProduit(value, depot) {
      console.log(depot);
      console.log(value);
      var nbr = this.items.length;
      for (let i = 0; i < nbr; i++) {
        if (this.items[i].produit == value) {
          this.snackbar = true;
          this.text = "produit déjà ajouter";
          setTimeout(() => {
            this.snackbar = false;
          }, 3000);
          console.log("true");
          return;
        }
      }
      this.items[nbr - 1].produit = value;
      this.items[nbr - 1].produit.prixVente = value.prixVente;
      this.dialogProd = false;
    },
    clientName(item, id) {
      item.forEach(item => {
        if (item.id == id) {
          this.vente.nomComplet = item.nomComplet;
        }
      });
    },
    prixVttl(value) {
      var nbr = this.items.length;
      this.items[nbr - 1].prixVenteTotal =
        value.produit.prixVente * value.quantiteVendue;
      this.items[nbr - 1].prixNetPayer =
        value.produit.prixVente * value.quantiteVendue;
      let somme = 0;
      for (let i = 0; i < nbr; i++) {
        somme = somme + parseInt(this.items[i].prixNetPayer);
        this.vente.totalVente = somme;
      }
    },
    ...mapActions({
      getProduits: "vente/getProduits",
      getClients: "client/getClients"
    })
  },
  created() {
    //console.log(this.createVente());
    this.getProduits();
    this.getClients();
  }
};
</script>
<style scoped>
.v-progress-circular {
  margin: 1rem;
}
</style>