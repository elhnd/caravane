<template>
  <div>
    <v-row justify="space-between">
      <v-col class="col-auto">
        <v-row justify="center">
          <v-dialog v-model="dialog" persistent max-width="600px">
            <v-card>
              <v-card-title>
                <span class="headline">Vente de produits test</span>
                <item-errors v-if="entity" :entity="entity" />
              </v-card-title>
              <v-card-text>
                <v-container>
                  <v-form
                    ref="form"
                    v-model="valid"
                    @submit.prevent="update ? venteUpdate(): venteCreate()"
                  >
                    <v-row>
                      <v-col cols="12" sm="6">
                        <v-autocomplete
                          label="Produit"
                          :items="produits"
                          item-value="id"
                          item-text="designation"
                          multiple
                          v-model="vente.produit"
                        ></v-autocomplete>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <v-autocomplete
                          label="Client"
                          :items="clients"
                          item-value="id"
                          item-text="nom"
                          v-model="vente.client.id"
                        ></v-autocomplete>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <v-text-field
                          label="Quantité vendue *"
                          v-model.number="vente.quantiteVendue"
                          required
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <v-text-field v-model="vente.prixVenteTotal" label="Prix de vente total"></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <v-text-field
                          label="Prix net à payer"
                          v-model="vente.prixNetPayer"
                          required
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <v-text-field label="Date de vente" v-model="vente.dateVente" type="date"></v-text-field>
                      </v-col>
                    </v-row>
                    <v-card-actions>
                      <v-btn
                        color="blue darken-1"
                        text
                        @click="dialogClient = !dialogClient"
                      >Ajouter client</v-btn>
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
          <template>
            <div>
              <Client v-if="dialogClient==true" />
            </div>
          </template>
        </v-row>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12">
        <v-card class="mx-auto">
          <v-col cols="12">
            <v-form ref="form">
              <v-card-title class="p-n12 mt-n8 mb-n8">
                <v-col cols="6" sm="3" md="3">
                  <v-btn
                    class="ma-4 brunfonce"
                    @click="update = false,goto('addVente')"
                    large
                    tile
                    dark
                  >
                    <v-icon color="#555" left>mdi-account-plus</v-icon>
                    <span style="color:#555;">Ajouter une vente</span>
                  </v-btn>
                </v-col>
                <v-row justify="space-between">
                  <v-col cols="6" sm="3" md="2">
                    <v-text-field
                      v-model="search"
                      append-icon="search"
                      label="Search"
                      single-line
                      hide-details
                    ></v-text-field>
                  </v-col>
                  <v-col cols="6" sm="2" md="2">
                    <v-text-field type="date" v-model="from" label="Date de début"></v-text-field>
                  </v-col>
                  <v-col cols="6" sm="2" md="2">
                    <v-text-field
                      type="date"
                      v-model="to"
                      label="Date de fin"
                      @input="filterByDate()"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="6" sm="2" md="2">
                    <v-autocomplete
                      :items="fournisseurs"
                      label="Fournisseur"
                      item-value="id"
                      v-model="fournisseur"
                      item-text="structure"
                      @input=" filterByFour()"
                    ></v-autocomplete>
                  </v-col>
                  <v-col cols="6" sm="2" md="2">
                    <v-btn class="ma-4 brunfonce" @click="replay()" tile dark small>
                      <v-icon color="#555" large>replay</v-icon>
                    </v-btn>
                  </v-col>
                </v-row>
              </v-card-title>
            </v-form>
          </v-col>
          <v-data-table :headers="headers" :items="allVentesFours" :search="search">
            <template v-slot:item.dateVente="{item}">
              <div>
                <span>{{item.dateVente}}</span>
              </div>
            </template>
            <template v-slot:item.actions="{item}">
              <v-row>
                <div class="my-2">
                  <v-btn @click="gotoEdit(item)" tile fab small dark>
                    <v-icon>mdi-eye</v-icon>
                  </v-btn>
                </div>&nbsp; &nbsp;
                <div class="my-2">
                  <v-btn color="primary" @click="editVente(item)" tile fab small dark>
                    <v-icon>mdi-pencil</v-icon>
                  </v-btn>
                </div>&nbsp; &nbsp;
                <div class="my-2">
                  <v-btn color="error" @click="venteRemove(item)" tile fab small dark>
                    <v-icon>mdi-delete</v-icon>
                  </v-btn>
                </div>
              </v-row>
            </template>

            <template v-slot:no-data>
              <v-btn color="primary">Reset</v-btn>
            </template>
          </v-data-table>
          <div>Total Journée: {{ttlJour}}</div>
        </v-card>
      </v-col>
    </v-row>

    <v-row justify="space-between">
      <v-col class="col-auto">
        <v-row justify="center">
          <v-dialog v-model="dialog" persistent max-width="600px">
            <v-card>
              <v-card-title>
                <span class="headline">Produits de la vente</span>
              </v-card-title>
              <v-card-text>
                <v-container>
                  <v-card-actions>
                    <v-btn
                      color="blue darken-1"
                      text
                      @click="dialogClient = !dialogClient"
                    >Ajouter client</v-btn>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" text @click="reset()">Fermer</v-btn>
                  </v-card-actions>
                </v-container>
              </v-card-text>
            </v-card>
          </v-dialog>
          <!-- <template>
            <div>
              <Client v-if="dialogClient==true" />
            </div>
          </template>-->
        </v-row>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import ItemErrors from "../.././components/layout/errors/ItemErrors";
