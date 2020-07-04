<template>
  <v-container fluid>
    <h1 class="my-5 display-1 subheading grey--text">Ventes</h1>

    <v-row justify="space-between">
      <CardsInfos
        icon="attach_money"
        libelle="Total journée"
        :number="totalJournee"
        color="blue"
        :size="70"
      />
      <CardsInfos icon="mdi-account-check" libelle="Actifs" :number="2" color="green" />
      <CardsInfos icon="mdi-account-lock" libelle="Inactifs" :number="2" color="red" />
    </v-row>
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
          <v-btn style="color:#555;">
            <vue-excel-xlsx
              :data="venteTab"
              :columns="venteTab"
              :filename="'vente'"
              :sheetname="'sheetname'"
            >
              Telecharger format
              <v-icon style="color:#555;">mdi-download</v-icon>
            </vue-excel-xlsx>
          </v-btn>
        </v-col>
      </v-row>
    </v-container>
    <v-tabs v-model="tab" fixed-tabs background-color="indigo" dark>
      <v-tab>Tout les ventes</v-tab>
      <v-tab>Tout les Ventes Clients</v-tab>
    </v-tabs>

    <v-tabs-items v-model="tab">
      <v-tab-item>
        <v-card color="basil" flat>
          <allVente />
        </v-card>
      </v-tab-item>
      <v-tab-item>
        <v-card color="basil" flat>
          <vente />
        </v-card>
      </v-tab-item>
    </v-tabs-items>
  </v-container>
</template>

<script>
import vente from "./Vente";
import allVente from "./AllVente";
import CardsInfos from "../../components/layout/CardsInfos";
import { mapActions, mapGetters, mapState } from "vuex";
import XLSX from "xlsx";
import axios from "axios";

export default {
  name: "detailVente",
  components: { allVente, vente, CardsInfos },
  props: {
    beforeUpload: Function, // eslint-disable-line
    onSuccess: Function // eslint-disable-line
  },
  data() {
    return {
      excelData: {
        header: null,
        results: null
      },
      venteTab: [
        {
          label: "client",
          field: "client"
        },

        {
          label: "dateVente",
          field: "dateVente"
        },
        {
          label: "produit",
          field: "produit"
        },
        {
          label: "quantite",
          field: "quantite"
        },
        {
          label: "typePaiement",
          field: "typePaiement"
        },
      
        {
          label: "prixVente",
          field: "prixVente"
        },
        {
          label: "montantVerse",
          field: "montantVerse"
        },
        {
          label: "montantRendu",
          field: "montantRendu"
        }
      ],
      tab: null
    };
  },
  computed: {
    ...mapGetters({
      totalJournee: "vente/totalJournee"
    })
  },
  methods: {
    insertion() {
      axios
        .post("/api/vente/mass", {
          vente: this.excelData
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
  }
};
</script>