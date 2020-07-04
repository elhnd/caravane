<template>
  <div class="text-center">
    <v-container>
      <v-row justify="space-between">
        <v-col v-for="n in 4" :key="n" cols="auto">
          <v-card :elevation="3" height="100" width="250">
            <v-row class="fill-height" align="center" justify="center" v-text="n - 1"></v-row>
          </v-card>
        </v-col>
      </v-row>
      <h1></h1>
    </v-container>
    <v-progress-circular :size="50" color="primary" indeterminate></v-progress-circular>

    <v-progress-circular :width="3" color="red" indeterminate></v-progress-circular>

    <v-progress-circular :size="70" :width="7" color="purple" indeterminate></v-progress-circular>

    <v-progress-circular :width="3" color="green" indeterminate></v-progress-circular>

    <v-progress-circular :size="50" color="amber" indeterminate></v-progress-circular>
    <v-dialog v-model="dialog" persistent max-width="600px">
      <!-- <template v-slot:activator="{ on }">
              <v-btn class="mt-2" fab dark color="green">
                <v-icon dark v-on="on">mdi-plus</v-icon>
              </v-btn>
      </template>-->

      <v-card>
        <v-card-title>
          <span class="headline">Nouvelle catégorie</span>
        </v-card-title>

        <v-card-text>
          <v-form ref="form" @submit.prevent>
            <v-container>
              <v-row>
                <v-col cols="12" sm="6" md="6">
                  <v-text-field v-model="categorie.libelle" label="Libelle"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="6">
                  <v-file-input
                    class="input-group-prepend"
                    accept="image/*"
                    label="File input"
                    type="file"
                    v-model="categorie.files"
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
          <v-btn color="blue darken-1" text @click="createCategorie()">Enregistrer</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <v-col cols="12" sm="6" md="3">
      <v-btn class="ma-4 brunfonce" @click="dialog = true" large tile dark>
        <v-icon color="#555" left>mdi-account-plus</v-icon>
        <span style="color:#555;">Ajouter une catégorie</span>
      </v-btn>
    </v-col>
    <v-form ref="form" @submit.prevent="createProduit()">
      <v-container fluid>
        <v-row>
          <v-col cols="12">
            <InputDynamic v-model="items" #default="{ item }">
              <v-row>
                <v-col cols="6" sm="2">
                  <v-text-field label="Désignation" v-model="item.designation"></v-text-field>
                </v-col>
                <v-col cols="3" sm="1">
                  <v-text-field label="Taille " v-model="item.taille" hide-details />
                </v-col>
                <v-col cols="3" sm="1">
                  <v-text-field label="Age" v-model="item.age" hide-details />
                </v-col>
                <v-col cols="3" sm="1">
                  <v-text-field label="Pointure" v-model="item.pointure" hide-details />
                </v-col>

                <v-col cols="3" sm="1">
                  <v-text-field label="Couleur " v-model="item.couleur" hide-details />
                </v-col>
                <v-col cols="6" sm="2">
                  <v-text-field label="Prix de vente " v-model="item.prixVente" hide-details />
                </v-col>
                <v-col cols="3" sm="1">
                  <v-text-field label="Quantité " v-model="item.quantite" hide-details />
                </v-col>
                <v-col cols="6" sm="2">
                  <v-select
                    label="Catégorie"
                    :items="categories"
                    item-value="id"
                    item-text="libelle"
                    v-model="item.categorie"
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
      <v-card-actions>
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
      </v-card-actions>
    </v-form>

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
        </v-card>
      </v-dialog>
    </v-row>
  </div>
</template>

<script>
import { mapActions, mapGetters, mapState } from "vuex";
import InputDynamic from "../components/InputDynamic";
import axios from "../interceptor";
export default {
  components: {
    InputDynamic
  },
  data() {
    return {
      token_access: this.$route.params.token_access,
      multiLine: true,
      snackbar: false,
      dialog: false,
      text: "",
      files: null,
      valid: false,
      categories: [],
      fournisseur: {},
      produit: {
        designation: "",
        taille: "",
        age: "",
        pointure: "",
        couleur: "",
        prixVente: "",
        categorie: "",
        quantite: ""
      },
      categorie: {
        id: 0,
        libelle: "",
        files: null
      },
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
          quantite: ""
        }
      ],
      counter: 10,
      dialogProd: false,
      notifications: false,
      sound: true,
      widgets: false
    };
  },
  mounted() {
    if (this.token_access) {
      localStorage.setItem("token_access", this.token_access);
    }
    //console.log("test")
  },
  computed: {
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
          return;
        })
        .catch(err => {
          console.log(err);
        });
    },
    // getFournisseurs(id) {
    //   axios.get(`/api/access/fournisseurs/${id}`).then(resp => {
    //     console.log(resp);
    //   });
    // },

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