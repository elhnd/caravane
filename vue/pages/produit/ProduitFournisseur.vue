<template>
  <v-container fluid>
    <h1 class="my-5 display-1 subheading grey--text">Ajout Produits</h1>
    <div class="text-center">
      <v-dialog v-model="dialog" persistent max-width="600px">
        <v-card>
          <v-card-title>
            <span class="headline">Nouvelle catégorie</span>
          </v-card-title>

          <v-card-text>
            <v-form ref="form" @submit.prevent v-model="valid">
              <v-container>
                <v-row>
                  <v-col cols="12" sm="6" md="6">
                    <v-text-field
                      v-model="categorie.libelle"
                      :rules="rules.champRequis"
                      label="Libelle"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="6">
                    <v-file-input
                      class="input-group-prepend"
                      accept="image/*"
                      label="Image "
                      type="file"
                      v-model="categorie.files"
                      :rules="rules.champRequis"
                      id="file"
                      ref="file"
                    ></v-file-input>
                  </v-col>
                </v-row>
              </v-container>
            </v-form>
          </v-card-text>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="blue darken-1" text @click="close()">Annuler</v-btn>
            <v-btn
              type="submit"
              :loading="isLoading "
              :disabled="isLoading || !valid"
              color="success"
              @click="createCategorie()"
            >
              Valider
              <template v-slot:loader>
                <span>En cours...</span>
              </template>
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
      <v-col cols="12" sm="6" md="3">
        <v-btn class="ma-4 brunfonce" @click="dialog = true" large tile dark>
          <v-icon color="#555" left>mdi-account-plus</v-icon>
          <span style="color:#555;">Ajouter une catégorie</span>
        </v-btn>
      </v-col>
      <v-form ref="form" @submit.prevent="createProduit()" v-model="valid">
        <v-container fluid>
          <v-row>
            <v-col cols="12">
              <InputDynamic v-model="items" #default="{ item }">
                <v-row>
                  <v-col cols="6" sm="2">
                    <v-text-field
                      label="Désignation"
                      :rules="rules.champRequis"
                      v-model="item.designation"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="3" sm="1">
                    <v-text-field label="Taille " v-model="item.taille" hide-details />
                  </v-col>
                  <v-col cols="3" sm="1">
                    <v-text-field label="Age" type="number" v-model="item.age" hide-details />
                  </v-col>
                  <v-col cols="3" sm="1">
                    <v-text-field
                      label="Pointure"
                      type="number"
                      v-model="item.pointure"
                      hide-details
                    />
                  </v-col>

                  <v-col cols="3" sm="1">
                    <v-text-field label="Couleur " v-model="item.couleur" hide-details />
                  </v-col>
                  <v-col cols="6" sm="2">
                    <v-text-field
                      label="Prix de vente"
                      type="number"
                      v-model="item.prixVente"
                      hide-details
                      :rules="rules.champRequis"
                    />
                  </v-col>
                  <v-col cols="3" sm="1">
                    <v-text-field
                      label="Quantité "
                      type="number"
                      v-model="item.quantite"
                      hide-details
                      :rules="rules.champRequis"
                    />
                  </v-col>
                  <v-col cols="6" sm="2">
                    <v-select
                      label="Catégorie"
                      :items="categories"
                      item-value="id"
                      item-text="libelle"
                      v-model="item.categorie"
                      :rules="rules.champRequis"
                    ></v-select>
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
        </v-container>
        <v-card-actions v-if="items[0]">
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="reset()">Fermer</v-btn>
          <div class="my-2">
            <v-btn
              type="submit"
              :loading="isLoading "
              
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

      <v-row justify="center">
        <v-dialog
          v-model="dialogProd"
          fullscreen
          hide-overlay
          transition="dialog-bottom-transition"
        >
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
          </v-card>
        </v-dialog>

        <v-dialog v-model="dialogProds" persistent transition="dialog-bottom-transition">
          <v-card>
            <v-card-title>
              <span class="headline">Produits ajoutés</span>
            </v-card-title>

            <v-card-text>
              <template>
                <v-data-table
                  dense
                  :headers="headers"
                  :items="produits"
                  item-key="name"
                  class="elevation-1"
                ></v-data-table>
              </template>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <div class="my-2">
                <v-btn type="submit" color="success" @click="dialogProds = false">Fermer</v-btn>
              </div>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-row>
    </div>
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
import axios from "../../interceptor";
export default {
  components: {
    InputDynamic
  },
  data() {
    return {
      produits: [],
      dialogProds: false,
      snackbar: false,
      textSnackbar: "",
      timeout: 5000,
      colorSnackbar: "",
      valid: true,
      token_access: this.$route.params.token_access,
      multiLine: true,
      dialog: false,
      text: "",
      files: null,
      categories: [],
      fournisseur: {},
      categorie: {
        id: 0,
        libelle: "",
        files: null
      },
      headers: [
        {
          text: "Désignation",
          align: "start",
          sortable: false,
          value: "designation"
        },
        { text: "Age", value: "age" },
        { text: "Taille", value: "taille" },
        { text: "Pointure", value: "pointure" },
        { text: "Couleur", value: "couleur" },
        { text: "Prix de Vente", value: "prixVente" },
        { text: "Quantite", value: "quantite" }
      ],
      items: [
        {
          id: 0,
          designation: "",
          taille: "",
          age: "",
          pointure: "",
          couleur: "",
          prixVente: "",
          categorie: "",
          quantite: null
        }
      ],
      counter: 1,
      dialogProd: false,
      notifications: false,
      sound: true,
      widgets: false,
      rules: {
        champRequis: [v => !!v || "champ requis"]
      }
    };
  },
  mounted() {
    if (this.token_access) {
      localStorage.setItem("token_access", this.token_access);
    }
    //console.log("test")
  },
  computed: {
    isLoading() {
      if (this.$store.state.general.isLoading > 0) {
        return true;
      }
    },
    ...mapGetters({})
  },
  methods: {
    goto(route) {
      //this.$router.push({ name: "addVente", params: { id: item.id } });
      this.$router.push({ name: route });
    },
    createProduit() {
      var token_access = localStorage.getItem("token_access");
      axios
        .post("api/produits", {
          produits: this.items,
          token_access: token_access
        })
        .then(resp => {
          this.produits = this.items;
          this.dialogProds = true;
          this.colorSnackbar = "green";
          this.snackbar = true;
          this.textSnackbar = "Ajout de produits réussie";
          this.items = [];
          return;
        })
        .catch(err => {
          this.colorSnackbar = "red";
          this.snackbar = true;
          this.textSnackbar = "Echec ajout produits";
          console.log(err);
        });
    },
    close() {
      this.dialog = false;
      this.$nextTick(() => {
        this.categorie = Object.assign({}, this.categorie);
      });
      this.$refs.form.reset();
    },
    createCategorie() {
      const fd = new FormData();
      fd.append("image", this.categorie.files);
      fd.append("libelle", this.categorie.libelle);
      fd.append("id", this.categorie.id);
      axios
        .post("api/newCategorie", fd)
        .then(response => {
          this.close();
          this.$refs.form.reset();
          this.$refs.form.resetValidation();
          this.fetchCategories();
        })
        .catch(err => {
          console.log(err);
        });
    },
    fetchCategories() {
      axios.get("/api/showcategory").then(response => {
        this.categories = response.data;
      });
    },
    add() {
      this.items.push({
        id: this.counter++,
        designation: "",
        taille: "",
        age: "",
        pointure: "",
        couleur: "",
        prixVente: "",
        categorie: "",
        quantite: ""
      });
    },
    ajoutProduit(value) {
      var nbr = this.items.length;
      this.items[nbr - 1].produit = value;
      this.items[nbr - 1].produit.prixVente = value.prixVente;
      this.dialogProd = false;
    },
    ...mapActions({})
  },
  created() {
    this.fetchCategories();
    // this.getFournisseurs(1);
  }
};
</script>
<style scoped>
.v-progress-circular {
  margin: 1rem;
}
</style>