<template>
  <v-container fluid>
    <h1 class="my-5 display-1 subheading grey--text">Fournisseurs</h1>
    <v-card>
      <v-data-table
        :headers="headers"
        :items="fournisseurs"
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
                <v-col cols="12" sm="6" md="3">
                  <v-btn class="ma-4 brunfonce" @click="dialog = true" large tile dark>
                    <v-icon color="#555" left>mdi-text-box-plus</v-icon>
                    <span style="color:#555;">Ajouter un fournisseur</span>
                  </v-btn>
                </v-col>
              </v-row>
            </v-card-title>
          </v-col>

          <v-spacer></v-spacer>
          <v-dialog v-model="dialog" persistent max-width="600px">
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
                          v-model="editedItem.structure"
                          :rules="ItemRules"
                          label="Structure"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field
                          v-model="editedItem.nomGerant"
                          :rules="ItemRules"
                          label="Nom Gérant"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="12">
                        <v-text-field v-model="editedItem.email" :rules="emailRules" label="Email"></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field v-model="editedItem.tel" :rules="ItemRules" label="Tel"></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field
                          v-model="editedItem.adresse"
                          :rules="ItemRules"
                          label="Adresse"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field
                          v-model="editedItem.commission"
                          label="Commission"
                          type="number"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field
                          type="number"
                          v-model="editedItem.fraisExposition"
                          label="Frais d'exposition"
                        ></v-text-field>
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
          <v-btn color="primary" @click="fetchfournisseurs">Reset</v-btn>
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
  </v-container>
</template>

<script>
import axios from "../../interceptor";
import { API_HOST } from "../../config/_entrypoint";
export default {
  name: "fournisseur",

  data: () => ({
    dialog: false,
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
        text: "Structure",
        align: "start",
        sortable: false,
        value: "structure"
      },
      { text: "Nom Gérant", value: "nomGerant", sortable: false },
      { text: "Téléphone", value: "tel", sortable: false },
      { text: "Email", value: "email", sortable: false },
      { text: "Adresse", value: "adresse", sortable: false },
      { text: "Commission", value: "commission", sortable: false },
      { text: "Frais d'exposition", value: "fraisExposition", sortable: false },
      { text: "Crée le", value: "createAt", sortable: false },
      { text: "Modifié le", value: "updateAt", sortable: false },
      { text: "Actions", value: "actions", sortable: false }
    ],
    fournisseurs: [],
    editedIndex: -1,
    editedItem: {
      id: 0,
      structure: "",
      nomGerant: "",
      tel: "",
      email: "",
      adresse: "",
      commission: "",
      fraisExposition: ""
    },
    ItemRules: [v => !!v || "Champ requise"],
    emailRules: [
      v => !!v || "E-mail requise",
      v => /.+@.+\..+/.test(v) || "E-mail doit etre valide"
    ],
    defaultItem: {
      structure: "",
      nomGerant: "",
      tel: "",
      email: "",
      adresse: "",
      commission: "",
      fraisExposition: ""
    }
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1
        ? "Ajout Fournisseur"
        : "Modifié Fournisseur";
    }
  },

  watch: {
    dialog(val) {
      val || this.close();
    }
  },

  created() {
    this.fetchfournisseurs();
  },

  methods: {
    fetchfournisseurs() {
      axios.get("/api/fournisseur/").then(response => {
        console.log(response.data);
        this.fournisseurs = response.data;
      });
    },

    editItem(item) {
      console.log(item.id);
      axios.get("/api/fournisseur/" + item.id).then(response => {
        console.log(response);
        //this.fournisseurs = response.data;
      });
      this.editedIndex = this.fournisseurs.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },

    deleteItem(item) {
      console.log(item);

      const index = this.fournisseurs.indexOf(item);
      confirm("Voulez-vous vraiment supprimer ?") &&
        this.fournisseurs.splice(index, 1);
      axios.delete("/api/fournisseur/" + item.id).then(response => {
        console.log(response);
        //this.fournisseurs = response.data;
      });
    },

    close() {
      this.dialog = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
      this.$refs.form.reset();
    },

    save() {
      this.$refs.form.validate();

      if (this.editedIndex > -1) {
        console.log(this.editedItem.id);
        axios
          .post("/api/fournisseur/" + this.editedItem.id + "/edit", {
            structure: this.editedItem.structure,
            nomGerant: this.editedItem.nomGerant,
            tel: this.editedItem.tel,
            email: this.editedItem.email,
            adresse: this.editedItem.adresse,
            commission: this.editItem.commission,
            fraisExposition: this.editItem.fraisExposition
          })
          .then(response => {
            console.log(response);
            //this.fournisseurs = response.data;
          });
        Object.assign(this.fournisseurs[this.editedIndex], this.editedItem);
      } else {
        axios
          .post(`${API_HOST}/fournisseur/new`, {
            structure: this.editedItem.structure,
            nomGerant: this.editedItem.nomGerant,
            tel: this.editedItem.tel,
            email: this.editedItem.email,
            adresse: this.editedItem.adresse,
            commission: this.editedItem.commission,
            fraisExposition: this.editedItem.fraisExposition
          })
          .then(response => {
            console.log(response);
            //this.fournisseurs = response.data;
          });
        this.fournisseurs.push(this.editedItem);
      }
      this.close();
      this.fetchfournisseurs();
      this.$refs.form.reset();
      this.$refs.form.resetValidation();
    }
  }
};
</script>