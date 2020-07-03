<template>

  <v-container fluid>
    <h1 class="my-5 display-1 subheading grey--text">Fournisseurs</h1>
         <v-container>
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <input
            ref="excel-upload-input"
            class="excel-upload-input"
            type="file"
            accept=".xlsx, .xls"
            @change="handleClick"
          />
        </v-col>
        <v-col cols="12" sm="6" md="6">
          <v-btn color="#66e0bc">
            <vue-excel-xlsx
              :data="fournisseurTab"
              :columns="fournisseurTab"
              :filename="'fournisseur'"
              :sheetname="'sheetname'"
            >
              Telecharger format
              <v-icon color="#fff">mdi-download</v-icon>
            </vue-excel-xlsx>
          </v-btn>
        </v-col>
      </v-row>
    </v-container>
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
import XLSX from "xlsx";

export default {
  name: "fournisseur",
  props: {
    beforeUpload: Function, // eslint-disable-line
    onSuccess: Function // eslint-disable-line
  },
  data: () => ({
    dialog: false,
    valid: true,
   excelData: {
      header: null,
      results: null
    },
    search: "",
    page: 1,
    pageCount: 0,
    itemsPerPage: 12,
      fournisseurTab: [
      {
        label: "structure",
        field: "structure"
      },
      {
        label: "nomGerant",
        field: "nomGerant"
      }, 
      {
        label: "email",
        field: "email"
      },
      {
        label: "Telephone",
        field: "tel"
      },
      {
        label: "Adresse",
        field: "adresse"
      },
      
     
    ],
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
      adresse: ""
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
      adresse: ""
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
            adresse: this.editedItem.adresse
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
            adresse: this.editedItem.adresse
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
    },
  

    insertion() {
      axios
        .post("/api/fournisseur/mass", {
          fournisseur: this.excelData
        })
        .then(response => {
          console.log(response);
          //this.users = response.data;
          let message = response.data.message;
          let status = response.data.status;
          if (status == 201) {
            Vue.$toast.success(message, {
              position: "top-right",
              duration: 3000
            });
            this.fetchusers();
          }
          if (status == 401) {
            Vue.$toast.error(message, {
              position: "top-right",
              duration: 5000
            });
          }
        });
    },

    generateData({ header, results }) {
      this.excelData.header = header;
      this.excelData.results = results;
      this.onSuccess && this.onSuccess(this.excelData);
      this.insertion();
    },
    handleDrop(e) {
      e.stopPropagation();
      e.preventDefault();
      if (this.loading) return;
      const files = e.dataTransfer.files;
      if (files.length !== 1) {
        this.$message.error("Only support uploading one file!");
        return;
      }
      const rawFile = files[0]; // only use files[0]
      if (!this.isExcel(rawFile)) {
        this.$message.error(
          "Only supports upload .xlsx, .xls, .csv suffix files"
        );
        return false;
      }
      this.upload(rawFile);
      e.stopPropagation();
      e.preventDefault();
    },
    handleDragover(e) {
      e.stopPropagation();
      e.preventDefault();
      e.dataTransfer.dropEffect = "copy";
    },
    handleUpload() {
      this.$refs["excel-upload-input"].click();
    },
    handleClick(e) {
      const files = e.target.files;
      const rawFile = files[0]; // only use files[0]
      if (!rawFile) return;
      this.upload(rawFile);
    },
    upload(rawFile) {
      this.$refs["excel-upload-input"].value = null; // fix can't select the same excel
      if (!this.beforeUpload) {
        this.readerData(rawFile);
        return;
      }
      const before = this.beforeUpload(rawFile);
      if (before) {
        this.readerData(rawFile);
      }
    },
    readerData(rawFile) {
      this.loading = true;
      return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.onload = e => {
          const data = e.target.result;
          const workbook = XLSX.read(data, {
            type: "array"
          });
          const firstSheetName = workbook.SheetNames[0];
          const worksheet = workbook.Sheets[firstSheetName];
          const header = this.getHeaderRow(worksheet);
          const results = XLSX.utils.sheet_to_json(worksheet);
          this.generateData({
            header,
            results
          });
          this.loading = false;
          resolve();
        };
        reader.readAsArrayBuffer(rawFile);
      });
    },
    getHeaderRow(sheet) {
      const headers = [];
      const range = XLSX.utils.decode_range(sheet["!ref"]);
      let C;
      const R = range.s.r;
      /* start in the first row */
      for (C = range.s.c; C <= range.e.c; ++C) {
        /* walk every column in the range */
        const cell =
          sheet[
            XLSX.utils.encode_cell({
              c: C,
              r: R
            })
          ];
        /* find the cell in the first row */
        let hdr = "UNKNOWN " + C; // <-- replace with your desired default
        if (cell && cell.t) hdr = XLSX.utils.format_cell(cell);
        headers.push(hdr);
      }
      return headers;
    },
    isExcel(file) {
      return /\.(xlsx|xls|csv)$/.test(file.name);
    }
    },
};
</script>