// import Client from "./Client";
import { mapActions, mapGetters, mapState } from "vuex";
import axios from "../../interceptor";
import fecha from "fecha";
export default {
  name: "caisse",
  components: { ItemErrors },
  data() {
    return {
      fournisseur: null,
      ttlJour: null,
      from: "",
      to: "",
      dialogClient: false,
      update: false,
      items: [],
      entity: "vente",
      produits: [],
      values: [],
      editedIndex: -1,
      pencil: "mdi-plus",
      color: "red",
      search: "",
      small: "small",
      show: false,
      dialog: false,
      valid: true,
      headers: [
        { text: "Date de la vente", value: "dateVente" },
        { text: "Fournisseur", value: "produit.fournisseur.structure" },
        { text: "Produit", value: "produit.designation" },
        { text: "Quantité", value: "quantiteVendue" },
        { text: "Montant", value: "produit.prixVente" },
        { text: "Total", value: "prixVenteTotal" },
        { text: "Total Cumule", value: "totalCumule" }
        // { text: "Montant rendu", value: "montantRendu" },
        // { text: "Type de paiement", value: "typePaiement" },
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
      ventes: "vente/ventes",
      vente: "vente/vente",
      clients: "client/clients",
      allVentesFours: "vente/allVentesFours",
      fournisseurs: "fournisseur/fournisseurs"
    })
  },
  created() {
    this.getVentes();
    this.fetchproduits();
    console.log(this.getVentes());
    this.getClients();
    this.infosVenteFourn();
    this.getVentesFournisseur();
  },
  methods: {
    ...mapActions({
      getVentes: "vente/getVentes",
      createVente: "vente/createVente",
      updateVente: "vente/updateVente",
      removeVente: "vente/removeVente",
      getClients: "client/getClients",
      getVentesFournisseur: "fournisseur/getVentesFournisseur"
    }),
    filterByDate() {
      var values = [];
      var total = 0;
      this.values.filter(data => {
        if (data.dateVente >= this.from && data.dateVente <= this.to) {
          values.push(data);
          this.ttlJour = null;
        }
        if (data.dateVente == this.from && data.dateVente == this.to) {
          total = total + parseInt(data.prixVenteTotal);
          this.ttlJour = total;
        }
      });
      this.$store.commit("vente/allVentesFours", values);
    },
    infosVenteFourn() {
      this.getVentes().then(resp => {
        var total = 0;
        resp.filter(data => {
          data.venteProduits.forEach(vente => {
            this.values.push(vente);
            if (vente.dateVente === fecha.format(new Date(), "YYYY-MM-DD")) {
              total = total + parseInt(vente.prixVenteTotal);
            }
          });
        });
        this.$store.commit("vente/totalJournee", total);
        this.$store.commit("vente/allVentesFours", this.values);
      });
    },
    filterByFour() {
      var values = [];
      var total = 0;
      if (this.from && this.to) {
        this.values.filter(data => {
          if (data.produit.fournisseur.id == this.fournisseur) {
            if (data.dateVente >= this.from && data.dateVente <= this.to) {
              total = total + parseInt(data.prixVenteTotal);
              this.ttlJour = null;
              data.totalCumule = total;
              values.push(data);
            }
          }
        });
      } else {
        this.values.filter(data => {
          if (data.produit.fournisseur.id == this.fournisseur) {
            total = total + parseInt(data.prixVenteTotal);
            this.ttlJour = null;
            data.totalCumule = total;
            values.push(data);
          }
        });
      }
      this.$store.commit("vente/allVentesFours", values);
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
      this.$refs.form.reset();
      this.$refs.form.resetValidation();
      this.dialog = false;
      this.update = false;
      this.$store.commit("vente/VENTE_RESET_ITEM");
      this.getVentes();
    },
    replay() {
      this.values = [];
      this.getVentes();
      this.infosVenteFourn();
      this.$refs.form.reset();
      this.$refs.form.resetValidation();
    },
    editVente(vente) {
      this.update = true;
      this.$store.commit("vente/VENTE_UPDATE_ITEM", vente);
      this.dialog = true;
    },
    venteCreate() {
      this.createVente().then(res => {
        this.reset();
      });
    },
    venteUpdate() {
      this.updateVente().then(res => {
        this.reset();
      });
    },
    venteRemove(vente) {
      if (window.confirm("Voulez-vous vraiment supprimer cette vente")) {
        this.removeVente(vente.id).then(res => {
          this.reset();
        });
      }
    },
    goto(route) {
      //this.$router.push({ name: "addVente", params: { id: item.id } });
      this.$router.push({ name: route });
    },
    gotoEdit(item) {
      this.$router.push({ name: "produitsVente", params: { item: item } });
      //console.log(item)
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