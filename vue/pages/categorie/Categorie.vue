<template>
  <v-card>
    <v-card-title>Liste Catégorie</v-card-title>
    <v-data-table
      :headers="headers"
      :items="categories"
      :page.sync="page"
      :items-per-page="itemsPerPage"
      :search="search"
      class="elevation-1"
    >
      <template v-slot:top>
        <v-toolbar flat color="white" class="mt-5">
          <v-toolbar-title>
            <v-text-field
              v-model="search"
              append-icon="search"
              label="Rechercher"
              single-line
              hide-details
            ></v-text-field>
          </v-toolbar-title>
          <v-divider class="mx-4" inset vertical></v-divider>

          <v-spacer></v-spacer>
          <v-row justify="center">
            <v-dialog v-model="details" max-width="600px">
              <v-card class="d-inline-block mx-auto">
                <v-container>
                  <v-row justify="center">
                    <v-col cols="auto">
                      <v-img :src="'/documents/'+path" alt="logo" class="img"></v-img>
                    </v-col>
                  </v-row>
                </v-container>
              </v-card>
            </v-dialog>
          </v-row>

          <v-dialog v-model="dialog" persistent max-width="600px">
            <template v-slot:activator="{ on }">
              <v-btn class="mt-2" fab dark color="green">
                <v-icon dark v-on="on">mdi-plus</v-icon>
              </v-btn>
            </template>

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
                          v-model="editedItem.libelle"
                          :rules="ItemRules"
                          label="Libelle"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-file-input
                          class="input-group-prepend"
                          accept="image/*"
                          label="File input"
                          type="file"
                          v-model="files"
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
                <v-btn color="blue darken-1" text @click="close">Annuler</v-btn>
                <v-btn color="blue darken-1" text :disabled="!valid" @click="save">Enregistrer</v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-toolbar>
      </template>
      <template v-slot:item.actions="{ item }">
        <i class="fas fa-eye" @click="open(item)"></i>
        <v-icon md class="mr-2" @click="editItem(item)" color="primary" blue>mdi-pencil</v-icon>
        <v-icon md2 @click="deleteItem(item)" color="red" dark>mdi-delete</v-icon>
      </template>
      <template v-slot:no-data>
        <v-btn color="primary" @click="fetchCategories">Reset</v-btn>
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
</template>

<script>
import axios from "axios";
export default {
  name: "categorie",

  data: () => ({
    path: "",
    dialog: false,
    details: false,
    valid: true,
    files: null,
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
        text: "Libelle",
        align: "start",
        sortable: false,
        value: "libelle"
      },

      { text: "Crée le", value: "createAt", sortable: false },
      { text: "Modifié le", value: "updateAt", sortable: false },
      { text: "Actions", value: "actions", sortable: false }
    ],
    categories: [],
    editedIndex: -1,
    editedItem: {
      id: 0,
      libelle: ""
    },
    ItemRules: [v => !!v || "Champ requise"],
    defaultItem: {
      libelle: ""
    }
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "Ajout Catégorie" : "Modifié Catégorie";
    }
  },

  watch: {
    dialog(val) {
      val || this.close();
    }
  },

  created() {
    this.fetchCategories();
  },

  methods: {
    open(item) {
      this.details = true;
      this.path = item.image;
      console.log(this.path);
    },
    fetchCategories() {
      axios.get("/api/showcategory").then(response => {
        console.log(response.data);
        this.categories = response.data;
      });
    },

    editItem(item) {
      console.log(item.id);
      axios.get("/modifierCategorie/" + item.id).then(response => {
        console.log(response);
        //this.categories = response.data;
      });
      this.editedIndex = this.categories.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },

    deleteItem(item) {
      console.log(item);

      const index = this.categories.indexOf(item);
      confirm("Voulez-vous vraiment supprimer ?") &&
        this.categories.splice(index, 1);
      axios.delete("/api/archiverCategory/" + item.id).then(response => {
        console.log(response);
        //this.categories = response.data;
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
      console.log(this.editedItem.id);
      const fd = new FormData();
      fd.append("image", this.files);
      fd.append("libelle", this.editedItem.libelle);
      fd.append("id", this.editedItem.id);

      if (this.editedIndex > -1) {
        axios
          .post("/api/modifierCategorie",fd)
          .then(response => {
            console.log(response);
            //this.categories = response.data;
          });
        Object.assign(this.categories[this.editedIndex], this.editedItem);
      } else {
        axios.post("api/newCategorie", fd).then(response => {
          //this.categories = response.data;
        });
        this.categories.push(this.editedItem);
      }
      this.close();
      this.fetchCategories();
      this.$refs.form.reset();
      this.$refs.form.resetValidation();
    },
    onFileSelected(event) {
      //
      // this.file = event;
    }
  }
};
</script>